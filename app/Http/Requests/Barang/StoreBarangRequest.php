<?php

namespace App\Http\Requests\Barang;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('barang-create');
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'properties' => json_encode($this->properties)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_barang' => 'required',
            'kode_kanwil' => 'required',
            'kode_aset' => 'required',
            'kode_tanggal' => 'required',
            'kode_registrasi' => 'required',
            'properties' => 'nullable',
            'status_guna' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'nullable',
            'kategori_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_barang.required' => 'Data diperlukan',
            'kode_kanwil.required' => 'Data diperlukan',
            'kode_aset.required' => 'Data diperlukan',
            'kode_tanggal.required' => 'Data diperlukan',
            'kode_registrasi.required' => 'Data diperlukan',
            'properties.required' => 'Data diperlukan',
            'status_guna.required' => 'Data guna diperlukan',
            'kondisi.required' => 'Data diperlukan',
            'kategori_id.required' => 'Data harus dipilih'
        ];
    }

    protected function getValidatorInstance()
    {
        return parent::getValidatorInstance()->after(function () {
            //dd($this);
        });
    }
}
