<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register.index',[
            "title" => "Register"
        ]);
    }

    public function store(Request $request){
        $validateUser = $request->validate([
            'name' => 'required|max:255',
            'username' =>['required','min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validateUser['password'] = bcrypt($validateUser['password']);
        // $validateUser['password'] = Hash::make($validateUser['password']);

        User::create($validateUser);
        // dd('regis success');
        // $request->session()->flash('success', 'Registration Successfull!');
        return redirect('/login')->with('success', 'Registration Successfull!');
    }
}
