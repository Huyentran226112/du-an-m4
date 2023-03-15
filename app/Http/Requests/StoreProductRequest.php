<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'=> 'required|max:255',
            'price'=> 'required|max:255',
            'quantity'=> 'required|max:255',
            'category_id'=> 'required|max:255',
            'description'=> 'required',
            'image'=>'required',
            'status'=>'required|max:255',
        ];
        return $roles;
    }
    public function messages(){
        $messages = [
            'name.required' => 'vui long nhap ten',
            'price.required' => 'vui long nhap gia',
            'quantity.required' => 'vui long nhap so luong',
            'category_id.required' => 'vui long nhap the loai',
            'description.required' => 'vui long nhap mo ta',
            'status.required' => 'vui long nhap trang thai',
            'image.required' => 'vui long nhap anh',
        ];
        return $messages;
    }
   
}
