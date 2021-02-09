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