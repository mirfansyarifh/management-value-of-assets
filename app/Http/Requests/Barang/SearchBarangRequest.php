<?php


namespace App\Http\Requests\Barang;


use Illuminate\Foundation\Http\FormRequest;

class SearchBarangRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('barang-index') && $this->user()->can('barang-show');
    }

    public function rules()
    {
        return [
            'nama_barang' => 'required'
        ];
    }
}