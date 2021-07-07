<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(){
        $group=Group::get();
        return view('admin.new_group',['group'=>$group]);
    }

    public function store(Request $req){
        $this->validate($req,[
            'name'=>'required|string',
            'year'=>'required'
        ]);
        $group=new Group(['name'=>$req->name, 'year'=>$req->year]);
        $group->save();
        return back();
    }
}
