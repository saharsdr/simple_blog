<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
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
    public function index(){
        $layout=$this->user_layout();
        return view('users.new_article',['layout'=>$layout]);
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

        return redirect('/');
    }

    public function editable(Article $id){
        if(Auth::user()->type===3){
            return back();
        }
        $layout=$this->user_layout();
        return view('users.edit_article',['article' => $id , 'layout'=>$layout]);
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
        return redirect('/');;
    }

    public function detail(Article $id){
        $likes=$id->post->likes;
        $likes=count($likes);
        $comments = $id->post->comments->where('is_deleted',0);
        $layout=$this->user_layout();
        return view('users.article',['id'=>$id , 'comments'=>$comments , 'likes'=>$likes, 'layout'=>$layout ]);
    }
}
