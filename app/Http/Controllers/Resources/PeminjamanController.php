<?php


namespace App\Http\Controllers\Resources;


use App\Http\Controllers\Controller;
use App\Http\Requests\Peminjaman\ApprovePeminjamanRequest;
use App\Http\Requests\Peminjaman\CreatePeminjamanRequest;
use App\Http\Requests\Peminjaman\DeletePeminjamanRequest;
use App\Http\Requests\Peminjaman\EditPeminjamanRequest;
use App\Http\Requests\Peminjaman\IndexPeminjamanRequest;
use App\Http\Requests\Peminjaman\ShowPeminjamanRequest;
use App\Http\Requests\Peminjaman\StorePeminjamanRequest;
use App\Http\Requests\Peminjaman\UpdatePeminjamanRequest;
use App\Models\Resources\Barang\Barang;
use App\Models\Resources\Peminjaman\DeadPeminjaman;
use App\Models\Resources\Peminjaman\Peminjaman;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Support\Carbon;

class PeminjamanController extends Controller
{

    public function index(IndexPeminjamanRequest $request)
    {
        if ($request->user()->can('peminjaman-self-index')) {
            $peminjamans_pending = Peminjaman::whereIn('status', ['pending', 'ditolak'])->where('pemohon_id', '=', $request->user()->id)->get();
            $peminjamans_approved = Peminjaman::whereIn('status', ['approved', 'selesai'])->where('pemohon_id', '=', $request->user()->id)->get();
            // Past peminjamans

            /*$getBarangs = function ($id) {
                if (DeadPeminjaman::wherePeminjamanId($id)->get()->count() < 1) {
                    return null;
                }
                $dead_peminjaman_barang_ids = DeadPeminjaman::wherePeminjamanId($id)->get()->pluck('barang_ids')->flatten()->unique()->all();
                return Barang::whereIn('id', $dead_peminjaman_barang_ids)->get();
            };*/

            $past_peminjamans = Peminjaman::hydrate(
                Audit::whereAuditableType(get_class(new Peminjaman))->whereEvent('deleted')->get()->pluck('old_values')->where('pemohon_id', $request->user()->id)->all()
            );

            $past_peminjamans->each(function (Peminjaman $peminjaman) {
                $peminjaman->old_barangs = getOldBarangs($peminjaman->id);
            });

            return view('resources.peminjamans.index', compact('peminjamans_pending', 'peminjamans_approved', 'past_peminjamans'));
        } else {
            abort(403);
            return null;
        }
    }

    public function requests(IndexPeminjamanRequest $request) {
        if ($request->user()->can('peminjaman-index')) {
            $peminjamans_pending = Peminjaman::whereIn('status', ['pending', 'ditolak'])->get()/*->unique()*/;
            $peminjamans_active = Peminjaman::whereIn('status', ['approved', 'selesai'])->get();

            /*$getBarangs = function ($id) {
                if (DeadPeminjaman::wherePeminjamanId($id)->get()->count() < 1) {
                    return null;
                }
                $dead_peminjaman_barang_ids = DeadPeminjaman::wherePeminjamanId($id)->get()->pluck('barang_ids')->flatten()->unique()->all();
                return Barang::whereIn('id', $dead_peminjaman_barang_ids)->get();
            };*/

            $past_peminjamans = Peminjaman::hydrate(
                Audit::whereAuditableType(get_class(new Peminjaman))->whereEvent('deleted')->get()->pluck('old_values')->all()
            );

            $past_peminjamans->each(function (Peminjaman $peminjaman) {
                $peminjaman->old_barangs = getOldBarangs($peminjaman->id);
            });

            return view('resources.peminjamans.request', compact('peminjamans_pending', 'peminjamans_active', 'past_peminjamans'));
        } else {
            abort(403);
            return null;
        }
    }

    public function create(CreatePeminjamanRequest $request)
    {
        return view('resources.peminjamans.create');
    }

    public function store(StorePeminjamanRequest $request)
    {
        $peminjaman = new Peminjaman($request->all());
        $peminjaman->save();

        $peminjaman->barangs->each(function (Barang $barang) {
            $barang->peminjaman_id = null;
            $barang->save();
        });

        $peminjaman->barangs()->saveMany(collect($request->get('barang_ids'))->transform(fn($id) => Barang::find($id))->all());
        $notification = array(
            'message' => 'Peminjaman telah diajukan!',
            'alert-type' => 'success'
        );
        return redirect()->route('peminjaman.index')->with($notification);
    }

    public function show(ShowPeminjamanRequest $request, $id)
    {
        $date = Carbon::now();

        try { // kalau peminjaman sdh dihapus
            $filler = Audit
                ::whereAuditableType(get_class(new Peminjaman))
                ->whereAuditableId($id)
                ->orderBy('created_at', 'desc')
                ->get()
                ->first()
                ->old_values;
            $peminjaman = (new Peminjaman)->fill($filler);

            $peminjaman->created_at = $filler['created_at'];

            $peminjaman->old_barangs = getOldBarangs($id);
            if ($peminjaman->old_barangs === null) throw new ModelNotFoundException;

            //dd([$peminjaman, $id, $date, $peminjaman->barangs->count() < 1]);

            return view('resources.peminjamans.show', compact('peminjaman', 'id', 'date'));
        } catch (\Exception $e) {
            $peminjaman = Peminjaman::findOrFail($id); // kalau peminjamannya blm di hapus
            return view('resources.peminjamans.show', compact('peminjaman', 'date'));
        }
    }

    public function edit(EditPeminjamanRequest $request, int $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
       
        return view('resources.peminjamans.edit', compact('peminjaman'));
    }

    public function approve(ApprovePeminjamanRequest $request, int $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'approved';
        $peminjaman->save();

        $notification = [
            'message' => 'Peminjaman sukses disetujui',
            'alert-type' => 'warning'
        ];

        return $request->ajax()
            ? response('success')
            : redirect()->back()->with($notification);
    }

    public function tolak(ApprovePeminjamanRequest $request, int $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'ditolak';
        $peminjaman->save();

        $notification = [
            'message' => 'Peminjaman sukses ditolak',
            'alert-type' => 'warning'
        ];

        return $request->ajax()
            ? response('success')
            : redirect()->back()->with($notification);
    }

    public function update(UpdatePeminjamanRequest $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->pemohon_id = $request->get('pemohon_id');
        $peminjaman->peninjau_id = $request->get('peninjau_id');
        // $peminjaman->barang_id = $request->get('barang_id');
        $peminjaman->status = $request->get('status');
        $peminjaman->properties = $request->get('properties');
        $peminjaman->tgl_mulai = $request->get('tgl_mulai');
        $peminjaman->tgl_selesai = $request->get('tgl_selesai');
        $peminjaman->keterangan = $request->get('keterangan');
        // dd($request);

        $peminjaman->save();

        // $peminjaman->barangs()->dissociate();
        // $peminjaman->barangs()->saveMany(collect($request->get('barang_ids'))->transform(fn($id) => Barang::find($id))->all());
        
        $peminjaman->barangs->each(function (Barang $barang) {
            $barang->peminjaman_id = null;
            $barang->save();
        });
        
        $peminjaman->barangs()->saveMany(collect($request->get('barang_ids'))->transform(fn($id) => Barang::find($id))->all());


        $notification = array(
            'message' => 'Peminjaman sukses diupdate!',
            'alert-type' => 'warning'
        );

        return $request->user()->can('peminjaman-edit') ? redirect()->route('peminjaman.requests')->with($notification) : redirect()->route('peminjaman.index')->with($notification);
    }

    public function destroy(DeletePeminjamanRequest $request, $id)
    {
        try {
            $peminjaman = Peminjaman::findOrFail($id);
            $barang_ids = $peminjaman->barangs->pluck('id');
            $deleted_peminjaman_id = $peminjaman->id;
            $peminjaman->delete();
            $time = Audit
                ::whereAuditableType(get_class(new Peminjaman))
                ->whereAuditableId($deleted_peminjaman_id)
                ->orderBy('created_at', 'desc')
                ->get()
                ->first()
                ->created_at;
            $dead_peminjaman = new DeadPeminjaman([
                'peminjaman_id' => $deleted_peminjaman_id,
                'barang_ids' => $barang_ids,
                'time' => $time
            ]);
            $dead_peminjaman->save();
            /*DB::table('deleted_peminjamans')->insert([
                'peminjaman_id' => $deleted_peminjaman_id,
                'barang_ids' => $barang_ids->toJson(),
                'time' => $time
            ]);*/
            return response('success');
        } catch (\Exception $e) {
            return response('Peminjaman not found', 400);
        }
    }
}
