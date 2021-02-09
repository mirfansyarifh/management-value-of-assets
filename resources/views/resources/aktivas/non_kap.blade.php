@extends('layouts.home')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Aktiva NON KAPITALISASI : <b>{{ $category }}</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <font size="2" >
        <a href="{{ route('aktiva.create', ['category' => $category]) }}" class="btn btn-success btn-m"><i class="fa fa-plus"></i> Tambah Data Aktiva</a>&nbsp;&nbsp;<a href="{{ route('aktiva.exportbyCategoryNonKapitalisasi', ['category' => $category, 'status_guna' => $status_guna]) }}" class="btn btn-info btn-m"><i class="fa fa-save"></i> Export Excel</a><hr>

            <table id="datatable" class="table table-striped" style="text-align:center; text-transform: uppercase">
            <thead>                    
                <tr>
                <th style="width: 10px; vertical-align: middle">NO</th>
                <th style="width: 150px; horizontal-align:center; vertical-align: middle">NAMA ASET TETAP</th>
                <th style="horizontal-align:center; vertical-align: middle">TGL BELI</th>
                <th style="horizontal-align:center; vertical-align: middle">NILAI PEROL</th>
                <th style="horizontal-align:center; vertical-align: middle">KONDISI</th>
                <th style="horizontal-align:center; vertical-align: middle">KETERANGAN</th>
                <th style="horizontal-align:center; vertical-align: middle">ACTION</th>
                </tr>                  
            </thead>
            <tbody>
            <?php $i = 1 ?>
            @foreach($aktivas as $aktiva)
            <tr>
                <td>{{ $i }}</td>
                <td style="text-align:left;">{{ $aktiva->barang->properties->merk ?? 'KOSONG'}}</td>
                <td style="text-align:center;">{{ $aktiva->tgl_perolehan }}</td>
                <td style="text-align:center;">@money( $aktiva->nilai_perolehan )</td>
                <td style="text-align:center;">{{ $aktiva->barang->kondisi }}</td>
                <td style="text-align:center;">{{ $aktiva->barang->keterangan }}</td>
                <td><a class="btn btn-info btn-xs history-view" href="{{ route('aktiva.history', ['id' => $aktiva->id]) }}"><i class="fa fa-history"></i></a>&nbsp;<a href="{{ url('/aktiva/'.$aktiva->id.'/edit') }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>&nbsp;<a href="{{ route('aktiva.destroy', ['aktiva' => $aktiva->id]) }}" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-xs modal-del"><i class="fa fa-trash"></i></a></td>
                </tr> 
            <?php $i++ ?>

            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th style="width: 10px; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle">JUMLAH</th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
            </tr>
            <tr>
                <th style="width: 10px; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle">@money( $aktivas->pluck(['nilai_perolehan'])->sum() )</th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
            </tr>
            </tfoot>
            </table>
            </font>
        </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
 <!-- /.row -->

@endsection
@extends('resources.aktivas.partials.delete')
@extends('resources.aktivas.partials.notifikasi')
@extends('resources.aktivas.partials.table')
