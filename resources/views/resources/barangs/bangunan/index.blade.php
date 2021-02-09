@extends('layouts.home')
@section('content')
<!-- @if(session('message')) {{ session('message') }} @endif -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Barang Kategori :<b style="text-transform: uppercase"> {{ $category }}</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @can('aktiva-index')
                    <a href="{{ url('/barang/'. $category. '/create' ) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                <br><br>
                @endcan
                    <table id="datatable" class="table table-striped" style="text-align:center; text-transform: uppercase">
                        <thead>                  
                            <tr>
                            <th rowspan="2" style="width:10px; horizontal-align:center; vertical-align: middle">NO</th>
                            <th colspan="4" style="horizontal-align:center; vertical-align: middle">NO REGISTRASI</th>
                            <th rowspan="2" style="horizontal-align:center; vertical-align: middle">ALAMAT ASET TETAP</th>
                            <th rowspan="2" style="horizontal-align:center; vertical-align: middle">SUB-KATEGORI</th>
                            <th rowspan="2" style="width:100px; horizontal-align:center; vertical-align: middle">ACTION</th>
                            <th rowspan="2" style="horizontal-align:center; vertical-align: middle">KET</th>
                            </tr>
                            <tr>
                            <th style="width:10px; horizontal-align:center; vertical-align: middle">K.WIL</th>
                            <th style="width:10px; horizontal-align:center; vertical-align: middle">K.ASET</th>
                            <th style="width:10px; horizontal-align:center; vertical-align: middle">K.TGL</th>
                            <th style="width:10px; horizontal-align:center; vertical-align: middle">K.URUT</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                        @foreach ($barangs as $barang)
                        <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $barang->kode_kanwil }}</td>
                        <td>{{ $barang->kode_aset }}</td>
                        <td>{{ $barang->kode_tanggal }}</td>
                        <td>{{ $barang->kode_registrasi }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->kategori['nama'] }}</td>
                        <td>
                            <a href="{{ url('/barang/'.$category.'/'.$barang->id.'/show') }}" data-toggle="modal" data-target="#modal-view" class="btn btn-primary btn-xs modal-view">
                                <i class="fa fa-eye"></i>
                            </a>&nbsp;
                            @role('umum')
                            <a href="{{ url('/barang/'.$category.'/'.$barang->id.'/edit') }}" class="btn btn-warning btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>&nbsp;
                            <a href="{{ route('barang.destroy', ['barang' => $barang->id]) }}" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-xs modal-del">
                                <i class="fa fa-trash"></i>
                            </a>
                            @endrole
                        </td>
                        <td>{{ $barang->keterangan }}</td>
                        </tr>
                        <?php $i++ ?>
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

@extends('resources.barangs.partials.delete')
@extends('resources.barangs.partials.notifikasi')
@extends('resources.barangs.partials.table')
@extends('resources.barangs.partials.barang_show')


    
