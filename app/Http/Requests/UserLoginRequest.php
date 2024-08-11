<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserLoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Bài 1
        return [
            'name' => 'required|string|max:100' . $this->userId,
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|same:confirmed',
        ];

        // Bài 2
        // return [
        //     'email' => 'required|email|unique:users,email,' . $this->userId,
        //     'age' => 'nullable|integer|min:18|max:100',
        //     'avatar' => 'nullable|file|mimes:jpeg,jpg,png|max:2048'
        // ];

        // Bài 3
        // return [
        //     'is_shipping_address_same' => 'required|boolean',
        //     'shipping_address' => 'required_if:is_shipping_address_same,true',
        // ];

        // Bài 4
        // return [
        //     'user_id' => 'required|exists:users,id',
        //     'vote_star' => 'required|integer|min:1,max5',
        //     'feedback' => 'required|string|min:50|max:500',
        // ];

        
    }

    public function message(){
        return [
           'email.required' => 'Vui lòng nhập email',
           'email.email' => 'Email không đúng định dạng',
           'email.exists' => 'Email chưa được đăng ký',
           'password.required' => 'Không được để trống password',
           'password.min' => 'Password phải có ít nhất 6 ký tự',
        ];
    }
}
