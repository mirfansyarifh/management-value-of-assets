@extends('layouts.home')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Akun</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="datatable" class="table table-bordered" style="text-align:center">
            <thead>                  
                <tr>
                <th style="width: 10px">#</th>
                <th>Nama</th>
                <th>NIP</th>
                    <th>Jabatan</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->nip}}</td>
                    <td>{{ $user->jabatan }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->first()->name ?? 'ROLE??????' }}</td>
                    <td><a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>&nbsp;<a href="{{ route('user.destroy', ['user' => $user->id]) }}" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-xs modal-del"><i class="fa fa-trash"></i></a></td>
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
@extends('resources.barangs.partials.table')

