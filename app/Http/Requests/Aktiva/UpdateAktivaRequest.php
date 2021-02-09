<?php

namespace App\Http\Requests\Aktiva;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAktivaRequest extends StoreAktivaRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('aktiva-edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(\Arr::except(parent::rules(), ['barang_id']), [

            // 'id' => 'required|numeric'
        ]);
    }

    public function messages()
    {
        return array_merge(parent::messages(), [

        ]);
    }
}
