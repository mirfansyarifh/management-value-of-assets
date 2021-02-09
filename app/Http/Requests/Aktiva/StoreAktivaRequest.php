<?php

namespace App\Http\Requests\Aktiva;

use Illuminate\Foundation\Http\FormRequest;

class StoreAktivaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('aktiva-create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nilai_perolehan' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'tgl_perolehan' => 'required|date',
            'penurunan_nilai' => 'nullable',
            'barang_id' => 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'nilai_perolehan.required' => 'Nilai perolehan harus diisi',
            'nilai_perolehan.numeric' => 'Nilai perolehan harus berupa angka bulat atau desimal(dengan titik sebagai pemisah desimal)',
            'nilai_perolehan.regex' => 'Nilai perolehan harus memiliki maks dua angka dibelakang titik',
            'tgl_perolehan.required' => 'Tanggal harus ada',
            'tgl_perolehan.date' => 'Tanggal harus berupa tanggal',
            'barang_id.required' => 'Barang harus dipilih'
        ];
    }
}
