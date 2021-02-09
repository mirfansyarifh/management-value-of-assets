@extends('layouts.home')
@section('content')
<div class="row">
   <!-- right column -->
   <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="card card-success">
         <div class="card-header">
            <h3 class="card-title">Tambah Data Barang Kategori :<b style="text-transform: uppercase"> {{ $category }}</b></h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <form role="form" action="{{ route('barang.store') }}" method="POST">
            @csrf
               <div class="row">
                  <div class="col-sm-12">
                        <!-- NAMA ASET TETAP to barangs.nama-->
                        <div class="form-group">
                        <label>NAMA ASET TETAP @error('nama_barang') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                           <input name="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Enter ..">
                        </div>
                  </div>
               </div>
               <div class="row">
                     <!-- SUB-KATEGORI -->
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label>SUB-KATEGORI @error('kategori_id') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <select class="form-control @error('kategori_id') is-invalid @enderror" style="width: 100%; text-transform: uppercase" name="kategori_id">
                        <!-- Callin from database using foreach  -->
                              <option value="1">TANAH</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                     <!-- Kode Wilayah -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Kode Wilayah @error('kode_kanwil') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="kode_kanwil" type="text" class="form-control @error('kode_kanwil') is-invalid @enderror" maxlength = "3" value="905" readonly="readonly">
                     </div>
                  </div>
                     <!-- Kode Aset -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Kode Aset @error('kode_aset') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="kode_aset" type="text" class="form-control @error('kode_aset') is-invalid @enderror" maxlength = "3" placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- Kode Tanggal -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Kode Tanggal @error('kode_tanggal') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="kode_tanggal" type="text" class="form-control @error('kode_tanggal') is-invalid @enderror" maxlength = "3" placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- Kode Urut -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Kode Urut @error('kode_registrasi') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="kode_registrasi" type="text" class="form-control @error('kode_registrasi') is-invalid @enderror" maxlength = "4" placeholder="Enter ...">
                     </div>
                  </div>
               </div>
               <div class="row">
                     <!-- STATUS TANAH -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>STATUS TANAH <i class="fas fa-exclamation-circle"></i></label>
                        <select name="properties[status_tanah]" class="form-control select2bs4" style="width: 100%;">
                        <option value="HM" >HM</option>
                        <option value="HGB" >HGB</option>
                        <option value="HGU" >HGU</option>
                        <option value="HP" >HP</option>
                        </select>
                     </div>
                  </div>
                     <!-- SERTIFIKAT (nomor) -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>SERTIFIKAT (nomor) <i class="fas fa-exclamation-circle"></i></label>
                        <input name="properties[sertifikat][nomor]" type="text" class="form-control"  maxlength = "3" placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- SERTIFIKAT (masa berlaku) -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>SERTIFIKAT (masa berlaku dalam tahun) <i class="fas fa-exclamation-circle"></i></label>
                        <input name="properties[sertifikat][masa_berlaku]" type="text" class="form-control"  maxlength = "2" placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- SERTIFIKAT (tgl berakhir) -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>SERTIFIKAT (tgl berakhir) <i class="fas fa-exclamation-circle"></i></label>
                        <input name="properties[sertifikat][tanggal_berakhir]" type="text" class="form-control" maxlength = "10" placeholder="TGL/BLN/TAHUN">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-4">
                     <!-- LUAS -->
                     <div class="form-group">
                        <label>LUAS <i class="fas fa-exclamation-circle"></i></label><i> (M2) </i>
                        <input name="properties[luas]" type="text" class="form-control" placeholder="M2">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <!-- STATUS (GUNA/NON-GUNA/HAPUS BUKU) -->
                     <div class="form-group">
                     <label>STATUS @error('status_guna') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label> <i>(GUNA/NON-GUNA/HAPUS BUKU)</i>
                        <select name="status_guna" class="form-control @error('status_guna') is-invalid @enderror" style="width: 100%; text-transform: uppercase">
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
                        <input name="keterangan" name="keterangan" type="text" class="form-control" placeholder="Enter ..">
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