
  <div class="modal-body">
  <a href="{{ url('/barang/'.$barang->id.'/peminjaman_history') }}" class="btn btn-info btn-xs">
                                <i class="fa fa-bullseye"></i>
                                Lihat History Peminjaman Barang</a><hr>
      <table class="table table-bordered detail-view" style="text-transform: uppercase">

        <tr>
        <th style="width: 300px;">NO. REGISTRASI (3/3/3/4)</th><td style="width: 300px;"><b>: </b>{{ $barang->kode_kanwil }} {{ $barang->kode_aset }} {{ $barang->kode_tanggal }} {{ $barang->kode_registrasi }}</td>
        <th style="width: 300px;">ALAMAT ASET TETAP</th><td style="width: 300px;"><b>: </b>{{ $barang->nama_barang }}</td>
        </tr>

        <tr>
        <th style="width: 300px;">SUB-KATEGORI</th><td style="width: 300px;"><b>: </b>{{ $barang->kategori['nama'] }}</td>
        <th style="width: 300px;">UMUR MANFAAT</th><td style="width: 300px;"><b>: </b>{{ $barang->kategori['masa_manfaat'] }}</td>
        </tr>

        <tr>
        <th style="width: 300px;">STATUS GUNA</th><td style="width: 300px;"><b>: </b>{{ $barang->status_guna }}</td>
        <th style="width: 300px;">KONDISI</th><td style="width: 300px;"><b>: </b>{{ $barang->kondisi }}</td>
        </tr>
        
        <tr>
        <th style="width: 300px;">MERK/TYPE</th><td style="width: 300px;"><b>: </b>{{ $barang->properties->merk ?? 'null'}}</td>
        <th style="width: 300px;">KETERANGAN</th><td style="width: 300px;"><b>: </b>{{ $barang->keterangan  ?? 'null'}}</td>
        </tr>

        </table>
  </div>