<?php

namespace App\Http\Controllers;

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
        $choises=$id->votechoises;
        return view('users.poll',['id'=>$id , 'choises'=>$choises]);
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
