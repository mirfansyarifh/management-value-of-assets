@extends('layouts.home')
@section('content')
<!-- ON REQUEST -->
<div class="row">
    <div class="col-md-12"> 
        <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title"><b>PENGAJUAN PEMINJAMAN SAYA</b></h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table id="table2" class="table table-striped" style="text-align:center; text-transform: uppercase">
                <thead>                  
                    <tr>
                    <th style="width:10px; horizontal-align:center; vertical-align: middle">NO</th>
                    <th style="width:150px; horizontal-align:center; vertical-align: middle">ID PERMOHONAN</th>
                    <th style="horizontal-align:center; vertical-align: middle">TGL MULAI</th>
                    <th style="horizontal-align:center; vertical-align: middle">TGL SELESAI</th>
                    <th style="width:20px; horizontal-align:center; vertical-align: middle">JUMLAH BARANG</th>
                        <th style="width:20px; horizontal-align:center; vertical-align: middle">STATUS</th>
                    <th style="horizontal-align:center; vertical-align: middle">PENINJAU</th>
                    <th style="horizontal-align:center; vertical-align: middle">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($peminjamans_pending as $peminjaman)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('peminjaman.show', ['peminjaman' => $peminjaman->id]) }}">{{ $peminjaman->id }}</a></td>
                        <td>{{ $peminjaman->tgl_mulai }}</td>
                        <td>{{ $peminjaman->tgl_selesai }}</td>
                        <td>{{ $peminjaman->barangs->count() }}</td>
                        <td>{{ $peminjaman->status }}</td>
                        <td>{{ $peminjaman->peninjau->name ?? 'Belum ditinjau' }}</td>
                        <td>
                            <a href="{{ route('peminjaman.edit', ['peminjaman' => $peminjaman->id]) }}" class="btn btn-warning btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<!-- ON PROCCESS -->
<div class="row">
    <div class="col-md-12"> 
        <div class="card card-success collapsed-card">
        <div class="card-header">
            <h3 class="card-title"><b>PEMINJAMAN BERJALAN SAYA</b></h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table id="table1" class="table table-striped" style="text-align:center; text-transform: uppercase">
                <thead>                  
                    <tr>
                    <th style="width:10px; horizontal-align:center; vertical-align: middle">NO</th>
                    <th style="width:150px; horizontal-align:center; vertical-align: middle">ID PERMOHONAN</th>
                    <th style="horizontal-align:center; vertical-align: middle">TGL MULAI</th>
                    <th style="horizontal-align:center; vertical-align: middle">TGL SELESAI</th>
                    <th style="width:20px; horizontal-align:center; vertical-align: middle">JUMLAH BARANG</th>
                    <th style="width:20px; horizontal-align:center; vertical-align: middle">STATUS</th>
                    <th style="horizontal-align:center; vertical-align: middle">PENINJAU</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($peminjamans_approved as $peminjaman)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('peminjaman.show', ['peminjaman' => $peminjaman->id]) }}">{{ $peminjaman->id }}</a></td>
                        <td>{{ $peminjaman->tgl_mulai }}</td>
                        <td>{{ $peminjaman->tgl_selesai }}</td>
                        <td>{{ $peminjaman->barangs->count() }}</td>
                        <td>{{ $peminjaman->status }}</td>
                        <td>{{ $peminjaman->peninjau->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<!-- HISTORY -->
<div class="row">
    <div class="col-md-12"> 
        <div class="card card-info collapsed-card">
        <div class="card-header">
            <h3 class="card-title"><b>RIWAYAT PEMINJAMAN SAYA</b></h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table id="table3" class="table table-striped" style="text-align:center; text-transform: uppercase">
                <thead>                  
                    <tr>
                    <th style="width:10px; horizontal-align:center; vertical-align: middle">NO</th>
                    <th style="width:150px; horizontal-align:center; vertical-align: middle">ID PERMOHONAN</th>
                    <th style="horizontal-align:center; vertical-align: middle">TGL MULAI</th>
                    <th style="horizontal-align:center; vertical-align: middle">TGL SELESAI</th>
                    <th style="width:20px; horizontal-align:center; vertical-align: middle">JUMLAH BARANG</th>
                    <th style="horizontal-align:center; vertical-align: middle">PENINJAU</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($past_peminjamans as $peminjaman)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('peminjaman.show', ['peminjaman' => $peminjaman->id]) }}">{{$peminjaman->id}}</a></td>
                        <td>{{ $peminjaman->tgl_mulai }}</td>
                        <td>{{ $peminjaman->tgl_selesai }}</td>
                        <td>{{ $peminjaman->old_barangs->count() }}</td>
                        <td>{{ $peminjaman->pemohon->name.' ['.$peminjaman->pemohon->roles->first()->name.']' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection
@extends('resources.peminjamans.partials.table')
@extends('resources.barangs.partials.notifikasi')
