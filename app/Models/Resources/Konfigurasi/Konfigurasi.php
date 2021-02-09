<?php

namespace App\Models\Resources\Konfigurasi;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Resources\Konfigurasi\Konfigurasi
 *
 * @property int $id
 * @property string|null $website
 * @property string|null $alamat
 * @property string|null $deskripsi
 * @property string|null $logo
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi whereWebsite($value)
 * @mixin \Eloquent
 * @property string|null $email
 * @property string|null $telepon
 * @property string|null $facebook
 * @property string|null $instagram
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Konfigurasi\Konfigurasi whereTelepon($value)
 */
class Konfigurasi extends Model
{
    protected $fillable = [
        'email',
        'website',
        'telepon',
        'alamat',
        'facebook',
        'instagram',
        'deskripsi',
        'logo',
        'icon'
    ];
}
