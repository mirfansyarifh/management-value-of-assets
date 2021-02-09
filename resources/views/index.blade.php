@extends('layouts.home')
@section('content')


@hasanyrole('umum|keuangan')
<!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $aktiva_count }}</h3>
                <p><b>Aktiva</b></p><br>
              </div>
              <div class="icon">
                <i class="ion-folder"></i>
              </div>
              <a href="{{ route('aktiva.indexOfCategories') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3>{{ $barang_count }}</h3>
              <p><b>Asset/Barang</b></p><br>
              </div>
              <div class="icon">
                <i class="ion-navicon-round"></i>
              </div>
              <a href="{{ route('barang.indexOfCategories') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
              <h3>{{ $peminjaman_pendingcount }}</h3>
                <p><b>Peminjaman</b></p><br>
              </div>
              <div class="icon">
                <i class="ion-compose"></i>
              </div>
              <a href="{{ route('peminjaman.requests') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
          
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">PEMINJAMAN REQUEST</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-eye"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-2">
                <table id="datatable1" class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                    <th style="width:10px;">NO</th>
                    <th>PEMOHON</th>
                    <th>JUMLAH BARANG</th>
                    <th>DIAJUKAN</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($peminjamans_pending as $peminjaman)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $peminjaman->pemohon->name }} </td>
                    <td>{{ $peminjaman->barangs->count() }}</td>
                    <td>{{ $peminjaman->created_at }}</td>
                      <td>
                          <a href="{{ route('peminjaman.approve', ['id' => $peminjaman->id]) }}">Approve</a>&nbsp;|&nbsp;
                          <a href="{{ route('peminjaman.tolak', ['id' => $peminjaman->id]) }}">Tolak</a>&nbsp;|&nbsp;
                          <a href="{{ route('peminjaman.edit', ['peminjaman' => $peminjaman->id]) }}">Edit</a>
                      </td>
                  </tr>
                @endforeach
                </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
          
          <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title" style="text-transform: uppercase">AKTIVAS UN-APPROVED BY ROLE : {{ auth()->user()->role }}</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-eye"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-2">
                <table id="datatable2" class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th style="width:10px;">NO</th>
                    <th>NAMA BARANG</th>
                    <th>KATEGORI</th>
                    <th>TGL DIBUAT</th>
                  </tr>
                  </thead>
                  <tbody>
                  @role('umum')
                    @foreach($aktivas_unapproved_umum as $aktivas_umum)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ url('/aktiva/'.$aktivas_umum->id.'/edit') }}">{{ $aktivas_umum->barang->nama_barang }}  </a></td>
                        <td style="text-transform: uppercase">{{ $aktivas_umum->barang->kategori['nama'] ?? ''}}</td>
                        <td>{{ $aktivas_umum->created_at }}</td>
                      </tr>
                    @endforeach
                  @endrole
                  @role('keuangan')
                    @foreach($aktivas_unapproved_keuangan as $aktivas_keu)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ url('/aktiva/'.$aktivas_keu->id.'/edit') }}">{{ $aktivas_keu->barang->nama_barang }}  </a></td>
                        <td style="text-transform: uppercase">{{ $aktivas_keu->barang->kategori['nama'] ?? ''}}</td>
                        <td>{{ $aktivas_keu->created_at }}</td>
                      </tr>
                    @endforeach
                  @endrole
                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        @endhasanyrole

        @role('karyawan')

        <div class="row">
          <img class="dashboarkaryawan" src="{{ asset('dashboar_karyawan.png') }}">
        </div>
        @endrole


    
    @endsection
@extends('layouts.partials.table')
