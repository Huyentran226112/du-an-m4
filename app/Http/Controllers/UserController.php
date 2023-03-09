<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function viewLogin()
    {

        return view('admin.auth.login');
    }
    //xử lí đăng nhập
    public function login(Request $request){
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
