<?php


namespace App\Http\Requests\User;


use App\Models\Auth\User\User;
use Illuminate\Foundation\Http\FormRequest;

class ShowUserRequest extends FormRequest
{
    public function authorize()
    {
        if ($this->user()->can('user-show')) {
            return true;
        } elseif ($this->user()->can('user-self-show')) {
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
            //
        ];
    }
}