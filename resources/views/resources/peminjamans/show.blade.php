@extends('layouts.home')
@section('content')
<!-- Main content -->
<div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <img src="{{ asset('logo-small.png') }}" class="float-left" style="width:100px; height:100px"> 
                    <small class="float-right">{{ $date }}</small>
                  </h4><br>
                  <small class="float-right">BPJS Ketenagakerjaan.</small>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <hr>
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Peminjam
                  <address>
                    <strong>{{ $peminjaman->pemohon->name }}</strong><br>
                    NIP : {{ $peminjaman->pemohon->nip }}<br>
                    Jabatan : {{ $peminjaman->pemohon->jabatan }}<br>
                    Email : {{ $peminjaman->pemohon->email }}<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Peninjau
                  <address>
                    <strong>{{ $peminjaman->peninjau->name ?? 'BELUM DITINJAU' }}</strong><br>
                    NIP : {{ $peminjaman->peninjau->nip ?? '' }}<br>
                    Jabatan : {{ $peminjaman->peninjau->jabatan ?? '' }}<br>
                    Email : {{ $peminjaman->peninjau->email ?? '' }}<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>ID Peminjaman : {{ $peminjaman->id ?? $id }}</b><br>
                  <b>Status : {{ $peminjaman->status }}</b><br>
                  <b>Jumlah Barang:</b> {{ !is_null($peminjaman->old_barangs) ? $peminjaman->old_barangs->count() : $peminjaman->barangs->count() }}<br>
                  <b>Tanggal Peminjaman:</b> {{ $peminjaman->tgl_mulai }}<br>
                  <b>Tanggal Pengajuan:</b> {{ $peminjaman->created_at }}
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>NO</th>
                      <th>Barang</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($peminjaman->barangs->count() < 1)
                      @foreach($peminjaman->old_barangs as $barang)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $barang->nama_barang }} {{ $barang->properties->merk ?? "" }} {{ $barang->properties->nomor->nopolis ?? "" }}</td>
                        </tr>
                      @endforeach
                    @else
                      @foreach($peminjaman->barangs as $barang)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $barang->nama_barang }} {{ $barang->properties->merk ?? "" }} {{ $barang->properties->nomor->nopolis ?? "" }}</td>
                        </tr>
                      @endforeach
                    @endif
                    </tbody>
                  </table>
                </div>
                <div>
                <p> &emsp; KETERANGAN : {{ $peminjaman->keterangan ?? '' }}</p>
                </div>
                <!-- /.col -->
              </div>
              <p>Jika Barang <b>rusak atau hilang</b>, menjadi tanggung jawab peminjam</p>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a type="button" onClick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
@endsection
