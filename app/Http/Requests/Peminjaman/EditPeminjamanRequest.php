<?php


namespace App\Http\Requests\Peminjaman;


use App\Models\Resources\Peminjaman\Peminjaman;
use Illuminate\Foundation\Http\FormRequest;

class EditPeminjamanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->can('peminjaman-edit')) {
            return true;
        } elseif ($this->user()->can('peminjaman-self-edit')) {
            return $this->user()->id === Peminjaman::find($this->route('peminjaman'))->pemohon_id;
        } else {
            return false;
        }
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