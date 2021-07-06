<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    
    public function new_comment(Request $req, $id){
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
    public function poll_new_comment(Request $req, Poll $id){      
        return $this->new_comment($req,$id);
    }

    public function article_new_comment(Request $req, Article $id){        
        return $this->new_comment($req,$id);
    }

    public function delete_comment(Comment $id){
        $id->is_deleted=1;
        $id->save();
        return back();
    }
    public function recovery_comment(Comment $id){
        $id->is_deleted=0;
        $id->save();
        return back();
    }
    
}
