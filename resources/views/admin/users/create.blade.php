@extends('layouts.home')
@section('content')
<div class="row">
   <!-- right column -->
   <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="card card-primary">
         <div class="card-header">
            <h3 class="card-title">Buat Akun Baru</h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <form role="form" action="{{ route('user.store') }}" method="POST">
            @csrf
               <div class="row">
                     <!-- Nama -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Nama @error('name') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- NIK -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>NIP @error('nik') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="nip" type="text" class="form-control @error('nik') is-invalid @enderror" placeholder="Enter ...">
                     </div>
                  </div>
                  <!-- Jabatan -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Jabatan @error('jabatan') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- Email -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Email @error('email') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- Password -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Password @error('password') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter ..." autocomplete="false">
                     </div>
                  </div>
               </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="form-group">
                        <label>Role</label>
                           <select name="role_id" class="form-control select2 " style="width: 100%;">
                              @foreach(\Spatie\Permission\Models\Role::whereNotIn('name', ['sadmin', 'admin', 'system'] )->get() as $role)
                                 <option value="{{ $role->id }}">{{ $role->name }}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <button type="submit" name= "submit" value="Insert" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Submit</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!-- general form elements disabled -->
   </div>
   <!-- /.col -->
</div>
<div>
   <b>note</b>
   <i>*label dengan warna <b style="color:#0000ff"> biru</b>, masuk ke attribute properties</i>
</div>
<!-- /.row -->
@endsection