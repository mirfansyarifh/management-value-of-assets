  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://sites.google.com/a/bpjsketenagakerjaan.go.id/infoalu/home" class="nav-link">Info.Alu</a>
      </li>
    </ul>
    @php
      use App\Models\Resources\Aktiva\Aktiva;
      use App\Models\Resources\Peminjaman\Peminjaman;
      $peminjamans_pending = Peminjaman::whereStatus('pending')->get();
      $aktivas_unapproved_umum = Aktiva::whereUmumApproved(false)->get();
      $aktivas_unapproved_keuangan = Aktiva::whereKeuanganApproved(false)->get();
    @endphp
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @hasanyrole('umum|keuangan')
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          @role('keuangan')
          @if(\App\Models\Resources\Barang\Barang::all()->where('keuangan_approved', '=',false)->count() > 0)
            <span class="badge badge-warning navbar-badge">
            !
          </span>
          @endif
          @endrole
          @if($peminjamans_pending->count() > 0 || (auth()->user()->roles->first()->name === 'umum' ? $aktivas_unapproved_umum->count() > 0 : $aktivas_unapproved_keuangan->count() > 0))
          <span class="badge badge-warning navbar-badge">
            !
          </span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-xxxl dropdown-menu-right">
          <span class="dropdown-item dropdown-header">@if($peminjamans_pending->count() > 0 || (auth()->user()->roles->first()->name === 'umum' ? $aktivas_unapproved_umum->count() > 0 : $aktivas_unapproved_keuangan->count() > 0)) Notifikasi @else Tidak Ada Notifikasi @endif</span>
          <div class="dropdown-divider"></div>
          @role('umum')
          @if($aktivas_unapproved_umum->count() > 0)
            @foreach($aktivas_unapproved_umum as $aktiva)
              <span class="dropdown-item">
            <a href="{{ route('aktiva.edit', ['aktiva' => $aktiva->id]) }}">Aktiva dari {{$aktiva->barang->nama_barang}} {{$aktiva->barang->properties->merk ?? ''}} belum diapprove</a>
          </span>
            @endforeach
          @endif
          @if($peminjamans_pending->count() > 0)
            <span class="dropdown-item">
            <a href="{{ route('peminjaman.requests') }}"><i class="fas fa-envelope mr-2"></i> {{ $peminjamans_pending->count() }} pengajuan peminjaman</a>
          </span>
          @endif
          @endrole
          @role('keuangan')
          @if($aktivas_unapproved_keuangan->count() > 0)
            @foreach($aktivas_unapproved_keuangan as $aktiva)
              <span class="dropdown-item">
            <a href="{{ route('aktiva.edit', ['aktiva' => $aktiva->id]) }}">Aktiva dari {{$aktiva->barang->nama_barang}} {{$aktiva->barang->properties->merk ?? ''}} belum diapprove</a>
          </span>
            @endforeach
          @endif

          @if(\App\Models\Resources\Barang\Barang::all()->where('keuangan_approved', '=',false)->count() > 0)
            @foreach(\App\Models\Resources\Barang\Barang::all()->where('keuangan_approved', '=',false) as $barang)
              <span class="dropdown-item">
            <span>{{$barang->nama_barang}} {{$barang->properties->merk ?? ''}} telah mengalami perubahan status menjadi {{$barang->status_guna}} <a href="{{ route('barang.approve', ['id' => $barang->id]) }}">Approve</a></span>
              </span>
            @endforeach
          @endif
          @endrole
          <div class="dropdown-divider"></div>
          {{--<a href="{{ route('peminjaman.requests') }}" class="dropdown-item dropdown-footer">Lihat peminjaman pending</a>--}}
        </div>
      </li>
      @endhasanyrole
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->