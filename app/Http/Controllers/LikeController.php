<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id){
        $user = Auth::user();
        $like = new Like([
            'user_id'=>$user->id,
            'post_id'=>$id->post_id
        ]);
        $like->save();
        return back();
    }

    public function article_like(Article $id){
        return $this->like($id);
    }

    public function poll_like(Poll $id){
        return $this->like($id);
    }

}
