<?php

namespace App\Models\Resources\Peminjaman;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Resources\Peminjaman\DeadPeminjaman
 *
 * @property int $id
 * @property int $peminjaman_id
 * @property array $barang_ids
 * @property string $time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\DeadPeminjaman newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\DeadPeminjaman newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\DeadPeminjaman query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\DeadPeminjaman whereBarangIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\DeadPeminjaman whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\DeadPeminjaman wherePeminjamanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\DeadPeminjaman whereTime($value)
 * @mixin \Eloquent
 */
class DeadPeminjaman extends Model
{
    protected $fillable = ['peminjaman_id', 'barang_ids', 'time'];
    public $timestamps = false;
    protected $table = 'deleted_peminjamans';

    protected $casts = [
        'barang_ids' => 'array'
    ];
}
