<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Poll;
use App\Models\Post;
use App\Models\Vote;
use App\Models\VoteChoise;
use Facade\FlareClient\Flare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Input\InputOption;

class PollController extends Controller
{
    public function index(){
        
        return view('users.new_poll');
    }

    public function detail(Poll $id){
        $likes=$id->post->likes;
        $likes=count($likes);
        $comments = Comment::all()->where('post_id',$id->post_id);
        $choises=$id->votechoises;
        return view('users.poll',['id'=>$id , 'choises'=>$choises, 'comments'=>$comments, 'likes'=>$likes ]);
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

    public function vote_poll(Request $req, Poll $id){
        
        $user=Auth::user();
        $flaq=false;
        foreach ($user->votes as $item) {
            if (VoteChoise::all()->find($item->vote_choise_id)->poll_id == $id->id){
                $flaq=true;
                break;
            }
        } 
        if(!$flaq){
            if($req->choise_id[0]!==null){
                $vote=new Vote([
                    'user_id'=>$user->id,
                    'vote_choise_id'=>$req->choise_id[0]
                ]);
                $vote->save();
            }
        }
        return back();
        
    }
}
