<?php


namespace App\Providers;


use App\Models\Resources\Barang\Barang;

class NotifStatusGunaServiceProvider
{
    public function getNotifs(string $role) {
        $barangs = Barang::all()->where('apakah_sinkron', '!=', true);

        switch ($role) {
            case 'keuangan':
                return $barangs->where('keuangan_approved', '=',false);
                break;
            case 'umum':
                return $barangs->where('umum_approved', '=',false);
                break;
            default:
                return collect([]);
                break;
        }
    }
}