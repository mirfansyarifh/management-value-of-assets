  <!-- Main/Side Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <font size="5" class="brand-text font-weight-light" style="color:#00cc66"><b>BPJS</b></font>
      <font size="3" class="brand-text font-weight-light" style="color:#3399ff"><b>Ketenagakerjaan</b></font>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('user.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a data-toggle="modal" data-target="#modal-sm" class="d-block" style="text-transform: uppercase"><b> {{ auth()->user()->name }}</b></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @can('aktiva-index')
          <li class="nav-item">
            <a href="{{ route('aktiva.indexOfCategories') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Aktiva
              </p>
            </a>
          </li>
          @endcan
          @can('barang-index')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Asset/Barang
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('barang.indexByCategory', ['category' => 'tanah']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tanah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('barang.indexByCategory', ['category' => 'bangunan']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bangunan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('barang.indexByCategory', ['category' => 'kendaraan']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kendaraan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('barang.indexByCategory', ['category' => 'peralatan_kantor']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peralatan Kantor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('barang.indexByCategory', ['category' => 'peralatan_komputer']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peralatan Komputer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('barang.indexByCategory', ['category' => 'lain-lain']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lain-Lain</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @hasanyrole('umum|keuangan|karyawan')
          <li class="nav-header">SISTEM PEMINJAMAN</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cubes"></i>
              <p>
                Menu
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('peminjaman.create') }}" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Buat Peminjaman</p>
                </a>
              </li>
              @can('peminjaman-index')
                <li class="nav-item">
                  <a href="{{ route('peminjaman.requests') }}" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p>Arsip Peminjaman</p>
                  </a>
                </li>
              @endcan
              <li class="nav-item">
                <a href="{{ route('peminjaman.index') }}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>Peminjaman Saya</p>
                </a>
              </li>
            </ul>
          </li>
          @endhasanyrole
          @can('user-index')
          <li class="nav-header">PENGATURAN</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.create') }}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Tambah User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="fa fa-database nav-icon"></i>
                  <p>Daftar Users</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('konfigurasi-show')
          <li class="nav-item">
            <a href="{{ route('konfigurasi.show') }}" class="nav-link">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                Website
              </p>
            </a>
          </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" style="text-transform: uppercase; text-align:center"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Halo&hellip;  <b style="text-transform: uppercase;">{{ auth()->user()->name }}</b></p>
              <p>Status anda adalah, {{ auth()->user()->roles->first()->name }}</p>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="#" class="btn btn-primary"
                      onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Sign out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->