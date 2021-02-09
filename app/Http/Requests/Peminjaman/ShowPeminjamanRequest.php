<?php

namespace App\Http\Requests\Peminjaman;

use App\Models\Resources\Peminjaman\DeadPeminjaman;
use App\Models\Resources\Peminjaman\Peminjaman;
use Illuminate\Foundation\Http\FormRequest;
use OwenIt\Auditing\Models\Audit;

class ShowPeminjamanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->can('peminjaman-show')) {
            return true;
        } elseif ($this->user()->can('peminjaman-self-show')) {
            // return $this->user()->id === Peminjaman::find($this->route('peminjaman'))->pemohon_id;
            return DeadPeminjaman::all()->contains('peminjaman_id', (int) $this->route('peminjaman')) // Apakah peminjaman sudah dihapus?
                ? $this->user()->id === Audit::whereAuditableType(get_class(new Peminjaman))->whereAuditableId((int) $this->route('peminjaman'))->whereEvent('deleted')->get()->first()->old_values['pemohon_id']
                : $this->user()->id === Peminjaman::find($this->route('peminjaman'))->pemohon_id; // Peminjaman blm dihapus
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
