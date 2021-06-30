<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(){
        return view('users.new_article');
    }

    public function store(Request $req){
        $user=Auth::user();
        
        $this->validate($req , [
            'title'=>'required|max:500',
            'text'=>'required'
        ]);
        
        $post=new Post;
        $post->group_id=2020;
        $post->user_id=$user->id;
        $post->is_article=false;
        $post->is_poll=true;
        $post->save();

        $article=new Article;
        $article->title=$req->title;
        $article->text=$req->text;
        $article->post_id=$post->id;
        $article->save();

        return redirect(route('new_article'));
    }
}
