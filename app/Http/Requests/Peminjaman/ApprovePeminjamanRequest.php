<?php


namespace App\Http\Requests\Peminjaman;


use Illuminate\Foundation\Http\FormRequest;

class ApprovePeminjamanRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('peminjaman-edit');
    }

    public function rules()
    {
        return [];
    }
}