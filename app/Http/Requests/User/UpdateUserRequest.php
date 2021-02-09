<?php

namespace App\Http\Requests\User;

use App\Models\Auth\User\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->can('user-edit')) {
            return true;
        } elseif ($this->user()->can('user-self-edit')) {
            return $this->user()->id === User::find($this->route('user'))->id;
        } else return false;
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
            'email' => ['required', 'email'],
            'role_id' => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama User diperlukan',
            'email.required' => 'Email User diperlukan',
            'email.email' => 'Email harus berupa email',
            'password.string' => 'Password harus berupa string',
            'password.min:5' => 'Password harus memiliki minimal 5 karakter'
        ];
    }
}
