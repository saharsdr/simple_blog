<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function new_comment(Request $req, Poll $id){
        

        
        $commnet=new Comment;
        $this->validate($req,[
            'comment_content'=>'required'
        ]);
        $commnet->post_id = $id->post_id;
        $commnet->text = $req->comment_content;
        $user=Auth::user();
        if($user !== null){
            $commnet->user_id=$user->id;
            $commnet->name = $user->name_first." ".$user->name_last;
            $commnet->email =$user->email;
        }
        else{
            $this->validate($req,[
                'comment_name'=>'required',
                'comment_email'=>'required|email'
            ]);
            $commnet->name = $req->comment_name;
            $commnet->email = $req->comment_email;
            $commnet->text = $req->comment_content;
        }
        
        $commnet->save();
        return back();
    }
}