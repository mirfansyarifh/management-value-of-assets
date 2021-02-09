<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\Aktiva\CreateAktivaRequest;
use App\Http\Requests\Aktiva\DeleteAktivaRequest;
use App\Http\Requests\Aktiva\EditAktivaRequest;
use App\Http\Requests\Aktiva\IndexAktivaRequest;
use App\Http\Requests\Aktiva\ShowAktivaRequest;
use App\Http\Requests\Aktiva\StoreAktivaRequest;
use App\Http\Requests\Aktiva\UpdateAktivaRequest;
use App\Models\Resources\Aktiva\Aktiva;
use App\Models\Resources\Barang\Barang;
use App\Models\Resources\Kategori\Kategori;
use Illuminate\Support\Carbon;
use App\Exports\AktivasExport;
use App\Exports\TanahExport;
use App\Exports\BangunanExport;
use App\Exports\KendaraanExport;
use App\Exports\NonKapExport;
use Maatwebsite\Excel\Facades\Excel;

class AktivaController extends Controller
{
  public function exportbyCategoryAndTime(IndexAktivaRequest $request, int $year, int $month, string $category, string $status_guna) 
  {
    if ($category === 'tanah'){
      return Excel::download(new TanahExport($year, $month, $category, $status_guna), 'Aktivas '.$status_guna.'-'.$category.' Bulan '.$month.' TAHUN '.$year.'.xlsx');
    }
    if ($category === 'bangunan'){
      return Excel::download(new BangunanExport($year, $month, $category, $status_guna), 'Aktivas '.$status_guna.'-'.$category.' Bulan '.$month.' TAHUN '.$year.'.xlsx');
    }
    if ($category === 'kendaraan'){
      return Excel::download(new KendaraanExport($year, $month, $category, $status_guna), 'Aktivas '.$status_guna.'-'.$category.' Bulan '.$month.' TAHUN '.$year.'.xlsx');
    }
        return Excel::download(new AktivasExport($year, $month, $category, $status_guna), 'Aktivas '.$status_guna.'-'.$category.' Bulan '.$month.' TAHUN '.$year.'.xlsx');
  }
  
  public function exportbyCategoryNonKapitalisasi(IndexAktivaRequest $request, string $category, string $status_guna) 
  {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;

        return Excel::download(new NonKapExport($year, $month, $category, $status_guna), 'Aktivas '.$status_guna.' Bulan '.$month.' TAHUN '.$year.'.xlsx');
  }

  public function indexOfCategories(IndexAktivaRequest $request) {
    $allAktivas = Aktiva::with('barang')->get()->where('barang.keuangan_approved', true);

    $aktivas_count = collect();
    Kategori::whereNull(['parent_id'])->get()->each(function (Kategori $category) use ($allAktivas, $aktivas_count) {
      $aktivas_count->put($category->nama, [
          'nama' => $category->nama,
          'jumlah' => filterAktivasByBroadCategory($allAktivas, $category->nama)->count()
      ]);
    });
    $aktivas = $aktivas_count->all();
    return view('resources.aktivas.category', compact('aktivas'));
  }

  public function indexByCategory(IndexAktivaRequest $request, string $category, string $status_guna) {
    // Filters
    // #1: ambil data yg telah ada saat tsb
    // #2: filter data sesuai dg broadcategory
    // #3: filter data status_guna sesuai dg $status_guna
    // #4: Group data by role

    $categories = getKategoriesNameFromBroadCategory($category);
    $aktivas = Aktiva
        ::where('tgl_perolehan', '<=', Carbon::createFromDate(Carbon::now()->year, Carbon::now()->month)->lastOfMonth()) // #1: ambil data yg telah ada saat tsb
        ->get()
        ->whereIn('kategori.nama', $categories) // #2: filter data sesuai dg broadcategory
            ->where('barang.keuangan_approved', true)
        ->where('barang.status_guna', $status_guna) // #3: filter data status guna = guna
        ->groupBy(['approved_by']); // #4: Group data by role

        $aktivas_non_kap = Aktiva
        ::all()
        ->where('barang.status_guna', $status_guna)
            ->where('barang.keuangan_approved', true)
        ->whereIn('kategori.nama', $categories);
        
        if ($aktivas === null ||  $aktivas->count() < 1) {
          if ($status_guna === 'jual' || $status_guna === 'non_guna' || $status_guna === 'non_kapitalisasi') {
            $notification = array(
                'message' => 'Tidak ada aktiva untuk kategori : '.$category,
                'alert-type' => 'error'
            );
            return back()->with($notification);

          }
          else {
            return redirect()->route('aktiva.create', ['category' => $category]);
          }
        }

        if ($aktivas->has('sinkron')) {
          $aktivas_keu = $aktivas->get('keuangan');
          $aktivas_umum = $aktivas->get('umum');
          is_null($aktivas_keu) ? $aktivas->put('keuangan', $aktivas->get('sinkron')) : $aktivas_keu->merge($aktivas->get('sinkron'));
          is_null($aktivas_umum) ? $aktivas->put('umum', $aktivas->get('sinkron')) : $aktivas_umum->merge($aktivas->get('sinkron'));
        }
    

    return view('resources.aktivas.monthly', compact('aktivas', 'category', 'status_guna'));
  }

  public function indexByTimeAndCategory(IndexAktivaRequest $request, int $year, int $month, string $category, string $status_guna) {
    // Filters
    // #1: ambil data yg telah ada saat tsb
    // #2: filter data sesuai dg broadcategory
    // #3: filter data status guna = guna
    $categories = getKategoriesNameFromBroadCategory($category);
    $aktivas = Aktiva
        ::where('tgl_perolehan', '<=', Carbon::createFromDate($year, $month)->lastOfMonth()) // #1: ambil data yg telah ada saat tsb
        ->get()
        ->whereIn('kategori.nama', $categories) // #2: filter data sesuai dg broadcategory
        ->where('barang.keuangan_approved', true)
        ->where('barang.status_guna', $status_guna); // #3: filter data status guna = guna
    return view('resources.aktivas.'.$category.'.show', compact('aktivas', 'year', 'month', 'category', 'status_guna'));
  }

  public function create(CreateAktivaRequest $request, string $category)
  {
    // $categories = getKategoriesNameFromBroadCategory($category);
    // $barangs = Barang::whereDoesntHave('aktiva')->whereIn('status_guna', ['guna', 'non_guna', 'non_kapitalisasi', 'jual'])->get()->groupBy('kategori.nama')->toBase()->only($categories)->flatten(1)->all();

    return view('resources.aktivas.create', compact(/*'barangs',*/ 'category'));
  }

  public function store(StoreAktivaRequest $request)
  {
    $aktiva = new Aktiva($request->all());
    switch ($request->user()->roles->first()->name) {
      case 'keuangan':
        $aktiva->keuangan_approved = true;
        break;
      case 'umum':
        $aktiva->umum_approved = true;
        break;
      default:
        break;
    }
    
    $aktiva->save();
    $status_guna = $aktiva->barang->status_guna;
    $notification = array(
      'message' => 'Data sukses dibuat!',
      'alert-type' => 'success'
  );
    return redirect()->route('aktiva.indexByTimeAndCategory', [
        'year' => Carbon::now()->year,
        'month' => Carbon::now()->month,
        'category' => $aktiva->kategori->parent->nama ?? $aktiva->kategori->nama,
        'status_guna' => $status_guna
    ])->with($notification);
  }

  public function edit(EditAktivaRequest $request, int $id)
  {
    $aktiva = Aktiva::find($id);
    return view('resources.aktivas.edit', compact('aktiva'));
  }

  public function update(UpdateAktivaRequest $request, int $id)
  {
    $aktiva = Aktiva::find($id);
    $status_guna = $aktiva->barang->status_guna; // ambil statusguna barang untuk redirect

    $roleYgSubmit = $request->user()->roles->first()->name;
    $apakahAdaNilaiDiubah = fn() : bool => $aktiva->nilai_perolehan != $request->get('nilai_perolehan') || $aktiva->tgl_perolehan != $request->get('tgl_perolehan');
    $apakah_role_yg_submit_sama_dengan_role_yg_terakhir_update = fn() : bool => $roleYgSubmit === $aktiva->last_updated_by_role_name;

    if ($apakahAdaNilaiDiubah() || $apakah_role_yg_submit_sama_dengan_role_yg_terakhir_update()) {
      switch ($roleYgSubmit) {
        case 'keuangan':
          $aktiva->keuangan_approved = true;
          $aktiva->umum_approved = false;
          break;
        case 'umum':
          $aktiva->umum_approved = true;
          $aktiva->keuangan_approved = false;
          break;
        default:
          break;
      }
    } else {
      $aktiva->keuangan_approved = true;
      $aktiva->umum_approved = true;
    }

    $aktiva->nilai_perolehan = $request->get('nilai_perolehan');
    $aktiva->tgl_perolehan = $request->get('tgl_perolehan');

    $aktiva->save();
    $notification = array(
      'message' => 'Data sukses diupdate!',
      'alert-type' => 'warning'
  );
    return redirect()->route('aktiva.indexByTimeAndCategory', [
        'year' => Carbon::now()->year,
        'month' => Carbon::now()->month,
        'category' => $aktiva->kategori->parent->nama ?? $aktiva->kategori->nama,
        'status_guna' => $status_guna
    ])->with($notification);
  }

  public function destroy(DeleteAktivaRequest $request, $id)
  {
    try {
      Aktiva::findOrFail($id)->delete();
      return response('success');
    } catch (\Exception $e) {
      return response('Aktiva tidak ditemukan', 400);
    }
  }

  public function history(ShowAktivaRequest $request, $id) {
    try {
      $nama = Aktiva::findOrFail($id)->barang->nama_barang;
      $aktiva = Aktiva::findOrFail($id)->history;//->transform(function ($item, $key) {$item->transform(function ($item, $key) { $item->put('user', User::find($item->first()->user_id)->name);$item->put('role', User::find($item->first()->user_id)->roles->first()->name);});});
      return view('resources.aktivas.history', compact('aktiva', 'nama', 'id'));
    } catch (\Exception $e) {
      abort(404, 'aktiva not found');
      return null;
    }
  }
  
  public function reportbyCategoryAndTime(IndexAktivaRequest $request, int $year, int $month, string $category, string $status_guna)
  {
    $categories = getKategoriesNameFromBroadCategory($category);
    $aktivas = Aktiva
        ::where('tgl_perolehan', '<=', Carbon::createFromDate($year, $month)->lastOfMonth()) // #1: ambil data yg telah ada saat tsb
        ->get()
        ->whereIn('kategori.nama', $categories) // #2: filter data sesuai dg broadcategory
        ->where('barang.status_guna', $status_guna); // #3: filter data status guna = guna



    return view('resources.aktivas.report', compact('year', 'month', 'category', 'status_guna', 'aktivas'));
  }

}

?>
