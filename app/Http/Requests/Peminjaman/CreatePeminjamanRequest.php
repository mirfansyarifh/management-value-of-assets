<?php


namespace App\Http\Requests\Peminjaman;


use Illuminate\Foundation\Http\FormRequest;

class CreatePeminjamanRequest extends FormRequest
{
    public function authorize() {
        return $this->user()->can('peminjaman-create');
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