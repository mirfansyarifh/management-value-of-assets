@extends('layouts.home')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">REPORT : <b style="text-transform: uppercase">{{ $category }}</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <font size="2" >
        <a href="{{ route('aktiva.indexByTimeAndCategory', ['year'=>$year, 'month'=>$month, 'category' => $category,  'status_guna' => $status_guna]) }}" class="btn btn-warning btn-m"><i class="fa fa-arrow-left"></i> Kembali</a><hr>

            <table class="table table-bordered" style="text-align:center; text-transform: uppercase">
            <thead>                    
                <tr>
                <th rowspan="2" style="width: 150px; horizontal-align:center; vertical-align: middle">NAMA ASET TETAP</th>
                <th rowspan="2" style="horizontal-align:center; vertical-align: middle">TGL PEROL</th>
                <th colspan="3" style="horizontal-align:center; vertical-align: middle">UMUM</th>
                <th colspan="3" style="horizontal-align:center; vertical-align: middle">KEUANGAN</th>
                <th rowspan="2" style="horizontal-align:center; vertical-align: middle">SINKRON</th>
                </tr>   
                <tr>
                <th style="horizontal-align:center; vertical-align: middle">NILAI PEROL</th>
                <th style="horizontal-align:center; vertical-align: middle">NILAI BUKU S.D BULAN INI</th>
                <th style="horizontal-align:center; vertical-align: middle">AKUM PENY S.D BULAN INI</th>
                <th style="horizontal-align:center; vertical-align: middle">NILAI PEROL</th>
                <th style="horizontal-align:center; vertical-align: middle">NILAI BUKU S.D BULAN INI</th>
                <th style="horizontal-align:center; vertical-align: middle">AKUM PENY S.D BULAN INI</th>
                </tr>              
            </thead>
            <tbody>
            @foreach($aktivas as $aktiva)
                <tr>
                    <td>{{$aktiva->barang->properties->merk ?? $aktiva->barang->nama_barang }}{{ $aktiva->barang->properties->nomor->nopolis ?? '' }}</td>
                    <td>{{$aktiva->tgl_perolehan}}</td>
                    <td>@money($aktiva->umum_approved ? $aktiva->nilai_perolehan : 0)</td>
                    <td>@money($aktiva->umum_approved ? $aktiva->getNilaiBuku($year, $month) : 0)</td>
                    <td>@money($aktiva->umum_approved ? $aktiva->getAkmDariPerolehanSampaiBulanIni($year, $month) : 0)</td>
                    <td>@money($aktiva->keuangan_approved ? $aktiva->nilai_perolehan : 0)</td>
                    <td>@money($aktiva->keuangan_approved ? $aktiva->getNilaiBuku($year, $month) : 0)</td>
                    <td>@money($aktiva->keuangan_approved ? $aktiva->getAkmDariPerolehanSampaiBulanIni($year, $month) : 0)</td>
                    <td>
                        @if($aktiva->apakah_sinkron === 'true')
                            <span class="badge bg-success"><i class="fa fa-check"></i></span>
                        @else
                            <span class="badge bg-danger"><i class="fa fa-exclamation"></i></span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle">JUMLAH</th>
                <th style="horizontal-align:center; vertical-align: middle">JUMLAH</th>
                <th style="horizontal-align:center; vertical-align: middle">JUMLAH</th>
                <th style="horizontal-align:center; vertical-align: middle">JUMLAH</th>
                <th style="horizontal-align:center; vertical-align: middle">JUMLAH</th>
                <th style="horizontal-align:center; vertical-align: middle">JUMLAH</th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
            </tr>
            <tr>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle">@money($aktivas->filter(fn($aktiva) => $aktiva->umum_approved)->sum('nilai_perolehan'))</th>
                <th style="horizontal-align:center; vertical-align: middle">@money($aktivas->filter(fn($aktiva) => $aktiva->umum_approved)->sum(fn($aktiva) => $aktiva->getNilaiBuku($year, $month)))</th>
                <th style="horizontal-align:center; vertical-align: middle">@money($aktivas->filter(fn($aktiva) => $aktiva->umum_approved)->sum(fn($aktiva) => $aktiva->getAkmDariPerolehanSampaiBulanIni($year, $month)))</th>
                <th style="horizontal-align:center; vertical-align: middle">@money($aktivas->filter(fn($aktiva) => $aktiva->keuangan_approved)->sum('nilai_perolehan'))</th>
                <th style="horizontal-align:center; vertical-align: middle">@money($aktivas->filter(fn($aktiva) => $aktiva->keuangan_approved)->sum(fn($aktiva) => $aktiva->getNilaiBuku($year, $month)))</th>
                <th style="horizontal-align:center; vertical-align: middle">@money($aktivas->filter(fn($aktiva) => $aktiva->keuangan_approved)->sum(fn($aktiva) => $aktiva->getAkmDariPerolehanSampaiBulanIni($year, $month)))</th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                </tr>
            </tfoot>
            </table>
            </font>
                <!-- this row will not appear when printing -->
        <div class="row no-print">
        <div class="col-12">
            <a type="button" onClick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
        </div>
        </div>
        </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
 <!-- /.row -->

@endsection
