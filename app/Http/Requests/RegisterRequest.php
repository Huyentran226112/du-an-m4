<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules =[
            'name'=>'required',
            'password'=>'required|min:6',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ];
        return $rules ;
    }
    public function messages(): array
    {
        $messages = [
            'name.required'=>'vui nhập tên',
            'email.email'=>'email không đúng',
            'password.required'=>'nhập mật khẩu',
            'phone.required'=>'nhập số điện thoại',
            'address.required'=>'nhập địa chỉ',

        ];
        return $messages ;
    }
}
