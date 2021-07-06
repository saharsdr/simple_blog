<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function admin_users_list(){
        if(Auth::user()->type!==1){
            return back();
        }
        $users=User::all();
        return view('admin.users_list',['users'=>$users]);
    }

    public function profile(User $user){
        if(Auth::user()->type!==1 or Auth::user()->id!==$user){
            return back();
        }
        return view('users.profile',['user'=>$user]);
    }
    public function admin_unconfrim_user(User $user){
        if(Auth::user()->type!==1){
            return back();
        }
        $user->is_active=0;
        $user->save();
        return back();
    }
    public function admin_confrim_user(User $user){
        if(Auth::user()->type!==1){
            return back();
        }
        $user->is_active=1;
        $user->save();
        return back();
    }
    public function admin_set_user_author(User $user){
        if(Auth::user()->type!==1){
            return back();
        }
        $user->type=2;
        $user->save();
        return back();
    }
    public function admin_unset_user_author(User $user){
        if(Auth::user()->type!==1){
            return back();
        }
        $user->type=3;
        $user->save();
        return back();
    }

    
}
