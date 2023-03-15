<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'group_id' => 'required|max:255',
            
        ];
        return $roles;
    }
    public function messages(){
        $messages = [
            'name.required' => 'vui long nhap ten',
            'email.required' => 'vui long nhap email',
            'password.required' => 'vui long nhap mat khau',
            'group_id.required' => 'vui long nhap phan quyen',
        ];
        return $messages;
    }
    
}
