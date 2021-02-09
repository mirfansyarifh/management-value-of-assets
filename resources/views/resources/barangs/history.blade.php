@extends('layouts.home')
@section('content')
<!-- @if(session('message')) {{ session('message') }} @endif -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">History Peminjaman Barang :<b style="text-transform: uppercase"> {{ $barang->nama_barang }} {{ $barang->properties->merk ?? ''}}</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <table id="datatable" class="table table-striped" style="text-align:center; text-transform: uppercase">
                        <thead>                  
                            <tr>
                            <th style="width:10px; horizontal-align:center; vertical-align: middle">NO</th>
                            <th style="horizontal-align:center; vertical-align: middle">OLEH</th>
                            <th style="horizontal-align:center; vertical-align: middle">TGL MULAI</th>
                            <th style="horizontal-align:center; vertical-align: middle">TGL SELESAI</th>
                            <th style="horizontal-align:center; vertical-align: middle">PENINJAU</th>
                            <th style="horizontal-align:center; vertical-align: middle">KET</th>
                            
                        </thead>
                        <tbody>
                        @foreach($peminjamans as $peminjaman)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $peminjaman->pemohon->name }}</td>
                            <td>{{ $peminjaman->tgl_mulai }}</td>
                            <td>{{ $peminjaman->tgl_selesai }}</td>
                            <td>{{ $peminjaman->peninjau->name }}</td>
                            <td>{{ $peminjaman->keterangan }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
 <!-- /.row -->

@endsection

@extends('resources.barangs.partials.table')


    
