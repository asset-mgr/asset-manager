<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    
    public function create(Request $request)
    {
        $data = $request->validate([
                    'username' => 'required|max:255|unique:users',
                    'first_name' => 'required|max:255',
                    'last_name' => 'max:255',
                    'email' => 'required|unique:users|email:dns',
                    'password' => 'required|confirmed|min:8'
                ]);
                
        $data['password'] = Hash::make($data['password']);
        
        $user = User::create($data);
        
        event(new Registered($user));
        
        auth()->login($user);
        
        return redirect('/')->with('success', 'Akun Berhasil Dibuat!');
    }
}
