<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Parser\Shortcut\ElementParser;

class PostController extends Controller
{
    // Admin part
    public function admin_post_list(){
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
        // dd($posts);
        return view('admin.posts_list',['posts'=>$posts]);
    }

    public function admin_post_delete(Post $id){
        $id->is_deleted=1;
        $id->save();
        return back();
    }
}
