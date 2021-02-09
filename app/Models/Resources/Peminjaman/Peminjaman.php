<?php

namespace App\Models\Resources\Peminjaman;

use App\Models\Auth\User\User;
use App\Models\Resources\Barang\Barang;
use Carbon\Carbon;
use Fico7489\Laravel\RevisionableUpgrade\Traits\RevisionableUpgradeTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Venturecraft\Revisionable\RevisionableTrait;

/**
 * App\Models\Resources\Peminjaman\Peminjaman
 *
 * @property-read \App\Models\Auth\User\User $pemohon
 * @property-read \App\Models\Auth\User\User $peninjau
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $pemohon_id
 * @property int|null $peninjau_id
 * @property string $status
 * @property string $properties
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman wherePemohonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman wherePeninjauId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman whereTglSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Peminjaman\Peminjaman whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resources\Barang\Barang[] $barangs
 * @property-read int|null $barangs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property mixed $old_barangs
 * @property-read bool $sudah_lewat
 */
class Peminjaman extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['pemohon_id', 'peninjau_id', 'status', 'properties', 'tgl_mulai', 'tgl_selesai', 'keterangan', 'old_barangs'];
    protected $table = 'peminjamans';
    protected $revisionCreationsEnabled = true;

    public function getPropertiesAttribute($value) {
        return /*(object)*/
            gettype($value) === 'string'
                ?  json_decode($value)
                : $value;
    }

    public function getSudahLewatAttribute() : bool {
        return Carbon::now() > Carbon::createFromImmutable(new \DateTimeImmutable($this->tgl_selesai));
    }

    public function pemohon() {
        return $this->belongsTo(User::class, 'pemohon_id', 'id');
    }

    public function peninjau() {
        return $this->belongsTo(User::class, 'peninjau_id', 'id');
    }

    public function barangs() {
        return $this->hasMany(Barang::class);
    }

    /*public function getOldBarangsAttribute() { // ONLY USE THIS ON DELETED PEMINJAMAN
        if (DeadPeminjaman::wherePeminjamanId($this->id)->get()->count() < 1) {
            return null;
        }
        $dead_peminjaman_barang_ids = DeadPeminjaman::wherePeminjamanId($this->id)->get()->pluck('barang_ids')->flatten()->unique()->all();
        return Barang::whereIn('id', $dead_peminjaman_barang_ids)->get();
    }*/
}
