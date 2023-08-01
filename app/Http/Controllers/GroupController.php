<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Group::class);
        $groups = Group::all();
        $users= User::get();
        $param = [
            'groups'=>$groups,
            'users' =>$users,

        ];
        return view('admin.groups.index',$param);
     }
     public function create()
     {
        $this->authorize('create', Group::class);

         return view('admin.groups.create');
     }

     public function store(Request $request)
    {
        $this->authorize('create', Group::class);

        $notification = [
            'addgroup' => 'Thêm Tên Quyền Thành Công!',
        ];
        $group=new Group();
        $group->name=$request->name;
        $group->save();
        return redirect()->route('groups.index');
    }
    public function edit($id)
    {
        $this->authorize('update', Group::class);

        $group = Group::find($id);
        $roles = Role::all();
        return view('admin.groups.edit', compact('group','roles') );
    }
    public function group_detail(Request $request,$id)
    {
        $this->authorize('view', Group::class);

        $notification = [
            'message' => 'Cấp Quyền Thành Công!',
            'alert-type' => 'success'
        ];
        $group= Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);
        return redirect()->route('groups.index')->with($notification);;
    }
    public function update(Request $request, $id)
    {
        $this->authorize('update', Group::class);

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
        $this->authorize('delete', Group::class);

        $group = Group::find($id);
        $group->delete();
        return redirect()->route('groups.index');

    }
    public function detail($id)
    {
        $this->authorize('view', Group::class);
        $group=Group::find($id);

        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        // dd($userRoles);
        $roles = Role::all()->toArray();
        $group_names = [];
        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return view('admin.groups.detail',$params);
    }

}
