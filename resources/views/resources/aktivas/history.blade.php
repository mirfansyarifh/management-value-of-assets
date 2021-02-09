
@extends('layouts.home')
@section('content')
<div class="row">
   <!-- right column -->
   <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="card card-warning">
         <div class="card-header">
            <h3 class="card-title">Histori Aktiva :<b style="text-transform: uppercase"> {{ $nama }}</b></h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
         @foreach($aktiva as $time => $historyAtTime)
        <br><b style="color:blue">Update on {{ $time }}</b><hr>
         <table class="table table-striped" style="text-align:left; text-transform: uppercase">
            <thead>                  
                <tr>
                    <th style="width: 100px;">User</th>
                    <th style="width: 100px;">Bagian</th>
                    <th style="width: 100px;">Nilai yang diubah</th>
                    <th style="width: 100px;">Nilai lama</th>
                    <th style="width: 100px;">Nilai baru</th>
                </tr>
            </thead>
            <tbody>
            @foreach($historyAtTime as $update)
                    <tr>
                        <td style="width: 100px;">{{ \App\Models\Auth\User\User::find($update->user_id)->name }}</td>
                        <td style="width: 100px;">{{ \App\Models\Auth\User\User::find($update->user_id)->roles->first()->name }}</td>
                        <td style="width: 100px;">{{ $update->fieldName() }}</td>
                        <td style="width: 100px;">{{ $update->oldValue() ?? 'kosong' }}</td>
                        <td style="width: 100px;">{{ $update->newValue() ?? 'kosong' }}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            @endforeach
            <hr>
    <a href="{{ route('aktiva.edit', ['aktiva'=>$id]) }}"  class="btn btn-warning btn-block"><i class="fa fa-edit"></i><b>  Edit/Approve Aktiva ini</b></a>

@endsection