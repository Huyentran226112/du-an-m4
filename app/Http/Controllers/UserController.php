<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $users = User::orderBy('id','DESC')->paginate(3);
        $param = [
            'users' => $users,
        ];

        return view('admin.users.index', $param);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $groups = Group::all();
        $param = [
            'groups' => $groups,

        ];
        return view('admin.users.create',$param);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // dd($request->all());
        // $this->authorize('create', User::class);
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->group_id = $request->group_id;
        $users->save();
        // alert()->success('Thêm', 'thành công');

        return redirect()->route('users.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', User::class);
        $groups = Group::all();
        $users = User::find($id);

        $param = [
            'users' => $users,
            'groups' => $groups,

        ];

        return view('admin.users.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        // dd($request);

        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->group_id = $request->group_id;
        $users->save();
        alert()->success('Thêm', 'thành công');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', Customer::class);

        $customers = User::find($id);
        $customers->delete();
        alert()->success('xóa thành công!');
        return redirect()->route('users.index');

    }
    public function viewLogin()
    {

        return view('admin.auth.login');
    }
    //xử lí đăng nhập
    public function login(LoginRequest  $request){
      $credentials = $request->validate([
          'email' => 'required',
          'password'=>'required|min:2',
      ],
          [
              'email.required'=>'Không được để trống',
              'password.required'=>'Không được để trống',
              'password.min'=>'Lớn hơn :min',
          ]
  );
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('categories.index');
        }
        // dd($request->all());
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập được cung cấp không khớp với hồ sơ của chúng tôi.',
        ])->onlyInput('email');
    }

    //Hiển Thị Đăng Ký
    public function viewRegister()
    {
        return view('admin.auth.register');
    }
    //xử lí đăng ký
    public function register(Request $request){
      $validated = $request->validate([
          'name' => 'required',
          'email' => 'required|unique:users',
          'password'=>'required|min:2',
      ],
          [
              'name.required'=>'Không được để trống',
              'email.required'=>'Không được để trống',
              'email.unique'=>'Trùng Email',
              'password.required'=>'Không được để trống',
              'password.min'=>'Lớn hơn :min',
          ]
  );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        try {
            $user->save();
            return redirect()->route('login');
        } catch (\Exception $e) {
            Log::error("message:".$e->getMessage());
        }
      }
    //đăng xuất
      public function logout(){
        Auth::logout();
        return redirect()->route('login');
      }

}
