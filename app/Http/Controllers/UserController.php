<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function admin_users_list(){
        $users=User::all();
        return view('admin.users_list',['users'=>$users]);
    }

    public function profile(User $user){
        return view('users.profile',['user'=>$user]);
    }
    public function admin_unconfrim_user(User $user){
        $user->is_active=0;
        $user->save();
        return back();
    }
    public function admin_confrim_user(User $user){
        $user->is_active=1;
        $user->save();
        return back();
    }
    public function admin_set_user_author(User $user){
        $user->type=2;
        $user->save();
        return back();
    }
    public function admin_unset_user_author(User $user){
        $user->type=3;
        $user->save();
        return back();
    }

    
}
