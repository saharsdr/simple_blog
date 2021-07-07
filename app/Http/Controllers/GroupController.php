<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;

class GroupController extends Controller
{
    public function index(){
        $group=Group::all()->reverse();
        return view('admin.groups_list',['groups'=>$group]);
    }
    public function index_new(){
        return view('admin.new_group');
    }

    public function store(Request $req){
        $this->validate($req,[
            'name'=>'required',
            'year'=>'required'
        ]);
        $year=intval($req->year);
        $group=new Group(['name'=>$req->name, 'year'=>$year]);
        $group->save();
        return redirect(route('admin_group_list'));
    }

    public function edit(Request $req, Group $id){
        $this->validate($req,[
            'name'=>'required',
            'year'=>'required'
        ]);
        $year=intval($req->year);
        $id->name=$req->name;
        $id->year=$req->year;
        $id->update();
        return redirect(route('admin_group_list'));
    }

    public function editable(Group $id){
        return view('admin.edit_group',['group'=>$id]);
    }
    public function delete(Group $id){
        $id->is_deleted=1;
        $id->update();
        return back();
    }
    public function recovery(Group $id){
        $id->is_deleted=0;
        $id->update();
        return back();
    }
}
