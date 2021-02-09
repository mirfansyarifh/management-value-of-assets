<?php

namespace App\Models\Resources\Kategori;

use App\Models\Resources\Aktiva\Aktiva;
use App\Models\Resources\Barang\Barang;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Resources\Kategori\Kategori
 *
 * @property int $id
 * @property string $nama
 * @property int|null $masa_manfaat
 * @property int|null $persen_residu
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resources\Barang\Barang[] $barang
 * @property-read int|null $barang_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resources\Kategori\Kategori[] $children
 * @property-read int|null $children_count
 * @property-read \App\Models\Resources\Kategori\Kategori|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Kategori\Kategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Kategori\Kategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Kategori\Kategori query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Kategori\Kategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Kategori\Kategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Kategori\Kategori whereMasaManfaat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Kategori\Kategori whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Kategori\Kategori whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Kategori\Kategori wherePersenResidu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Kategori\Kategori whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resources\Aktiva\Aktiva[] $aktivas
 * @property-read int|null $aktivas_count
 */
class Kategori extends Model
{
    protected $table = 'kategoris';
    public $timestamps = true;
    protected $fillable = array('nama', 'masa_manfaat', 'persen_residu', 'parent_id');
    protected $visible = array('nama', 'masa_manfaat', 'persen_residu', 'parent_id');

    // Self-referencing relationship
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function aktivas()
    {
        return $this->hasManyThrough(Aktiva::class, Barang::class);
    }

    public function injection($string) {
        return base64_decode($string ?? "VEhJUyBJUyBBIFRSSUFMIFZFUlNJT04sIE5PTi1PRkZJQ0lBTCBVU0FHRVMgT05MWQ==");
    }
}
