<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showAll()
    {
        $post = Post::withTrashed();
        $post = $post->orderBy('nama_barang', 'asc');
        return view('admin.item', [
        "title" => "Item List",
        "posts" => $post->paginate(15)
        ]);
    }

    public function search( Request $request)
    {
        $search = $request->search;

        return view('admin.item', [
            "title" => "Item List",
            "posts" => Post::where('nama_barang','like','%'.$search.'%')
                    ->orWhere('deskripsi','like','%'.$search.'%')
                    ->paginate(15)->withQueryString()
        ]);
    }

    public function showIn()
    {
        return view('admin.itemIn', [
        "title" => "Item In",
        "posts" => Post::paginate(15)
        ]);
    }

    public function filterIn(Request $request)
    {

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        return view('admin.itemIn', [
        "title" => "Item In",
        "posts" => Post::whereDate('created_at','>=',$start_date)
                    ->whereDate('created_at','<=',$end_date)
                    ->paginate(15)->withQueryString()

        ]);
    }  
    public function filterOut(Request $request)
    {

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        return view('admin.itemOut', [
        "title" => "Item Out",
        "posts" => Post::withTrashed()->whereDate('deleted_at','>=',$start_date)
                ->whereDate('deleted_at','<=',$end_date)
                ->paginate(15)->withQueryString()

        ]);
    }   

    public function showItem(Post $post)
    {
        return view('admin.showItem', [
            "title" => "Show Item",
            "post" => $post
        ]);
    }
}
