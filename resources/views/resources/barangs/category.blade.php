@extends('layouts.home')
@section('content')

        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $barangs['tanah']['jumlah'] }}</h3>
                <h4><b>TANAH</b></h4>
              </div>
              <div class="icon">
                <i class="ion-cube"></i>
              </div>
              <a href="{{ route('barang.indexByCategory', ['category' => 'tanah']) }}" class="small-box-footer">Pilih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3>{{ $barangs['bangunan']['jumlah'] }}</h3>
              <h4><b>BANGUNAN</b></h4>
              </div>
              <div class="icon">
                <i class="ion-cube"></i>
              </div>
              <a href="{{ route('barang.indexByCategory', ['category' => 'bangunan']) }}" class="small-box-footer">Pilih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3>{{ $barangs['kendaraan']['jumlah'] }}</h3>
              <h4><b>KENDARAAN</b></h4>
              </div>
              <div class="icon">
                <i class="ion-cube"></i>
              </div>
              <a href="{{ route('barang.indexByCategory', ['category' => 'kendaraan']) }}" class="small-box-footer">Pilih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <h3>{{ $barangs['peralatan_kantor']['jumlah'] }}</h3>
              <h4><b>PERALATAN KANTOR</b></h4>
              </div>
              <div class="icon">
                <i class="ion-cube"></i>
              </div>
              <a href="{{ route('barang.indexByCategory', ['category' => 'peralatan_kantor']) }}" class="small-box-footer">Pilih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
              <h3>{{ $barangs['peralatan_komputer']['jumlah'] }}</h3>
              <h4><b>PERALATAN KOMPUTER</b></h4>
              </div>
              <div class="icon">
                <i class="ion-cube"></i>
              </div>
              <a href="{{ route('barang.indexByCategory', ['category' => 'peralatan_komputer']) }}" class="small-box-footer">Pilih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
              <h3>{{ $barangs['lain-lain']['jumlah'] }}</h3>
              <h4><b>LAIN-LAIN</b></h4>
              </div>
              <div class="icon">
                <i class="ion-cube"></i>
              </div>
              <a href="{{ route('barang.indexByCategory', ['category' => 'lain-lain']) }}" class="small-box-footer">Pilih <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
    @endsection