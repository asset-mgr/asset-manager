<?php

namespace App\Http\Controllers;

use App\Exports\ItemInExport;
use App\Exports\ItemOutExport;
use App\Imports\PostImport;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $this->authorize('admin');
        return view('admin.create', [
            "title" => "Add Item",
            "post"  => Post::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $records = Login::select(
        //     'logins_sun', 
        //     'logins_mon',
        //     \DB::raw('logins_sun + logins_mon as logins_sum')
        // )->get();
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:25',
            'slug' => 'required|unique:posts',
            'deskripsi' => 'required|max:50',
            'harga' => 'required',
            'jumlah' => 'required',
            'harga_total' => 'max:25',
            'image' => 'image|file|mimes:jpeg,jpg,png,svg,webp|max:4096'
        ]);

        // $image = $request->file('image');
        // $image->storeAs('image-items',$image->hashName());

        // $postData = [
        //     'nama_barang' => $request->nama_barang,
        //     'slug' => $request->slug,
        //     'deskripsi' => $request->deskripsi,
        //     'harga' => $request->harga,
        //     'jumlah' => $request->jumlah,
        //     'harga_total' => $request->harga_total,
        //     'image' => $image->hashName()
        // ];

        // $image = $request->file('image')->store('image');

        if ($request->file('image') == null) {
            $validatedData['image'] = "";
        }else{
            $validatedData['image'] = $request->file('image')->store('image-item');  
        }
        /*
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image-item');
        }
        */

        // Post::create([
        //     'nama_barang' => $request->nama_barang,
        //     'slug' => $request->slug,
        //     'deskripsi' => $request->deskripsi,
        //     'harga' => $request->harga,
        //     'jumlah' => $request->jumlah,
        //     'harga_total' => $request->harga_total,
        //     'foto_barang' => $image->foto_barang
        // // ]);
        Post::create($validatedData);

        return redirect('/admin.item')->with('success', 'Item Ditambahkan!');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->authorize('admin');
        
        return view('admin.edit', [
            "title" => "Edit Item",
            "posts" => Post::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posts = Post::findOrFail($id);
        $rules = [
            'nama_barang' => 'required|max:25',
            'deskripsi' => 'required|max:50',
            'harga' => 'required',
            'jumlah' => 'required',
            'harga_total' => 'required',
            'image' => 'image|file|mimes:jpeg,jpg,png,svg|max:4096'
        ];

        if($request->slug != $posts->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('image-item');
        }else{
            $validatedData['image'] = "";
        }

        
        Post::where('id', $id)
            ->update($validatedData);

        return redirect('/admin.item')->with('success', 'Data Diubah!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');
        $posts = Post::findOrFail($id);
        // if($posts->image) {
        //         Storage::delete($posts->image);
        //     }

        $posts->delete();

        return redirect('/admin.item')->with('info', 'Item Dikeluarkan!');
    }

    public function forceDestroy($id)
    {
        $this->authorize('admin');
        $posts = Post::onlyTrashed()->where('id',$id);
        $posts->forceDelete();

        return redirect('/admin.item')->with('info', 'Item Dihapus Permanen!');
    }

    public function restore($id)
    {
        $this->authorize('admin');
        $data=Post::withTrashed()->findOrFail($id);
        $data->restore();

        return redirect('/admin.itemOut')->with('info', 'Item Dipulihkan!');
    }

    public function history()
    {
        $orders = Post::onlyTrashed()->paginate(15);

        return view('admin.itemOut', [
            "title" => "Item Out",
            "posts" => $orders
        ]);
    }

    public function showHistory($slug)
    {
        $posts = Post::withTrashed()->get();
        $history = [];
        foreach($posts as $showhistory) {
            if($showhistory["slug"] === $slug) {
                $history = $showhistory;
            }
        }
        return view('admin.showItemOut', [
            "title" => "Show Item",
            "post" => $history
        ]);
    }

    public function exportIn() 
    {
        return Excel::download(new ItemInExport, 'Laporan Barang Masuk.xlsx');
    }
    public function exportOut()
    {
        return Excel::download(new ItemOutExport, 'Laporan Barang Keluar.xlsx');
    }

    public function userEdit(User $user)
    {
        
        return view('admin.userprofile', [
            "title" => "User Profil",
            "user" => $user
        ]);
    }
    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $rules = [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'address' => 'max:500',
            'city' => 'max:25',
            'country' => 'max:25',
            'postal_code' => 'max:5',
            'about_me' => 'max:500',
            'image' => 'image|file|mimes:jpeg,jpg,png,svg|max:4096'
        ];

        if($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
        }

        if($request->email != $user->email) {
            $rules['email'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image') == null) {
            $validatedData['image'] = "";
        }else{
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('image-item');  
        }
        
        User::where('id', $id)
            ->update($validatedData);

        return redirect('/')->with('success', 'Data Diubah!');
        
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->nama_barang);
        return response()->json(['slug' => $slug]);
    }

    public function importView()
    {
        return view('admin.import', [
            "title" => "Item Import"
        ]);
    }

    public function import(Request $request)
    {
        $this->validate($request,[
            'file'=> 'required|mimes:xlsx,csv|max:2048'
        ]);

        Excel::import(new PostImport, $request->file);

        return redirect()->route('dashboard')->with('success', 'Berhasil Melakukan Import Data!');
    }
}
