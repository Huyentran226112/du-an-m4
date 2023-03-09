<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        $param = [
            'groups'=>$groups,

        ];
        return view('admin.groups.index',$param);
     }
     public function create()
     {
         return view('admin.groups.create');
     }

     public function store(Request $request)
    {
        // $notification = [
        //     'addgroup' => 'Thêm Tên Quyền Thành Công!',
        // ];
        $group=new Group();
        $group->name=$request->name;
        $group->save();
        return redirect()->route('groups.index');
    }
    public function edit($id)
    {
        $group = Group::find($id);
        return view('admin.groups.edit', compact('group') );
    }
    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group->name = $request->name;
        $group->save();
        // $notification = [
        //     'message' => 'Chỉnh Sửa Thành Công!',
        //     'alert-type' => 'success'
        // ];
        return redirect()->route('groups.index');
    }
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        return redirect()->route('groups.index');

    }
}
