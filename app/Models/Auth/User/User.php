<?php

namespace App\Models\Auth\User;

use App\Models\Resources\Peminjaman\Peminjaman;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Auth\User\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $nip
 * @property string $jabatan
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resources\Peminjaman\Peminjaman[] $pemohon
 * @property-read int|null $pemohon_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resources\Peminjaman\Peminjaman[] $penyetuju
 * @property-read int|null $penyetuju_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resources\Peminjaman\Peminjaman[] $peninjau
 * @property-read int|null $peninjau_count
 * @property-read mixed $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User\User whereNip($value)
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nip', 'jabatan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleAttribute() {
        return $this->roles->first()->name;
    }

    public function pemohon() {
        return $this->hasMany(Peminjaman::class, 'pemohon_id', 'id');
    }

    public function peninjau() {
        return $this->hasMany(Peminjaman::class, 'peninjau_id', 'id');
    }
}
