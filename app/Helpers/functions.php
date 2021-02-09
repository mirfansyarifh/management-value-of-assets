<?php

use App\Models\Resources\Aktiva\Aktiva;
use App\Models\Resources\Barang\Barang;
use App\Models\Resources\Kategori\Kategori;
use App\Models\Resources\Peminjaman\DeadPeminjaman;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * @param string $string
 * @param bool $nbsp <p>
 * Return string with non-breaking space,
 * default value is false.
 * </p>
 * @return string
 */
function replaceUnderscoreWithSpace(string $string, bool $nbsp = false) {
    return $nbsp ? str_replace('_', '&nbsp;', $string) : str_replace('_', ' ', $string);
}

/**
 * @param array $array
 * @param string $childKey
 * @return array
 */
function getMembersHaveChildren(array $array, string $childKey = 'children') {
    return array_filter($array, function ($arr) use ($childKey) {
        return array_key_exists($childKey, $arr);
    });
}

function filterStringsContains(Collection $collection, string $filter) : array {
    return $collection->filter(function ($value, $key) use ($filter) {
        return str_contains($value, $filter);
    })->toArray();
}

function filterStringsContainsExcept(Collection $collection, string $filter) : array {
    return $collection->filter(function ($value, $key) use ($filter) {
        return !str_contains($value, $filter);
    })->toArray();
}

/**
 * @param array $array
 * @param string $childKey
 * @return array
 */
function getMembersNotHaveChildren(array $array, string $childKey = 'children') {
    return array_filter($array, function ($arr) use ($childKey) {
        return !array_key_exists($childKey, $arr);
    });
}

function getMembersWithAttribute(array $array, string $key = 'nama') {
    return array_map(function ($arr) use ($key) {
        return $arr[$key];
    }, $array);
}

function getKategoriesNameFromBroadCategory(string $broadCategory) : array {
    return Kategori::whereNama($broadCategory)->get()->first()->children->pluck('nama')->count() > 0
        ? Kategori::whereNama($broadCategory)->get()->first()->children->pluck('nama')->all()
        : Kategori::whereNama($broadCategory)->get()->pluck('nama')->all();
}

function getCategoriesIdFromBroadCategory(string $broadCategory) : array {
    return Kategori::whereNama($broadCategory)->get()->first()->children->pluck('id')->count() > 0
        ? Kategori::whereNama($broadCategory)->get()->first()->children->pluck('id')->all()
        : Kategori::whereNama($broadCategory)->get()->pluck('id')->all();
}

function getProperty(Barang $barang) : array {
    switch ($barang->kategori->parent->nama ?? $barang->kategori->nama) {
        case 'tanah':
            return ['sertifikat' => $barang->properties->sertifikat];
        case 'kendaraan':
            return ['nopolis' => $barang->properties->nomor->nopolis, 'merk' => $barang->properties->merk];
            break;
        case 'peralatan_komputer':
        case 'lain-lain':
        case 'peralatan_kantor':
            return ['merk' => $barang->properties->merk];
            break;
        default:
            return [];
            break;
    }
}

function generateBarangsByBroadCategory(string $broadCategory) : \Illuminate\Database\Eloquent\Collection {
    $categories = getKategoriesNameFromBroadCategory($broadCategory);
    return Barang::hydrate(collect(Barang::with('kategori')->get()->groupBy('kategori.nama')->toArray())->only($categories)->flatten(1)->all());
}

function getAktivaByYearAndMonth(int $year, int $month) : Collection {
    $from = Carbon::createFromDate($year, $month)->startOfMonth();
    $to = Carbon::createFromDate($year, $month)->endOfMonth();
    return Aktiva::whereBetween('tgl_perolehan', [$from, $to])->get();
}

function getAktivasThatAlreadyExistsUntilYearAndMonth(int $year, int $month) : \Illuminate\Database\Eloquent\Collection {
    return Aktiva::where('tgl_perolehan', '<=', Carbon::createFromDate($year, $month)->lastOfMonth())->get();
}

function filterAktivasByBroadCategory(Collection $aktivas, string $broadCategory) : Collection {
    $categories = getKategoriesNameFromBroadCategory($broadCategory);
    return collect($aktivas->groupBy('barang.kategori.nama')->toArray())->only($categories)->flatten(1);
}

function getOldBarangs(int $id) : ?Collection {
    if (DeadPeminjaman::wherePeminjamanId($id)->get()->count() < 1) {
        return null;
    }
    $dead_peminjaman_barang_ids = DeadPeminjaman::wherePeminjamanId($id)->get()->pluck('barang_ids')->flatten()->unique()->all();
    return Barang::whereIn('id', $dead_peminjaman_barang_ids)->get();
}

function getMonthNames() : array {
    return [
        1 => 'januari',
        2 => 'februari',
        3 => 'maret',
        4 => 'april',
        5 => 'mei',
        6 => 'juni',
        7 => 'juli',
        8 => 'agustus',
        9 => 'september',
        10 => 'oktober',
        11 => 'november',
        12 => 'desember'
    ];
}

function numberToMonthName(int $monthNumber): string {
    return [
        'januari',
        'februari',
        'maret',
        'april',
        'mei',
        'juni',
        'juli',
        'agustus',
        'september',
        'oktober',
        'november',
        'desember'
    ][$monthNumber - 1];
}

function getNumberFromString(string $string) : int {
    return abs((int) filter_var($string, FILTER_SANITIZE_NUMBER_INT));
}
