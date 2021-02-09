@extends('layouts.home')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Aktiva : <b>Bulan {{ $month }}, Tahun {{ $year }}</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <a href="{{ route('aktiva.create', ['category' => $category]) }}" class="btn btn-success btn-m"><i class="fa fa-plus"></i> Tambah Data Aktiva</a>&nbsp;&nbsp;<a href="{{ route('aktiva.exportbyCategoryAndTime', ['year' => $year, 'month' => $month, 'category' => $category, 'status_guna' => $status_guna]) }}" class="btn btn-info btn-m"><i class="fa fa-save"></i> Export Excel</a>&nbsp;&nbsp;<a href="{{ route('aktiva.reportbyCategoryAndTime', ['year' => $year, 'month' => $month, 'category' => $category, 'status_guna' => $status_guna]) }}" class="btn btn-danger btn-m ">REKONSILIASI</a><hr>

        <font size="2" >
            <table id="datatable" class="table table-striped" style="text-align:center; text-transform: uppercase">
            <thead>                    
                <tr>
                <th rowspan="2" style="width: 10px; vertical-align: middle">NO</th>
                <th rowspan="2" style="width: 150px; horizontal-align:center; vertical-align: middle">NAMA ASET TETAP</th>
                <th rowspan="2" style="horizontal-align:center; vertical-align: middle">TGL BELI</th>
                <th rowspan="2" style="horizontal-align:center; vertical-align: middle">NILAI PEROL</th>
                <th rowspan="2" style="horizontal-align:center; vertical-align: middle">NIL. BUKU BULAN INI</th>
                <th colspan="3" style="horizontal-align:center; vertical-align: middle">BEBAN PENY. BERJALAN</th>
                <th rowspan="2" style="horizontal-align:center; vertical-align: middle">AKUM PENY. BULAN INI</th>
                <th rowspan="2" style="horizontal-align:center; vertical-align: middle">SINKRON</th>
                <th rowspan="2" style="horizontal-align:center; vertical-align: middle">ACTION</th>
                </tr> 
                <tr>
                <th style="width:100px; horizontal-align:center; vertical-align: middle">S/D BLN LALU</th>
                <th style="width:100px; horizontal-align:center; vertical-align: middle">BULAN INI</th>
                <th style="width:100px; horizontal-align:center; vertical-align: middle">S/D BULAN INI</th>
                </tr>                    
            </thead>
            <tbody>
            <?php $i = 1 ?>
            @foreach($aktivas as $aktiva)
            <tr>
                <td>{{ $i }}</td>
                <td style="text-align:left;">{{ $aktiva->barang->nama_barang ?? 'KOSONG'}}</td>
                <td style="text-align:left;">{{ $aktiva->tgl_perolehan }}</td>

                <td style="text-align:left;">@money( $aktiva->nilai_perolehan )</td>
                <td style="text-align:left;">@money( $aktiva->getNilaiBuku($year, $month) )</td>

                <td style="text-align:left;">@money( $aktiva->getAkmDariAwalTahunSampaiBulanLalu($year, $month) )</td>
                <td style="text-align:left;">@money( $aktiva->getPenyusutanBulanIni($year, $month) )</td>
                <td style="text-align:left;">@money( $aktiva->getAkmDariAwalTahunSampaiBulanIni($year, $month) )</td>

                <td style="text-align:left;">@money( $aktiva->getAkmDariPerolehanSampaiBulanIni($year, $month) )</td>                
                <td>
                    @if($aktiva->apakah_sinkron === 'true')
                        <span class="badge bg-success"><i class="fa fa-check"></i></span>
                    @else
                        <span class="badge bg-danger"><i class="fa fa-exclamation"></i></span>
                    @endif
                </td>
                <td><span onclick="showModal('{{ $aktiva->id }}')" data-toggle="modal" data-target="#modal-view" class="btn btn-primary btn-xs modal-view"><i class="fa fa-eye"></i></span>&nbsp;<a class="btn btn-info btn-xs history-view" href="{{ route('aktiva.history', ['id' => $aktiva->id]) }}"><i class="fa fa-history"></i></a>&nbsp;<a href="{{ url('/aktiva/'.$aktiva->id.'/edit') }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>&nbsp;<a href="{{ route('aktiva.destroy', ['aktiva' => $aktiva->id]) }}" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-xs modal-del"><i class="fa fa-trash"></i></a></td>
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
                <th style="horizontal-align:center; vertical-align: middle">JUMLAH</th>
                <th style="horizontal-align:center; vertical-align: middle">JUMLAH</th>
                <th style="horizontal-align:center; vertical-align: middle">JUMLAH</th>
                <th style="horizontal-align:center; vertical-align: middle">JUMLAH</th>
                <th style="horizontal-align:center; vertical-align: middle">JUMLAH</th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
            </tr>
            <tr>
                <th style="width: 10px; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle"></th>
                <th style="horizontal-align:center; vertical-align: middle">@money( $aktivas->pluck(['nilai_perolehan'])->sum() )</th>
                <th style="horizontal-align:center; vertical-align: middle">@money( $aktivas->sum(fn($aktiva) => $aktiva->getNilaiBuku($year, $month)) )</th>
                <th style="horizontal-align:center; vertical-align: middle">@money( $aktivas->sum(fn($aktiva) => $aktiva->getAkmDariAwalTahunSampaiBulanLalu($year, $month)) )</th>
                <th style="horizontal-align:center; vertical-align: middle">@money( $aktivas->sum(fn($aktiva) => $aktiva->getPenyusutanBulanIni($year, $month)) )</th>
                <th style="horizontal-align:center; vertical-align: middle">@money( $aktivas->sum(fn($aktiva) => $aktiva->getAkmDariAwalTahunSampaiBulanIni($year, $month)) )</th>
                <th style="horizontal-align:center; vertical-align: middle">@money( $aktivas->sum(fn($aktiva) => $aktiva->getAkmDariPerolehanSampaiBulanIni($year, $month)) )</th>
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

<div class="modal fade" id="modal-view">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-primary" style="text-align:center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="aktiva_detail">

        </div>
    </div>
</div>
</div>
@endsection
@extends('resources.aktivas.partials.delete')
@extends('resources.aktivas.partials.notifikasi')
@extends('resources.aktivas.partials.table')

@section('inline_js')
        <script>
            const aktivas = [
                    @foreach($aktivas as $aktiva)
                {
                    id: '{{ $aktiva->id }}',
                    no_regis: '{{ $aktiva->barang->kode_kanwil }} {{ $aktiva->barang->kode_aset }} {{ $aktiva->barang->kode_tanggal }} {{ $aktiva->barang->kode_registrasi }}',
                    nama_barang: '{{ $aktiva->barang->nama_barang }}',
                    tgl_perolehan: '{{ $aktiva->tgl_perolehan }}',
                    um: '{{ $aktiva->kategori->masa_manfaat }}',
                    um_sd_th_lalu: '{{ $aktiva->getUmDariPerolehanSampaiAkhirTahunLalu($year) }}',
                    um_sd_th_ini_bln_ini: '{{ $aktiva->getUmDariAwalTahunSampaiBulanIni($year, $month) }}',
                    um_awal_bln_ini: '{{ $aktiva->getUmDariPerolehanSampaiBulanIni($year, $month) }}',
                    nilai_perol: '@money( $aktiva->nilai_perolehan )',
                    nilai_residu: '@money( $aktiva->getNilaiResidu($year, $month) )',
                    nilai_peny: '@money( $aktiva->getNilaiPenyusutan($year, $month) )',
                    akm_peny_sd_th_lalu: '@money( $aktiva->getAkmPenyusutanDariPerolehanSampaiAkhirTahunLalu($year, $month) )',
                    nilai_yg_dpt_disusutkan: '@money( $aktiva->getNilaiYangDapatDisusutkan($year, $month) )',
                    sisa_um_th_ini: '{{ $aktiva->getSisaMasaManfaatSampaiAkhirTahunLalu($year) }}',

                    beban_peny_sd_bln_lalu: '@money( $aktiva->getAkmDariAwalTahunSampaiBulanLalu($year, $month) )',
                    beban_peny_bln_ini: '@money( $aktiva->getPenyusutanBulanIni($year, $month) )',
                    beban_peny_awal_bln_ini: '@money( $aktiva->getAkmDariAwalTahunSampaiBulanIni($year, $month) )',

                    akum_peny_sd_bulan_ini: '@money( $aktiva->getAkmDariPerolehanSampaiBulanIni($year, $month) )',
                    nilai_buku_bln_ini: '@money( $aktiva->getNilaiBuku($year, $month) )',
                },
                @endforeach
            ];

            function showModal(id) {
                // ambil id
                // let aktiva = aktivas.find(x => x.id === 'id')
                // fill modalnya dg data tadi
                // show modalnya
                let aktiva = aktivas.find(x => x.id === id);
                $('#aktiva_detail').html(modalTemplate(aktiva.id, aktiva.no_regis, aktiva.nama_barang, aktiva.tgl_perolehan, aktiva.nilai_perol, aktiva.um, aktiva.um_sd_th_lalu, aktiva.um_sd_th_ini_bln_ini, aktiva.um_awal_bln_ini, aktiva.nilai_residu, aktiva.nilai_peny, aktiva.akm_peny_sd_th_lalu, aktiva.nilai_yg_dpt_disusutkan, aktiva.sisa_um_th_ini, aktiva.beban_peny_sd_bln_lalu, aktiva.beban_peny_bln_ini, aktiva.beban_peny_awal_bln_ini, aktiva.akum_peny_sd_bulan_ini, aktiva.nilai_buku_bln_ini ));
                $('#modal-view').show();
            }

            function modalTemplate(id, no_regis, nama_barang, tgl_perolehan, nilai_perol, um, um_sd_th_lalu, um_sd_th_ini_bln_ini, um_awal_bln_ini, nilai_residu, nilai_peny, akm_peny_sd_th_lalu, nilai_yg_dpt_disusutkan, sisa_um_th_ini, beban_peny_sd_bln_lalu, beban_peny_bln_ini, beban_peny_awal_bln_ini, akum_peny_sd_bulan_ini, nilai_buku_bln_ini) {
                return `
                <i class="fa fa-3x fa-refresh fa-spin"></i>
                <table class="table table-striped table-bordered detail-view" >

                <tr>
                <th style="width: 300px;">NO REGIS (3/3/3/4)</th><td style="width: 300px;"><b>: </b>${no_regis}</td>
                <th style="width: 300px;">ALAMAT ASET TETAP</th><td style="width: 300px;"><b>: </b>${nama_barang}</td>
                </tr>
                <tr>
                <th style="width: 300px;">TGL BELI/PEROLEHAN</th><td style="width: 300px;"><b>: </b>${tgl_perolehan}</td>
                <th style="width: 300px;">NILAI BELI/PEROLEHAN</th><td style="width: 300px;"><b>: </b>${nilai_perol}</td>
                </tr>
                <tr>
                <th style="width: 300px;">MASA MANFAAT</th><td style="width: 300px;"><b>: </b>${um}</td>
                <th style="width: 300px;">UM. S.D TH LALU</th><td style="width: 300px;"><b>: </b>${um_sd_th_lalu}</td>
                </tr>
                <tr>
                <th style="width: 300px;">UM. TH INI</th><td style="width: 300px;"><b>: </b>${um_sd_th_ini_bln_ini}</td>
                <th style="width: 300px;">UM. S.D TH INI</th><td style="width: 300px;"><b>: </b>${um_awal_bln_ini}</td>
                </tr>
                <tr>
                <th style="width: 300px;">NILAI RESIDU</th><td style="width: 300px;"><b>: </b>${nilai_residu}</td>
                <th style="width: 300px;">NILAI PENY.</th><td style="width: 300px;"><b>: </b>${nilai_peny}</td>
                </tr>
                <tr>
                <th style="width: 300px;">AKUM. PENY. S.D THN LALU</th><td style="width: 300px;"><b>: </b>${akm_peny_sd_th_lalu}</td>
                <th style="width: 300px;">NILAI YG DISUSUTKAN</th><td style="width: 300px;"><b>: </b>${nilai_yg_dpt_disusutkan}</td>
                </tr>
                <tr>
                <th style="width: 300px;">SISA UM UTK TH INI</th><td style="width: 300px;"><b>: </b>${sisa_um_th_ini}</td>
                <th style="width: 300px;">PENY. TH. BERJALAN (S.D BLN LALU)</th><td style="width: 300px;"><b>: </b>${beban_peny_sd_bln_lalu}</td>
                </tr>
                <tr>
                <th style="width: 300px;">PENY. TH. BERJALAN (BLN INI)</th><td style="width: 300px;"><b>: </b>${beban_peny_bln_ini}</td>
                <th style="width: 300px;">PENY. TH. BERJALAN (S.D BLN INI)</th><td style="width: 300px;"><b>: </b>${beban_peny_awal_bln_ini}</td>
                </tr>
                <tr>
                <th style="width: 300px;">AKUM PENY. S/D BULAN INI</th><td style="width: 300px;"><b>: </b>${akum_peny_sd_bulan_ini}</td>
                <th style="width: 300px;">NILAI BUKU PER BULAN LAPORAN</th><td style="width: 300px;"><b>: </b>${nilai_buku_bln_ini}</td>
                </tr>

                </table>
            `;
            }
        </script>
@endsection