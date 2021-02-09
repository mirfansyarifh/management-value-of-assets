@extends('layouts.home')
@section('content')
<div class="row">
   <!-- right column -->
   <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Edit Data AKUN :<b> {{ $users->name }}</b></h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <form role="form" action="{{ route('user.update', ['user' => $users->id]) }}" method="post">
               <input name="_method" type="hidden" value="PUT">
            @csrf
               <div class="row">
                     <!-- Nama -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Nama @error('name') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $users->name }}" placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- NIK -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>NIP @error('nip') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="nip" type="text" class="form-control @error('nip') is-invalid @enderror" value="{{ $users->nip }}" placeholder="Enter ...">
                     </div>
                  </div>
                  <!-- Jabatan -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Jabatan @error('jabatan') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" value="{{ $users->jabatan }}"placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- Email -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Email @error('email') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $users->email }}" placeholder="Enter ...">
                     </div>
                  </div>
                     <!-- Password -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Password (biarkan kosong jika tidak ingin mengubah) @error('password') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="password" id="pass" type="password" class="form-control @error('password') is-invalid @enderror" value="" placeholder="Enter ..." readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                     <label>Role</label>
                        <select name=role_id class="form-control select2 " style="width: 100%; text-transform: uppercase">
                           <option value="{{ $users->roles->first()->id }}" selected>{{ $users->roles->first()->name }}</option>
                           @foreach(\Spatie\Permission\Models\Role::whereNotIn('name', ['sadmin', 'admin', 'system'] )->get() as $role)
                              <option value="{{ $role->id }}">{{ $role->name }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Submit</button>
            </form>
         </div>
      </div>
      <!-- general form elements disabled -->
   </div>
   <!-- /.col -->
</div>
<!-- /.row -->
@endsection
@section('inline_js')
   <script>
      $( document ).ready(function() {
         setTimeout(function(){
            $("#pass").attr('readonly', false);
            $("#pass").focus();
         },500);
      });
   </script>
@endsection