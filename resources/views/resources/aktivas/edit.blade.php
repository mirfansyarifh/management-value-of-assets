@extends('layouts.home')
@section('content')
    <div class="row">
        <!-- right column -->
        <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Data Aktiva : <b style="text-transform: uppercase"> {{ $aktiva->barang['nama_barang'] }}</b></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-borderless" style="text-transform: uppercase">
                        <tr>
                            <th style="width: 300px;">DIEDIT TERAKHIR OLEH</th><td style="width: 300px;"><b>: </b> {{ $aktiva->last_updated_by_role_name }}</td>
                            <th style="width: 300px;">LOGIN SEBAGAI</th><td style="width: 300px;"><b>: </b>{{ auth()->user()->roles->first()->name }}</td>
                        </tr>
                    </table><hr><br>
                    <form role="form" action="{{ route('aktiva.update', ['aktiva' => $aktiva->id]) }}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        @if(auth()->user()->roles->first()->name !== $aktiva->last_updated_by_role_name)
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Nilai Perolehan dari Bag. {{$aktiva->last_updated_by_role_name }}</label>
                                    <input type="text" class="form-control"
                                           value="{{ $aktiva->nilai_perolehan }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- date picker -->
                                <div class="form-group">
                                    <label>Tanggal Perolehan dari Bag. {{$aktiva->last_updated_by_role_name }}</label>
                                    <input type="text" class="form-control"
                                           value="{{ $aktiva->tgl_perolehan }}" readonly>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Nilai Perolehan</label>
                                        <input name="nilai_perolehan" type="text" class="form-control"
                                               value="{{ $aktiva->nilai_perolehan }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- date picker -->
                                    <div class="form-group">
                                        <label>Tanggal Perolehan</label>
                                        <input name="tgl_perolehan" type="text" class="form-control"
                                               value="{{ $aktiva->tgl_perolehan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p>Untuk meng-approve data dari Bag. {{$aktiva->last_updated_by_role_name }}, jangan ubah nilai pada form dan tekan saja Submit</p>
                                <br>
                                <p>Mengubah nilai di form ini akan membatalkan status approved untuk aktiva ini pada laporan Bag. {{$aktiva->last_updated_by_role_name }}</p>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Nilai Perolehan</label>
                                        <input name="nilai_perolehan" type="text" class="form-control"
                                               value="{{ $aktiva->nilai_perolehan }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- date picker -->
                                    <div class="form-group">
                                        <label>Tanggal Perolehan</label>
                                        <input name="tgl_perolehan" type="text" class="form-control"
                                               value="{{ $aktiva->tgl_perolehan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p>Mengubah nilai di form ini akan membatalkan status approved untuk aktiva ini pada laporan Bag. {{ auth()->user()->roles->first()->name === 'keuangan' ? 'umum' : 'keuangan' }}</p>
                                <br>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Submit
                        </button>
                    </form>
                </div>
            </div>
            <!-- general form elements disabled -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection