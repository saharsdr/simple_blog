<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $req){
        $this->validate($req , [
            'email'=>'required|email',
            'password'=>'required',
        ]);
        
        // sign in
        
        if (!Auth::attempt($req->only('email','password'))){
            return back()->with('status','ایمیل یا رمز نادرست است.');
        }

        // redirect
        return redirect()->route('dashboard');
    }
}
