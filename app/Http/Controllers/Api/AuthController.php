<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\User;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public $successStatus = 200;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $name =  $request->name;
        $email =  $request->email;
        $password = bcrypt( $request->password);
        $customer = new Customer();
        $customer->email = $email;
        $customer->password = $password;
        $customer->name = $name;
        $customer->save();
        $success['token'] = $customer->createToken( $request->password)->accessToken;

        return response()->json(['success' => $success,'customer'=>$customer], $this->successStatus);
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->name;

            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }


}
