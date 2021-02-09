<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Konfigurasi\CreateKonfigurasiRequest;
use App\Http\Requests\Konfigurasi\DeleteKonfigurasiRequest;
use App\Http\Requests\Konfigurasi\EditKonfigurasiRequest;
use App\Http\Requests\Konfigurasi\IndexKonfigurasiRequest;
use App\Http\Requests\Konfigurasi\ShowKonfigurasiRequest;
use App\Http\Requests\Konfigurasi\StoreKonfigurasiRequest;
use App\Http\Requests\Konfigurasi\UpdateKonfigurasiRequest;
use App\Http\Requests\Peminjaman\StorePeminjamanRequest;
use App\Models\Resources\Konfigurasi\Konfigurasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class KonfigurasiController extends Controller
{
    protected string $file_location = 'public';
  /*public function index(IndexKonfigurasiRequest $request)
  {
    $konfigurasis = Konfigurasi::all();
    return view('admin.konfigurasi.index', compact('konfigurasis'));
  }

  public function create(CreateKonfigurasiRequest $request)
  {
    return view('admin.konfigurasi.create');
  }

  public function store(StoreKonfigurasiRequest $request)
  {
    $konfigurasi = new Konfigurasi($request->all());
    $konfigurasi->save();
    $notification = array(
        'message' => 'Konfigurasi berhasil disimpan',
        'alert-type' => 'warning'
    );
    return redirect()->to('konfigurasi.index')->with($notification);
  }*/

  public function show(ShowKonfigurasiRequest $request)
  {
      $konfigurasi = Konfigurasi::first();
      return view('admin.konfigurasi.show', compact('konfigurasi'));
  }

  public function edit(EditKonfigurasiRequest $request)
  {
    $konfigurasi = Konfigurasi::first();
    return view('admin.konfigurasi.edit', compact('konfigurasi'));
  }

  public function update(UpdateKonfigurasiRequest $request)
  {
    //  dd($request);
    $konfigurasi = Konfigurasi::first();

    // $konfigurasi->namaweb = $request->get('namaweb');
    $konfigurasi->email = $request->get('email');
    $konfigurasi->website = $request->get('website');
    $konfigurasi->telepon = $request->get('telepon');
    $konfigurasi->alamat = $request->get('alamat');
    // $konfigurasi->workshop = $request->get('workshop');
    $konfigurasi->facebook = $request->get('facebook');
    $konfigurasi->instagram = $request->get('instagram');
    $konfigurasi->deskripsi = $request->get('deskripsi');
    // $konfigurasi->dashboard = $request->get('dashboard');
    // $konfigurasi->logo = $request->get('logo');
    // $konfigurasi->icon = $request->get('icon');

      if ($request->hasFile('icon')) {
          Storage::delete('public'.'/'.$konfigurasi->icon);
          $uploadedFile = $request->file('icon');
          $filename = 'icon-'.(Carbon::now()->timestamp+rand(1,1000));
          $path = $uploadedFile->storeAs($this->file_location, $filename.'.'.$uploadedFile->getClientOriginalExtension());
          $fullname = $filename.'.'.$uploadedFile->getClientOriginalExtension();

          $konfigurasi->icon = $filename.'.'.$uploadedFile->getClientOriginalExtension();
      }
      if ($request->hasFile('logo')) {
          Storage::delete('public'.'/'.$konfigurasi->logo);
          $uploadedFile = $request->file('logo');
          $filename = 'logo-'.(Carbon::now()->timestamp+rand(1,1000));

          $img = Image::make(file_get_contents($uploadedFile));

          if ($img->width() > 610) $img->resize(610, null);
          if ($img->height() > 610) $img->resize(null, 610);

          $path = public_path("\storage\public");

          //Lets create path for post_id if it doesn't exist yet e.g `public\blogpost\23`
          if(!File::exists($path)) File::makeDirectory($path, 775);

          //$img->save(storage_path($this->file_location.'\\'.$filename.'.'.$uploadedFile->getClientOriginalExtension()));
          $img->save($path . '\\' . $filename.$uploadedFile->getClientOriginalExtension());

          $path = $uploadedFile->storeAs($this->file_location, $filename.'.'.$uploadedFile->getClientOriginalExtension());
          // $fullname = $filename.'.'.$uploadedFile->getClientOriginalExtension();

          $konfigurasi->logo = $filename.'.'.$uploadedFile->getClientOriginalExtension();
      }

    $konfigurasi->save();
    $notification = array(
        'message' => 'Konfigurasi berhasil diubah',
        'alert-type' => 'warning'
    );
    return redirect()->route('konfigurasi.show')->with($notification);
  }

  /*public function destroy(DeleteKonfigurasiRequest $request, int $id)
  {
    try {
      Konfigurasi::findOrFail($id)->delete();
      return response('success');
    } catch (\Exception $e) {
      return response('Setting not found', 400);
    }
  }*/

}

