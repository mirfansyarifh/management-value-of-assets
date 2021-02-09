<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\Barang\ApproveBarangRequest;
use App\Http\Requests\Barang\CreateBarangRequest;
use App\Http\Requests\Barang\DeleteBarangRequest;
use App\Http\Requests\Barang\EditBarangRequest;
use App\Http\Requests\Barang\IndexBarangRequest;
use App\Http\Requests\Barang\SearchBarangRequest;
use App\Http\Requests\Barang\ShowBarangRequest;
use App\Http\Requests\Barang\StoreBarangRequest;
use App\Http\Requests\Barang\UpdateBarangRequest;
use App\Models\Resources\Barang\Barang;
use App\Models\Resources\Kategori\Kategori;
use App\Models\Resources\Peminjaman\DeadPeminjaman;
use App\Models\Resources\Peminjaman\Peminjaman;
use OwenIt\Auditing\Models\Audit;

class BarangController extends Controller
{

  public function indexOfCategories(IndexBarangRequest $request)
  {
    $barangs_count = collect();
    Kategori::whereNull(['parent_id'])->get()->each(function ($category) use ($barangs_count) {
        $barangs_count->put($category->nama, [
            'nama' => $category->nama,
            'jumlah' => generateBarangsByBroadCategory($category->nama)->count()
        ]);
    });
    $barangs = $barangs_count->toArray();
    return view('resources.barangs.category', compact('barangs'));
  }

  public function indexByCategory(IndexBarangRequest $request, string $category) {
    $barangs = generateBarangsByBroadCategory($category)->sortBy('id');
    return view('resources.barangs.'.$category.'.index', compact('barangs', 'category'));
  }

  public function create(CreateBarangRequest $request, string $category) {

    return view('resources.barangs.'.$category.'.create', compact('category'));
  }

  public function store(StoreBarangRequest $request)
  {
    $barang = new Barang($request->all());
    $barang->keuangan_approved = true;
    $barang->save();
    $notification = array(
      'message' => 'Barang sukses disimpan!',
      'alert-type' => 'success'
  );
    //$message = __('messages.success-create', ['model' => 'Barang']);
    return redirect()->route('barang.indexByCategory', ['category' => $barang->kategori->parent->nama ?? $barang->kategori->nama])->with($notification);
  }

  public function show(ShowBarangRequest $request, string $category, int $id)
  {
    $barang = Barang::findOrfail($id);
    return view('resources.barangs.'.$category.'.show', compact('barang', 'category'));
  }

  public function edit(EditBarangRequest $request, string $category, int $id) {
    $barang = Barang::findOrFail($id);
    return view('resources.barangs.'.$category.'.edit', compact('barang', 'category'));
  }

  public function update(UpdateBarangRequest $request, $id)
  {
    $barang = Barang::findOrFail($id);

    if ($barang->status_guna !== $request->get('status_guna')) {
      $barang->keuangan_approved = false;
    }

    $barang->nama_barang = $request->get('nama_barang');
    $barang->kode_kanwil = $request->get('kode_kanwil');
    $barang->kode_aset = $request->get('kode_aset');
    $barang->kode_tanggal = $request->get('kode_tanggal');
    $barang->kode_registrasi = $request->get('kode_registrasi');
    $barang->properties = $request->get('properties');
    $barang->status_guna = $request->get('status_guna');
    $barang->kondisi = $request->get('kondisi');
    $barang->keterangan = $request->get('keterangan') ?? null;

    $barang->save();
    $notification = array(
        'message' => 'Barang sukses diupdate!',
        'alert-type' => 'warning'
    );
    //$message = __('messages.success-create', ['model' => 'Barang']);
    return redirect()->route('barang.indexByCategory', ['category' => $barang->kategori->parent->nama ?? $barang->kategori->nama])->with($notification);
  }

  public function approve(ApproveBarangRequest $request, $id)
  {
    $barang = Barang::findOrFail($id);
    $barang->keuangan_approved = true;
    $barang->save();

    $notification = array(
        'message' => 'Barang sukses diapprove!',
        'alert-type' => 'warning'
    );
    return redirect()->back()->with($notification);
  }

  public function destroy(DeleteBarangRequest $request, $id)
  {
    try {
      Barang::findOrFail($id)->delete();
      return response('success');
    } catch (\Exception $e) {
      return response('User not found', 400);
    }
  }

  public function search(SearchBarangRequest $request)
  {
    $kategori_tanah_id = Kategori::whereNama('tanah')->get()->first()->id;
    $query = $request->get('nama_barang');
    $result = Barang
        ::where('kategori_id', '!=', $kategori_tanah_id)
        ->where('kondisi', '!=', 'hilang')
        ->where('peminjaman_id', '=', null)
        ->where('status_guna', '=', 'guna')
        ->where('nama_barang', 'like', '%'.$query.'%')
        ->get();

    // $this->searchByCategory(new SearchBarangRequest(), (fn($x) => (string) $x)(2));

    return $result->count() > 0
        ? $result->map(fn(Barang $barang) => [
          'id' => $barang->id,
          'nama_barang' => $barang->nama_barang,
          'kondisi' => replaceUnderscoreWithSpace($barang->kondisi),
          'kategori' => $barang->kategori->parent->nama ?? $barang->kategori->nama,
          'sub_kategori' => $barang->kategori->nama,
          'property' => getProperty($barang)])->toJson()
        : json_encode([]);
  }

  public function searchByCategory(SearchBarangRequest $request, string $category)
  {
    $category_ids = getCategoriesIdFromBroadCategory($category);
    $query = $request->get('nama_barang');

    $barangs = Barang
        ::doesntHave('aktiva')->whereIn('kategori_id', $category_ids)
        ->where('keuangan_approved', true)
        ->where('kondisi', '!=', 'hilang')
        ->where('nama_barang', 'like', '%'.$query.'%')
        ->get();

    return $barangs->count() > 0
        ? $barangs->map(fn(Barang $barang) => [
            'id' => $barang->id,
            'nama_barang' => $barang->nama_barang,
            'kondisi' => replaceUnderscoreWithSpace($barang->kondisi),
            'kategori' => $barang->kategori->parent->nama ?? $barang->kategori->nama,
            'sub_kategori' => $barang->kategori->nama,
            'status_guna' => $barang->status_guna,
            'property' => getProperty($barang)])->toJson()
        : json_encode([]);
  }

  public function peminjamanHistory($id)
  {
    // $peminjaman_history = Peminjaman::onlyTrashed()->get()->filter(fn(Peminjaman $peminjaman) => $peminjaman->barangs->pluck('id')->contains($id));
    // $peminjaman_history = Peminjaman::hydrate(DeadPeminjaman::all()->filter(fn($p) => in_array($id, $p->barang_ids))->pluck('id')->all());
    $dead_peminjaman_ids = DeadPeminjaman::all()->filter(fn($p) => in_array($id, $p->barang_ids))->pluck('peminjaman_id')->all();
    $peminjaman_history = Peminjaman::hydrate(
        Audit::whereAuditableType(get_class(new Peminjaman))
            ->whereEvent('deleted')
            ->whereIn('auditable_id', $dead_peminjaman_ids)
            ->get()
            ->pluck('old_values')
            ->all()
    ); // use old_barangs to retrieve barangs on this case

    $barang = Barang::findOrFail($id);
    $peminjamans = $peminjaman_history;

    return view('resources.barangs.history', compact('barang', 'peminjamans'));
    // dd($peminjaman);

  }
}

?>

