<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
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
        $post->is_article=true;
        $post->is_poll=false;
        $post->save();

        $article=new Article;
        $article->title=$req->title;
        $article->text=$req->text;
        $article->post_id=$post->id;
        $article->save();

        return redirect(route('new_article'));
    }

    public function editable(Article $id){
        if(Auth::user()->type===3){
            return back();
        }
        return view('users.edit_article',['article' => $id]);
    }

    public function edit_article(Request $req , Article $id){
        if(Auth::user()->type===3){
            return back();
        }
        $this->validate($req , [
            'title'=>'required|max:500',
            'text'=>'required'
        ]);
        $id->title=$req->title;
        $id->text=$req->text;
        $id->save();
        return back();
    }

    public function detail(Article $id){
        $likes=$id->post->likes;
        $likes=count($likes);
        $comments = $id->post->comments->where('is_deleted',0);
        return view('users.article',['id'=>$id , 'comments'=>$comments , 'likes'=>$likes ]);
    }
}
