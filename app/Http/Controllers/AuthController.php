<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(!auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->back();
        }
        return redirect()->route('home');
    }

    public function getRegister(){
        return view('register');
    }

    public function postRegister(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        $user = User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => bcrypt($request->password)
        ]);
        
        // auth()->loginUsingId($user->id);

        return redirect()->route('login');
        
    }

    public function logout(){
        auth()->logout();
        return redirect() -> route('login');
    }
}
