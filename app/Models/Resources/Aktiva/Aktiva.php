<?php

namespace App\Models\Resources\Aktiva;

use App\Models\Resources\Barang\Barang;
use App\Models\Resources\Kategori\Kategori;
use Fico7489\Laravel\RevisionableUpgrade\Traits\RevisionableUpgradeTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Venturecraft\Revisionable\RevisionableTrait;
use Znck\Eloquent\Traits\BelongsToThrough;

/**
 * App\Models\Resources\Aktiva\Aktiva
 *
 * @property int $id
 * @property float $nilai_perolehan
 * @property float $nilai_buku
 * @property Date $tgl_perolehan
 * @property boolean $umum_approved
 * @property boolean $keuangan_approved
 * @property int $barang_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Resources\Barang\Barang $barang
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @property-read int|null $revision_history_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva whereNilaiBuku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva whereNilaiPerolehan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva whereTglPerolehan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property float|null $penurunan_nilai
 * @property-read int $tahun_perolehan
 * @property-read int $bulan_perolehan
 * @property-read Model $created_by
 * @property-read Model $last_updated_by
 * @property-read int $last_updated_by_id
 * @property-read string $last_updated_by_role_name
 * @property-read Collection $history
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva wherePenurunanNilai($value)
 * @property-read string $apakah_sinkron
 * @property-read string $approved_by
 * @property-read int $hari_perolehan
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva whereKeuanganApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resources\Aktiva\Aktiva whereUmumApproved($value)
 */

class Aktiva extends Model
{
    use RevisionableTrait;
    use RevisionableUpgradeTrait;
    use BelongsToThrough;

    protected $table = 'aktivas';
    public $timestamps = true;
    protected $fillable = array('nilai_perolehan', 'nilai_buku', 'tgl_perolehan', 'penurunan_nilai', 'umum_approved', 'keuangan_approved', 'barang_id');
    protected $visible = array('nilai_perolehan', 'nilai_buku', 'tgl_perolehan', 'penurunan_nilai', 'umum_approved', 'keuangan_approved', 'barang_id');
    // protected $appends = ['tahun_perolehan', 'bulan_perolehan', 'created_by', 'last_updated_by', 'last_updated_by_id', 'last_updated_by_role_name', 'history'];
    protected $revisionCreationsEnabled = true;

    // Pemakaian Functions
    public function getUmDariPerolehanSampaiAkhirTahunLalu(int $year) : int { // ROOT FUNCTION
        if (Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->year === $year) {
            return 0; // kalau aktiva baru ada tahun ini berarti masih nol
        }
        elseif (Carbon::createFromDate($year, 12, 31)->subYear()->diffInMonths(Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))) + 1 > $this->barang->kategori->masa_manfaat) {
            return $this->barang->kategori->masa_manfaat; // kalau udah lewat limit maka mentok
        } else {
            return Carbon::createFromDate($year, 12, 31)->subYear()->diffInMonths(Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))) + 1; // default
        }
    }

    public function getUmDariAwalTahunSampaiBulanIni(int $year, int $month) : int { // ROOT FUNCTION
        if(Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->year === $year && Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->month === $month) {
            return 0; // jika nilai dilihat ketika baru dibuat
        } elseif ($this->getUmDariPerolehanSampaiAkhirTahunLalu($year) + Carbon::createFromDate($year, 1, 1)->diffInMonths(Carbon::createFromDate($year, $month)) + 1 > $this->barang->kategori->masa_manfaat) {
            return 0; // jika udh lewat masanya
        } elseif (Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->year === $year && Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->month !== $month) {
            return $month - Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->month;
        } else {
            return Carbon::createFromDate($year, 1, 1)->diffInMonths(Carbon::createFromDate($year, $month)) + 1;
        }
    }

    public function getUmDariPerolehanSampaiBulanIni(int $year, int $month): int {
        $jumlah = $this->getUmDariPerolehanSampaiAkhirTahunLalu($year) + $this->getUmDariAwalTahunSampaiBulanIni($year, $month);
        if ($jumlah > $this->barang->kategori->masa_manfaat) {
            return $this->barang->kategori->masa_manfaat;
        } else {
            return $jumlah;
        }
    }

    public function getSisaMasaManfaatSampaiAkhirTahunLalu(int $year) : int {
        $sisa = $this->barang->kategori->masa_manfaat - $this->getUmDariPerolehanSampaiAkhirTahunLalu($year);
        return $sisa < 1
            ? 0
            : $sisa;
    }

    public function apakahUmUdahSampaiLimit($year, $month) : bool {
        return $this->getUmDariPerolehanSampaiBulanIni($year, $month) === $this->barang->kategori->masa_manfaat;
    }

    public function apakahDiperolehSebelum2008() : bool {
        return Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->year < 2008;
    }

    public function apakahSudahAdaPadaTahun($year) : bool {
        return Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->year <= $year;
    }

    public function apakahSudahAdaPadaTahunDanBulan($year, $month) : bool {
        return Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->lessThanOrEqualTo(Carbon::createFromDate($year, $month));
    }

    // Penyusutan Functions
    public function getNilaiResidu(int $year, int $month) : float {
        if ($this->apakahDiperolehSebelum2008() && $this->apakahUmUdahSampaiLimit($year, $month)) {
            return 1.0;
        } else {
            return $this->nilai_perolehan * (float)$this->barang->kategori->persen_residu / 100.0;
        }
    }

    public function getNilaiPenyusutan(int $year, int $month) : float {
        return ($this->nilai_perolehan - $this->getNilaiResidu($year, $month)) / (float)$this->barang->kategori->masa_manfaat;
    }

    public function getPenyusutanBulanIni(int $year, int $month) : float {
        if ($this->apakahUmUdahSampaiLimit($year, $month)) {
            return 0.0;
        } else {
            return $this->getNilaiPenyusutan($year, $month);
        }
    }

    public function getAkmPenyusutanDariPerolehanSampaiAkhirTahunLalu(int $year, int $month) : float {
        return $this->getNilaiPenyusutan($year, $month) * $this->getUmDariPerolehanSampaiAkhirTahunLalu($year);
    }

    public function getNilaiYangDapatDisusutkan(int $year, int $month) : float {
        if ($this->apakahUmUdahSampaiLimit($year, $month)) {
            return 0.0;
        } else {
            return $this->getNilaiPenyusutan($year, $month) * $this->getSisaMasaManfaatSampaiAkhirTahunLalu($year);
        }
    }

    public function getAkmDariAwalTahunSampaiBulanLalu(int $year, int $month) : float {
        if ($this->apakahUmUdahSampaiLimit($year, $month)) {
            return 0.0;
        } elseif (Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->year === $year && Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->month === $month) {
            return 0.0; // jika nilai dilihat ketika baru dibuat
        } else {
            return $this->getNilaiPenyusutan($year, $month) * floatval($this->getUmDariAwalTahunSampaiBulanIni($year, $month) - 1);
        }
    }

    public function getAkmDariAwalTahunSampaiBulanIni(int $year, int $month) : float {
        if ($this->apakahUmUdahSampaiLimit($year, $month)) {
            return 0.0;
        } else {
            return $this->getAkmDariAwalTahunSampaiBulanLalu($year, $month) + $this->getPenyusutanBulanIni($year, $month);
        }
    }

    public function getAkmDariPerolehanSampaiBulanIni(int $year, int $month) : float {
        return floatval($this->getUmDariPerolehanSampaiBulanIni($year, $month)) * $this->getNilaiPenyusutan($year, $month);
    }

    // Nilai Buku Function
    public function getNilaiBuku(int $year, int $month) {
        $perolehanDikurangiAkm = $this->nilai_perolehan - $this->getAkmDariPerolehanSampaiBulanIni($year, $month);
        if ($this->kategori->nama === 'tanah') {
            return $this->nilai_perolehan; // kalau kategori tanah, tidak mengalami penyusutan
        } elseif (!$this->apakahSudahAdaPadaTahunDanBulan($year, $month)) {
            return 0; // kalau aktivanya blm ada pas waktu tsb brarti nilai bukunya nol
        } elseif ($this->barang->kondisi === 'hilang') {
            return 0; // kalau hilang kata irfan nol
        } elseif ($year === Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->year && $month === Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->month) {
            return $this->nilai_perolehan; // jika dilihat pada tahun dan bulan yang sama dg pas tgl perolehan, maka nilai buku = nilai perolehan
        } elseif ($this->apakahUmUdahSampaiLimit($year, $month) && $this->apakahDiperolehSebelum2008()) {
            return 1; // hukum sebelum 2008: jika udh lewat masa manfaat maka nilai buku = 1
        } else {
            return $perolehanDikurangiAkm;
        }
    }

    public function getTahunPerolehanAttribute() : int {
        return Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->year;
    }

    public function getBulanPerolehanAttribute() : int {
        return Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->month;
    }

    public function getHariPerolehanAttribute() : int {
        return Carbon::instance(new \DateTimeImmutable($this->tgl_perolehan))->day;
    }

    public function getLastUpdatedByAttribute() : Model {
        //return new User((array) $this->userUpdated() ?? $this->userCreated());
        return $this->userUpdated() ?? $this->userCreated();
    }

    public function getCreatedByAttribute() : Model {
        return $this->userCreated();
    }

    public function getLastUpdatedByIdAttribute() : int {
        return $this->userUpdated()->id ?? $this->userCreated()->id;
    }

    public function getLastUpdatedByRoleNameAttribute() : string {
        return $this->last_updated_by->roles->first()->name;
    }

    // approved_by
    public function getApprovedByAttribute() : string { // hanya gunakan fungsi ini di tampilan, jgn di hitung2
        // return $this->umum_approved ? 'umum' : 'keuangan';
        if ($this->keuangan_approved && !$this->umum_approved) {
            return 'keuangan';
        } elseif ($this->umum_approved && !$this->keuangan_approved) {
            return 'umum';
        } elseif ($this->umum_approved && $this->keuangan_approved) {
            return 'sinkron';
        } else {
            return '';
        }
    }

    public function getApakahSinkronAttribute(): string {
        return $this->keuangan_approved && $this->umum_approved
            ? 'true'
            : 'false';
    }

    function getHistoryAttribute() : Collection {
        return $this->revisionHistory->groupBy(
            fn($revision) => $revision->created_at->toDateTimeString()
        );
    }

    /*protected $casts = [
        'tgl_perolehan' => 'date',
    ];*/

    protected $revisionFormattedFields = [
        'keuangan_approved' => 'boolean:Not Approved|Approved',
        'umum_approved' => 'boolean:Not Approved|Approved',
        'created_at' => 'datetime:m/d/Y g:i A'
    ];

    protected $revisionFormattedFieldNames = [
        'nilai_perolehan' => 'Nilai Perolehan',
        'tgl_perolehan' => 'Tanggal Perolehan',
        'created_at' => 'Dibuat pada',
        'keuangan_approved' => 'Approval Bag. Keuangan',
        'umum_approved' => 'Approval Bag. Umum'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function kategori()
    {
        return $this->belongsToThrough(Kategori::class, Barang::class);
    }

}
