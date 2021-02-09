@extends('layouts.home')
@section('content')
<!-- REQUEST -->
<div class="row">
    <div class="col-md-12"> 
        <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title"><b>DAFTAR PERMINTAAN PEMINJAMAN</b></h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
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
                    <th style="horizontal-align:center; vertical-align: middle">PEMOHON</th>
                    <th style="width:20px; horizontal-align:center; vertical-align: middle">JUMLAH BARANG</th>
                    <th style="horizontal-align:center; vertical-align: middle">PENINJAU</th>
                        <th style="horizontal-align:center; vertical-align: middle">STATUS</th>
                    <th style="horizontal-align:center; vertical-align: middle">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($peminjamans_pending as $peminjaman)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('peminjaman.show', ['peminjaman' => $peminjaman->id]) }}">{{$peminjaman->id}}</a></td>
                        <td>{{ $peminjaman->pemohon->name.' ['.$peminjaman->pemohon->roles->first()->name.'] ' .' ['.$peminjaman->pemohon->nip.'] ' }}</td>
                        <td>{{ $peminjaman->barangs->count() }}</td>
                        <td>{{ $peminjaman->peninjau->name ?? 'Belum ditinjau' }}</td>
                        <td>{{ $peminjaman->status }}</td>
                        <td>
                            <a href="{{ route('peminjaman.edit', ['peminjaman' => $peminjaman->id]) }}" class="btn btn-warning btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>&nbsp;
                            <a href="{{ route('peminjaman.destroy', ['peminjaman' => $peminjaman->id]) }}" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-xs modal-del">
                                <i class="fa fa-trash"></i>
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
            <h3 class="card-title"><b>PEMINJAMAN BERJALAN KESELURUHAN</b></h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
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
                    <th style="horizontal-align:center; vertical-align: middle">PEMOHON</th>
                    <th style="width:20px; horizontal-align:center; vertical-align: middle">JUMLAH BARANG</th>
                    <th style="horizontal-align:center; vertical-align: middle">PENINJAU</th>
                        <th style="horizontal-align:center; vertical-align: middle">STATUS</th>
                    <th style="horizontal-align:center; vertical-align: middle">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($peminjamans_active as $peminjaman)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('peminjaman.show', ['peminjaman' => $peminjaman->id]) }}">{{$peminjaman->id}}</a></td>
                        <td>{{ $peminjaman->pemohon->name.' ['.$peminjaman->pemohon->roles->first()->name.'] ' .' ['.$peminjaman->pemohon->nip.'] ' }}</td>
                        <td>{{ $peminjaman->barangs->count() }}</td>
                        <td>{{ $peminjaman->peninjau->name ?? 'Belum ditinjau' }}</td>
                        <td>{{ $peminjaman->status }}</td>
                        <td>
                            <a href="{{ route('peminjaman.edit', ['peminjaman' => $peminjaman->id]) }}" class="btn btn-warning btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>&nbsp;
                            <a href="{{ route('peminjaman.destroy', ['peminjaman' => $peminjaman->id]) }}" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-xs modal-del">
                                <i class="fa fa-trash"></i>
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
<!-- HISTORY -->
<div class="row">
    <div class="col-md-12"> 
        <div class="card card-info collapsed-card">
        <div class="card-header">
            <h3 class="card-title"><b>RIWAYAT PEMINJAMAN BARANG KESELURUHAN</b></h3>

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
                    <th style="horizontal-align:center; vertical-align: middle">PEMOHON</th>
                    <th style="width:20px; horizontal-align:center; vertical-align: middle">JUMLAH BARANG</th>
                    <th style="horizontal-align:center; vertical-align: middle">PENINJAU</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($past_peminjamans as $peminjaman)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('peminjaman.show', ['peminjaman' => $peminjaman->id]) }}">{{$peminjaman->id}}</a></td>
                        <td>{{ $peminjaman->pemohon->name.' ['.$peminjaman->pemohon->roles->first()->name.'] ' .' ['.$peminjaman->pemohon->nip.'] ' }}</td>
                        <td>{{ $peminjaman->old_barangs->count() }}</td>
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
@endsection
@extends('resources.peminjamans.partials.table')
@section('inline_js')
    <!-- modal delete -->
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin akan menghapus item ini? (tidak bisa dibatalkan)</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="delete-btn">Delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- JS UNTUK MENGHAPUS -->
    <script>
        let url = '';
        $('.modal-del').on('click', (e)=>{
            e.preventDefault();
            url = typeof e.target.href === 'undefined' || typeof e.target.href === undefined ? e.target.parentElement.href : e.target.href;

            $('#modal-delete').show();
        });
        $('#delete-btn').on('click', (e) => {
            e.preventDefault();
            let token = '{{ csrf_token() }}';
            $.ajax({
                url: url,
                type: "POST",
                data: {_method:'DELETE', _token:token},
                success: function(result) {console.log(result); location.reload();},
                error: (jqXHR) => {console.log(jqXHR.responseText)}
            });
        })
    </script>
    <!-- JS UNTUK MENGHAPUS -->
@endsection
@extends('resources.barangs.partials.notifikasi')
