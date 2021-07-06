<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Parser\Shortcut\ElementParser;

class PostController extends Controller
{
    public function home(){
        $posts=Post::all();
        foreach ($posts as $post) {
            $post->user_name=$post->user->name_first." ".$post->user->name_last;
            if($post->is_poll===1){
                $post->title=$post->poll->title;
            }
            else if($post->is_article===1){
                $post->title=$post->article->title;
            }
        }
        return $posts;
    }

    // Admin part
    public function admin_post_list(){
        $posts=$this->home();
        if(Auth::user()->type!==1){
            return back();
        }
        else{
            return view('admin.posts_list',['posts'=>$posts]);
        }
    }

    public function public_post_list(){
        $posts=$this->home();
        $posts=$posts->where('is_deleted',0);
        return view('users.home',['posts'=>$posts]);
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
        return view('admin.post_comments',['comments'=>$id->comments]);
    }
}
