<?php

namespace App\Http\Requests\Barang;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBarangRequest extends StoreBarangRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('barang-edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(\Arr::except(parent::rules(), ['kategori_id']), [
            // 'id' => 'required|numeric'
        ]);
    }

    public function messages()
    {
        return array_merge(parent::messages(), [

        ]);
    }
}
