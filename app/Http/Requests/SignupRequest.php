<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:user',
            'name' => 'required|min:2',
            'password' => 'required|min:8',
            'repassword' => 'required|min:8|same:password',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống',
            'name.min'  => 'Tên tối tiểu phải có 2 kí tự',
            'email.required' => 'Email không được bỏ trống',
            'email.email'  => 'Định dạng email không đúng',
            'email.unique' => 'Email này đã có người sử dụng',
            'password.required'  => 'Mật khẩu không được bỏ trống',
            'password.min' => 'Mật khẩu tối tiểu phải có 8 kí tự',
            'repassword.required'  => 'Mật khẩu xác nhận không được bỏ trống',
            'repassword.same' => 'Mật khẩu xác nhận không khớp',
            'repassword.min'  => 'Mật khẩu tối tiểu phải có 8 kí tự',
        ];
    }
}
