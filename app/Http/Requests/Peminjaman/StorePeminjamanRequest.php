<?php

namespace App\Http\Requests\Peminjaman;

use Illuminate\Foundation\Http\FormRequest;

class StorePeminjamanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'pemohon_id' => 'required|numeric',
            'peninjau_id' => 'nullable',
            'barang_ids' => 'required|array',
            'status' => 'required|in:pending,approved,ditolak,selesai',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'keterangan' => 'nullable'
        ];
    }
}
