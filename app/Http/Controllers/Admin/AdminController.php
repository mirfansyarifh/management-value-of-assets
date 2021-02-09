<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Resources\Aktiva\Aktiva;
use App\Models\Resources\Barang\Barang;
use App\Models\Resources\Peminjaman\Peminjaman;

class AdminController extends Controller
{
    public function __construct()
    {
        /*$this->middleware('auth');
        $this->middleware('role:sadmin|admin|user');*/
    }
    public function homePage() {
        $aktiva_count = Barang::whereHas('aktiva')->get('id')->count();
        $barang_count = Barang::count();
        $peminjaman_pendingcount = Peminjaman::whereStatus('pending')->get('id')->count();

        $peminjamans_pending = Peminjaman::whereStatus('pending')->get();
        $aktivas_unapproved_umum = Aktiva::whereUmumApproved(false)->get();
        $aktivas_unapproved_keuangan = Aktiva::whereKeuanganApproved(false)->get();

        return view('index',
            compact('aktiva_count', 'barang_count', 'peminjamans_pending', 'aktivas_unapproved_umum', 'aktivas_unapproved_keuangan', 'peminjaman_pendingcount')
        );
    }
}
