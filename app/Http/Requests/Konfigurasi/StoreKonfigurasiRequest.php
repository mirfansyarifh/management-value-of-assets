<?php

namespace App\Http\Requests\Konfigurasi;

use Illuminate\Foundation\Http\FormRequest;

class StoreKonfigurasiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('konfigurasi-create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'namaweb' => 'required',
            'email' => 'required',
            'website' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            // 'workshop' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'deskripsi' => 'required',
            // 'dashboard' => 'required',
            'logo' => 'nullable|mimes:ico,jpg,jpeg,png,x-icon,icon',
            'icon' => 'nullable|mimes:ico,jpg,jpeg,png,x-icon,icon|max:49'
        ];
    }
}
