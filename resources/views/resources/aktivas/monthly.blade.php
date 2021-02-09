@extends('layouts.home')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Aktiva Perbulan Kategori :<b style="text-transform: uppercase"> {{ $category }}</b></h3>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">

                {{--sementara, dihapus nanti start <br>
                @foreach($aktivas as $aktiva)
                        @foreach($aktiva as $aktivaDiBulan)
                            @foreach($aktivaDiBulan as $aktivaApprovedBy)
                                {{$aktivaApprovedBy}}&comma;<br>
                            @endforeach
                        @endforeach
                @endforeach
                sementara, dihapus nanti end--}}
                <table class="table table-bordered" style="text-align:center; text-transform: uppercase">
                <thead>                  
                    <tr>
                    <th style="width: 10px">NO</th>
                    <th style="width: 300px">Lap. Nilai Buku B.Keuangan</th>
                    <th style="width: 300px">Lap. Nilai Buku B.Umum</th>
                    <th style="width: 200px">Bulan</th>
                    <th style="width: 200px">Tahun</th>
                    <th style="width: 40px">RECONN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(getMonthNames() as $monthNumber => $monthName)
                        @php
                            $year = \Illuminate\Support\Carbon::now()->year;
                            $aktiva_keu = $aktivas->get('keuangan');
                            $aktiva_umum = $aktivas->get('umum');
                            $nilai_buku_keu = !is_null($aktiva_keu) ? $aktiva_keu->sum(fn($aktiva) => $aktiva->getNilaiBuku($year, $monthNumber)) : 0;
                            $nilai_buku_umum = !is_null($aktiva_umum) ? $aktiva_umum->sum(fn($aktiva) => $aktiva->getNilaiBuku($year, $monthNumber)) : 0;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td style="text-align:left;">@money($nilai_buku_keu)</td>
                            <td style="text-align:left;">@money($nilai_buku_umum)</td>
                            <td>
                                <a href="{{ route('aktiva.indexByTimeAndCategory', ['year'=>$year, 'month'=>$monthNumber, 'category' => $category, 'status_guna' => $status_guna]) }}">
                                    {{ $monthName }}
                                </a>
                            </td>
                            <td>{{ $year }}</td>
                            <td>
                                @if($nilai_buku_keu == $nilai_buku_umum)
                                    <span class="badge bg-success"><i class="fa fa-check"></i></span>
                                @else
                                    <span class="badge bg-danger"><i class="fa fa-exclamation"></i></span>
                                @endif
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

@endsection