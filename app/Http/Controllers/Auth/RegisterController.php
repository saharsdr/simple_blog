<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $req){
       
        // validation
        $this->validate($req , [
            'name'=>'required|max:255',
            'last_name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
            'student_number'=>'required',
        ]);
        
        // store
        User::create([
            'name_first'=>$req->name,
            'name_last'=>$req->last_name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
            'student_number'=>$req->student_number,
            'type'=>3,
        ]);

        // sign in
        Auth::attempt($req->only('email','password'));

        // redirect
        return redirect()->route('home');
    }
}
