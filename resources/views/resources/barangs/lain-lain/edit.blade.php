@extends('layouts.home')
@section('content')
<div class="row">
   <!-- right column -->
   <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="card card-success">
         <div class="card-header">
            <h3 class="card-title">Edit Data Barang :<b style="text-transform: capitalize"> {{ $barang->properties->merk ?? $barang->kategori['nama'] }}</b></h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <form role="form" action="{{ route('barang.update', ['barang' => $barang->id]) }}" method="post">
            @csrf
            <input name="_method" type="hidden" value="PUT">
               <div class="row">
                  <div class="col-sm-12">
                        <!-- NAMA ASET TETAP to barangs.nama-->
                        <div class="form-group">
                        <label>NAMA ASET TETAP @error('nama_barang') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                           <input name="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ $barang->nama_barang }}" placeholder="Enter ..">
                        </div>
                  </div>
               </div>
               <div class="row">
                     <!-- SUB-KATEGORI -->
                  <div class="col-sm-12">
                     <div class="form-group">
                           <label>SUB-KATEGORI</label>
                           <select name="kategori_id" class="form-control" style="width: 100%; text-transform: uppercase">
                           <!-- Callin from database using foreach  -->
                           <option value="{{ $barang->kategori_id }}" selected> {{ $barang->kategori['nama'] }} </option>
                           </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                     <!-- Kode Wilayah -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Kode Wilayah @error('kode_kanwil') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="kode_kanwil" type="text" class="form-control @error('kode_kanwil') is-invalid @enderror" maxlength = "3"  value="{{ $barang->kode_kanwil }}"placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- Kode Aset -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Kode Aset @error('kode_aset') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="kode_aset" type="text" class="form-control @error('kode_aset') is-invalid @enderror" maxlength = "3"  value="{{ $barang->kode_aset }}"placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- Kode Tanggal -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Kode Tanggal @error('kode_tanggal') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="kode_tanggal" type="text" class="form-control @error('kode_tanggal') is-invalid @enderror" maxlength = "3"  value="{{ $barang->kode_tanggal }}"placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- Kode Urut -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Kode Urut @error('kode_registrasi') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="kode_registrasi" type="text" class="form-control @error('kode_registrasi') is-invalid @enderror" maxlength = "4"  value="{{ $barang->kode_registrasi }}"placeholder="Enter ...">
                     </div>
                  </div>
               </div>
               <div class="row">
                     <!-- MERK/TYPE -->
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label>MERK/TYPE   <i class="fas fa-exclamation-circle"></i></label>
                        <input name="properties[merk]" type="text" class="form-control" value="{{ $barang->properties->merk ?? '' }}" placeholder="Enter ..">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <!-- STATUS (GUNA/NON-GUNA/HAPUS BUKU) -->
                     <div class="form-group">
                     <label>STATUS @error('status_guna') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label> <i>(GUNA/NON-GUNA/HAPUS BUKU)</i>
                        <select name="status_guna" class="form-control @error('status_guna') is-invalid @enderror" style="width: 100%; text-transform: uppercase">
                        <option value="{{ $barang->status_guna }}" selected>{{ $barang->status_guna }}</option>
                        <option value="guna" >GUNA</option>
                        <option value="non_guna" >NON-GUNA</option>
                        <option value="non_kapitalisasi" >NON-KAPITALISASI</option>
                        <option value="jual" >JUAL</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <!-- KONDISI -->
                     <div class="form-group">
                        <label>KONDISI @error('kondisi') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label><i> (baik/rusak ringan/rusak berat/hilang)</i>
                        <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror" style="width: 100%; text-transform: uppercase">
                        <option value="{{ $barang->kondisi }}" selected>{{ $barang->kondisi }}</option>
                        <option value="baik" >BAIK</option>
                        <option value="rusak_ringan" >RUSAK RINGAN</option>
                        <option value="rusak_berat" >RUSAK BERAT</option>
                        <option value="hilang" >HILANG</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <!-- KETERANGAN -->
                     <div class="form-group">
                     <label>KETERANGAN</label>
                        <input name="keterangan" type="text" class="form-control" value="{{ $barang->keterangan }}" placeholder="Enter ..">
                     </div>
                     <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Submit</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!-- general form elements disabled -->
   </div>
   <!-- /.col -->
</div>
<div>
   <b>note</b>
   <i>*label dengan warna <b style="color:#0000ff"> biru</b>, masuk ke attribute properties</i>
</div>
<!-- /.row -->
@endsection