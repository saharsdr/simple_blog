<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Poll;
use App\Models\Post;
use App\Models\VoteChoise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    public function index(){
        
        return view('users.new_poll');
    }

    public function detail(Poll $id){
        $comments = Comment::all()->where('post_id',$id->post_id);
        $choises=$id->votechoises;
        return view('users.poll',['id'=>$id , 'choises'=>$choises, 'comments'=>$comments]);
    }

    public function editable(Poll $id){
        $choises=$id->votechoises;
        return view('users.edit_poll',['id'=>$id , 'choises'=>$choises]);
    }
    
    public function edit(Request $req , Poll $id){
        $this->validate($req,[
            'title'=>'required|max:500'
        ]);
        $id->title=$req->title;
        $id->description=$req->text_area;
        $id->save();
        
        if ($req->choise_new !== null) {
            foreach($req->choise_new as $newCh){
                $voteCh=new VoteChoise;
                $voteCh->poll_id=$id->id;
                $voteCh->choise=$newCh;
                $voteCh->save();                
            }
        }
        
        if ($req->choise_del !== null) {
            $vote_choises=VoteChoise::all();
            foreach($req->choise_del as $delCh){
                $delMe=$vote_choises->where('poll_id',$id->id)->where('choise',$delCh)->first();
                if($delMe!==null){
                    $delMe->delete();
                }
            }
        }
        
        return back();
    }

    public function store(Request $req){
        //
        $user_id=Auth::user()->id;
        
        $this->validate($req , [
            'title'=>'required|max:500'
        ]);
        
        $post=new Post;
        $post->group_id=2020;
        $post->user_id=$user_id;
        $post->is_article=false;
        $post->is_poll=true;
        $post->save();

        $poll=new Poll;
        $poll->description=$req->description;
        $poll->title=$req->title;
        $poll->post_id=$post->id;
        $poll->save();

        foreach($req->choise_id as $choise){
            if($choise!==null){
                $new_choise=new VoteChoise;
                $new_choise->poll_id=$poll->id;
                $new_choise->choise=$choise;
                $new_choise->save();
            }
        }
        
        return redirect('/');
    }
}
