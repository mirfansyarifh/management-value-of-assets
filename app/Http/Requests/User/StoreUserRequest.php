<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('user-create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:5'],
            'role_id' => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama User diperlukan',
            'email.required' => 'Email User diperlukan',
            'email.email' => 'Email harus berupa email',
            'email.unique:users' => 'Email ini sudah dipakai oleh akun lain',
            'password.required' => 'Password diperlukan',
            'password.string' => 'Password harus berupa string',
            'password.min:5' => 'Password harus memiliki minimal 5 karakter'
        ];
    }
}
