<?php

namespace App\Models\Resources\Barang;

use App\Models\Resources\Aktiva\Aktiva;
use App\Models\Resources\Kategori\Kategori;
use App\Models\Resources\Peminjaman\Peminjaman;
use Fico7489\Laravel\RevisionableUpgrade\Traits\RevisionableUpgradeTrait;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\RevisionableTrait;
use function Complex\theta;

/**
 * App\Models\Resources\Barang\Barang
 *
 * @property int $id
 * @property string $kode_registrasi
 * @property string $properties
 * @property string $status_guna
 * @property string $kondisi
 * @property string|null $keterangan
 * @property int $kategori_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resources\Aktiva\Aktiva[] $aktiva
 * @property-read int|null $aktiva_count
 * @property-read \App\Models\Resources\Kategori\Kategori $kategori
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereKodeRegistrasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereKondisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereStatusGuna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $kode_kanwil
 * @property string $kode_aset
 * @property string $kode_tanggal
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereKodeAset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereKodeKanwil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereKodeTanggal($value)
 * @property string $nama_barang
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang whereNamaBarang($value)
 * @property int|null $peminjaman_id
 * @property-read \App\Models\Resources\Peminjaman\Peminjaman|null $peminjaman
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Barang\Barang wherePeminjamanId($value)
 * @property boolean $keuangan_approved
 */
class Barang extends Model
{
    protected $fillable = [
        'kode_kanwil', 'kode_aset', 'kode_tanggal', 'kode_registrasi', 'nama_barang', 'properties', 'status_guna', 'kondisi', 'keterangan', 'kategori_id',
        /*'umum_approved', */'keuangan_approved'
    ];

    public function getPropertiesAttribute($value) {
        return /*(object)*/
            gettype($value) === 'string' // terkadang dia nyoba convert 2 kali aneh
                ?  json_decode($value)
                : $value;
    }

    /*public function getApakahSinkronAttribute() : bool {
        return $this->umum_approved && $this->keuangan_approved;
    }*/

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function aktiva() {
        return $this->hasOne(Aktiva::class);
    }

    public function peminjaman() {
        return $this->belongsTo(Peminjaman::class);
    }
}
