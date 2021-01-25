<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class AuthController extends Controller{
    public function register(){
		return view('auth.register');
    }

    public function storeUser(Request $request){
        $request->validate([
			'fname'     => 'required|string|max:64',
			'lname'     => 'required|string|max:64',
			'usr_email' => 'required|string|email|max:64|unique:users',
			'password'  => 'required|string|min:3|confirmed',
			'cpassword' => 'required',
        ]);

        User::create([
			'usr_first_name' => $request->fname,
			'usr_last_name'  => $request->lname,
			'usr_email'      => $request->usr_email,
			'usr_password'   => Hash::make($request->password),
        ]);

        return redirect('home');
    }

    //public function admuseradd(Request $request){


        //return view('ajaxusers');
    //}

    public function login(){
      return view('auth.login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout(){
		Auth::logout();
		return redirect('login');
    }

    public function home(){
		return view('home');
    }
}
