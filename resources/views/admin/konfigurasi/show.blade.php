@extends('layouts.home')
@section('content')
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Konfigurasi Website</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <table class="table table-striped table-bordered detail-view">
              <tr><th>Email</th><td><a href="mailto:{{ $konfigurasi->email }}">{{ $konfigurasi->email }}</a></td></tr>
              <tr><th>Website</th><td>{{ $konfigurasi->website }}</td></tr>
              <tr><th>Telepon</th><td>{{ $konfigurasi->telepon }}</td></tr>
              <tr><th>Alamat</th><td>{{ $konfigurasi->alamat }}</td></tr>
              <tr><th>Facebook</th><td>{{ $konfigurasi->facebook }}</td></tr>
              <tr><th>Instagram</th><td>{{ $konfigurasi->instagram }}</td></tr>
              <tr><th>Deskripsi</th><td>{{ $konfigurasi->deskripsi }}</td></tr>
              <tr><th>Logo</th><td><a href="{{ url('/storage'.'/'.$konfigurasi->logo) }}" target="_blank">Gambar</a></td></tr>
              <tr><th>Icon</th><td><a href="{{ url('/storage'.'/'.$konfigurasi->icon) }}" target="_blank">Gambar</a></td></tr>
              <tr><th>Tanggal Update</th><td>{{ $konfigurasi->updated_at }}</td></tr>
              </table>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <a href="{{ route('konfigurasi.edit') }}" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
@endsection
