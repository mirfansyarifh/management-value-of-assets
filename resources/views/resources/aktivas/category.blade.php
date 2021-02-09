@extends('layouts.home')
@section('content')

        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $aktivas['tanah']['jumlah'] }}</h3>
                <h4><b>TANAH</b></h4>
              </div>
              <div class="icon">
                <i class="ion-cube"></i>
              </div>
                <div class="small-box-footer">
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'tanah', 'status_guna' => 'guna']) }}" class="btn btn-info btn-xs"><i class="fas fa-arrow-circle-right"></i> GUNA</a>&emsp; 
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'tanah', 'status_guna' => 'non_guna']) }}" class="btn btn-info btn-xs"><i class="fas fa-arrow-circle-right"></i> NON-GUNA</a>&emsp;                
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'tanah', 'status_guna' => 'non_kapitalisasi']) }}" class="btn btn-info btn-xs"><i class="fas fa-arrow-circle-right"></i> NON-KAPITALIS</a>&emsp;
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'tanah', 'status_guna' => 'jual']) }}" class="btn btn-info btn-xs"><i class="fas fa-arrow-circle-right"></i> JUAL</a>
                </div>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3>{{ $aktivas['bangunan']['jumlah'] }}</h3>
              <h4><b>BANGUNAN</b></h4>
              </div>
              <div class="icon">
                <i class="ion-cube"></i>
              </div>
                <div class="small-box-footer">
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'bangunan', 'status_guna' => 'guna']) }}" class="btn btn-success btn-xs"><i class="fas fa-arrow-circle-right"></i> GUNA</a>&emsp; 
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'bangunan', 'status_guna' => 'non_guna']) }}" class="btn btn-success btn-xs"><i class="fas fa-arrow-circle-right"></i> NON-GUNA</a>&emsp;                
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'bangunan', 'status_guna' => 'non_kapitalisasi']) }}" class="btn btn-success btn-xs"><i class="fas fa-arrow-circle-right"></i> NON-KAPITALIS</a>&emsp;
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'bangunan', 'status_guna' => 'jual']) }}" class="btn btn-success btn-xs"><i class="fas fa-arrow-circle-right"></i> JUAL</a>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3>{{ $aktivas['kendaraan']['jumlah'] }}</h3>
              <h4><b>KENDARAAN</b></h4>
              </div>
              <div class="icon">
                <i class="ion-cube"></i>
              </div>
                <div class="small-box-footer">
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'kendaraan', 'status_guna' => 'guna']) }}" class="btn btn-warning btn-xs"><i class="fas fa-arrow-circle-right"></i> GUNA</a>&emsp; 
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'kendaraan', 'status_guna' => 'non_guna']) }}" class="btn btn-warning btn-xs"><i class="fas fa-arrow-circle-right"></i> NON-GUNA</a>&emsp;                
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'kendaraan', 'status_guna' => 'non_kapitalisasi']) }}" class="btn btn-warning btn-xs"><i class="fas fa-arrow-circle-right"></i> NON-KAPITALIS</a>&emsp;
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'kendaraan', 'status_guna' => 'jual']) }}" class="btn btn-warning btn-xs"><i class="fas fa-arrow-circle-right"></i> JUAL</a>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
              <h3>{{ $aktivas['peralatan_kantor']['jumlah'] }}</h3>
              <h4><b>PERALATAN KANTOR</b></h4>
              </div>
              <div class="icon">
                <i class="ion-cube"></i>
              </div>
                <div class="small-box-footer">
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'peralatan_kantor', 'status_guna' => 'guna']) }}" class="btn btn-primary btn-xs"><i class="fas fa-arrow-circle-right"></i> GUNA</a>&emsp; 
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'peralatan_kantor', 'status_guna' => 'non_guna']) }}" class="btn btn-primary btn-xs"><i class="fas fa-arrow-circle-right"></i> NON-GUNA</a>&emsp;                
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'peralatan_kantor', 'status_guna' => 'non_kapitalisasi']) }}" class="btn btn-primary btn-xs"><i class="fas fa-arrow-circle-right"></i> NON-KAPITALIS</a>&emsp;
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'peralatan_kantor', 'status_guna' => 'jual']) }}" class="btn btn-primary btn-xs"><i class="fas fa-arrow-circle-right"></i> JUAL</a>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
              <h3>{{ $aktivas['peralatan_komputer']['jumlah'] }}</h3>
              <h4><b>PERALATAN KOMPUTER</b></h4>
              </div>
              <div class="icon">
                <i class="ion-cube"></i>
              </div>
                <div class="small-box-footer">
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'peralatan_komputer', 'status_guna' => 'guna']) }}" class="btn btn-secondary btn-xs"><i class="fas fa-arrow-circle-right"></i> GUNA</a>&emsp; 
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'peralatan_komputer', 'status_guna' => 'non_guna']) }}" class="btn btn-secondary btn-xs"><i class="fas fa-arrow-circle-right"></i> NON-GUNA</a>&emsp;                
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'peralatan_komputer', 'status_guna' => 'non_kapitalisasi']) }}" class="btn btn-secondary btn-xs"><i class="fas fa-arrow-circle-right"></i> NON-KAPITALIS</a>&emsp;
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'peralatan_komputer', 'status_guna' => 'jual']) }}" class="btn btn-secondary btn-xs"><i class="fas fa-arrow-circle-right"></i> JUAL</a>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
              <h3>{{ $aktivas['lain-lain']['jumlah'] }}</h3>
              <h4><b>LAIN-LAIN</b></h4>
              </div>
              <div class="icon">
                <i class="ion-cube"></i>
              </div>
                <div class="small-box-footer">
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'lain-lain', 'status_guna' => 'guna']) }}" class="btn btn-light btn-xs"><i class="fas fa-arrow-circle-right"></i> GUNA</a>&emsp; 
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'lain-lain', 'status_guna' => 'non_guna']) }}" class="btn btn-light btn-xs"><i class="fas fa-arrow-circle-right"></i> NON-GUNA</a>&emsp;                
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'lain-lain', 'status_guna' => 'non_kapitalisasi']) }}" class="btn btn-light btn-xs"><i class="fas fa-arrow-circle-right"></i> NON-KAPITALIS</a>&emsp;
                  <a href="{{ route('aktiva.indexByCategory', ['category' => 'lain-lain', 'status_guna' => 'jual']) }}" class="btn btn-light btn-xs"><i class="fas fa-arrow-circle-right"></i> JUAL</a>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
    @endsection
@extends('resources.barangs.partials.notifikasi')
