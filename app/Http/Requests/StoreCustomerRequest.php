<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
        $roles = [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'password' => 'required|max:255',
            'phone' => 'required|max:255',
        ];
        return $roles;
    }
    public function messages(){
        $messages = [
            'name.required' => 'vui long nhap ten',
            'password.required' => 'vui long nhap mat khau',
            'address.required' => 'vui long nhap dia chi',
            'phone.required' => 'vui long nhap so dien thoai',
        ];
        return $messages;
    }
}
