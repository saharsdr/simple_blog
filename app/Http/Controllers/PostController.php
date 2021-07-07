<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Parser\Shortcut\ElementParser;

class PostController extends Controller
{
    public function user_layout(){
        $user=Auth::user();
        if ($user) {
            if($user->type===2){
                $layout="layouts.author";
            }
            else if($user->type===1){
                $layout="layouts.admin";
            }
        }
        else{
            $layout="layouts.base";
        }
        return $layout;
    }
    public function home(){
        $posts=Post::all()->reverse();
        foreach ($posts as $post) {
            $post->user_name=$post->user->name_first." ".$post->user->name_last;
            if($post->is_poll===1){
                $post->title=$post->poll->title;
            }
            else if($post->is_article===1){
                $post->title=$post->article->title;
            }
        }
        $user=Auth::user();
        if(!$user or $user->type!==1){
            $layout=$this->user_layout();
            $posts=$posts->where('is_deleted',0);
            return view('users.home',['posts'=>$posts, 'layout'=>$layout]);
        }
        else{
            return view('admin.posts_list',['posts'=>$posts]);
        }
    }

   
    public function admin_post_delete(Post $id){
        if(Auth::user()->type!==1){
            return back();
        }
        $id->is_deleted=1;
        $id->save();
        return back();
    }

    public function admin_post_recovery(Post $id){
        if(Auth::user()->type!==1){
            return back();
        }
        $id->is_deleted=0;
        $id->save();
        return back();
    }

    public function admin_comments(Post $id){
        if(Auth::user()->type!==1){
            return back();
        }
        $layout=$this->user_layout();
        return view('admin.post_comments',['comments'=>$id->comments , 'layout'=>$layout]);
    }
}
