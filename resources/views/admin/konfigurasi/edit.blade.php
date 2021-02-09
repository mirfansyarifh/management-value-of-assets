@extends('layouts.home')
@section('content')
<div class="row">
   <!-- right column -->
   <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Edit Konfigurasi</h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <form role="form" action="{{ route('konfigurasi.update') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <input name="_method" type="hidden" value="PUT" readonly>
               <div class="row">
                     <!-- Email -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Email @error('email') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $konfigurasi->email }}" placeholder="Enter ..." >
                     </div>
                  </div>
                     <!-- Website -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Website @error('website') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="website" type="text" class="form-control @error('website') is-invalid @enderror" value="{{ $konfigurasi->website }}" placeholder="Enter ..." >
                     </div>
                  </div>
                     <!-- Telepon -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Telepon @error('telepon') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror" value="{{ $konfigurasi->telepon }}" placeholder="Enter ..." >
                     </div>
                  </div>
                     <!-- Alamat -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Alamat @error('alamat') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ $konfigurasi->alamat }}" placeholder="Otomatis" >
                     </div>
                  </div>
               </div>
               <div class="row">
                     <!-- Facebook -->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label >Facebook @error('facebook') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" value="{{ $konfigurasi->facebook }}" placeholder="Enter ..">
                     </div>
                  </div>
                     <!-- Instagram-->
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label>Instagram @error('instagram') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" value="{{ $konfigurasi->instagram }}" placeholder="Enter ..." >
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <!-- Background -->
                     <div class="form-group">
                        <label>Icon @error('icon') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="icon" type="file" class="custom-file-input" id="iconInputFile">
                                <label class="custom-file-label" for="iconInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <!-- Logo -->
                     <div class="form-group">
                        <label>Logo @error('logo') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="logo" type="file" class="custom-file-input" id="logoInputFile">
                                <label class="custom-file-label" for="logoInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
               {{--<div class="form-group">
                  <label>Logo</label>
                  <div class="row">
                     <div class="col-12 col-md-3 text-center">
                        <button type="button" class="btn btn-sm btn-danger d-block mb-2 mx-auto" id="removeLogoPreview" disabled>Reset Preview</button>
                        <img id="logoPreview" class="img-responsive" width="150px;" style="padding:.25rem;background:#eee;display:block;" src="{{ url('/storage'.'/'.$konfigurasi->logo) }}">
                     </div>
                     <div class="col-12 col-md-9">
                        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="logo_value" placeholder="Setting Value">
                        @error('logo')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                        @enderror
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label>Icon</label>
                  <div class="row">
                     <div class="col-12 col-md-3 text-center">
                        <button type="button" class="btn btn-sm btn-danger d-block mb-2 mx-auto" id="removeIconPreview" disabled>Reset Preview</button>
                        <img id="iconPreview" class="img-responsive" width="150px;" style="padding:.25rem;background:#eee;display:block;" src="{{ url('/storage'.'/'.$konfigurasi->icon) }}">
                     </div>
                     <div class="col-12 col-md-9">
                        <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" id="icon_value" placeholder="Setting Value">
                        @error('icon')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                        @enderror
                     </div>
                  </div>
               </div>--}}
               <div class="row">
                  <div class="col-sm-12">
                     <!-- Deskripsi -->
                     <div class="form-group">
                        <label>Deskripsi @error('deskripsi') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ $konfigurasi->deskripsi }}" placeholder="Enter ..." >
                     </div>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Save</button>
            </form>

         </div>
      </div>
      <!-- general form elements disabled -->
   </div>
   <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@section('plugins_js')
   <script>
      /*$("#logo_value").change(function(){
         readLogoURL(this);
      });
      function readLogoURL(input) {
         console.log("Preview Image");
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               $('#logoPreview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            $("#removeLogoPreview").prop('disabled', false);
         }
      }
      $("#removeLogoPreview").click(function(e){
         e.preventDefault();
         console.log("Delete Preview is running...");

         $('#logoPreview').attr('src', "{{ url('/storage'.'/'.$konfigurasi->logo) }}");
         $("#logo_value_value").val('');
         $("#removeLogoPreview").prop('disabled', true);
      });

      $("#icon_value").change(function(){
         readIconURL(this);
      });
      function readIconURL(input) {
         console.log("Preview Image");
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               $('#iconPreview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            $("#removeIconPreview").prop('disabled', false);
         }
      }
      $("#removeIconPreview").click(function(e){
         e.preventDefault();
         console.log("Delete Preview is running...");

         $('#logoPreview').attr('src', "{{ url('/storage'.'/'.$konfigurasi->icon) }}");
         $("#logo_value").val('');
         $("#removeLogoPreview").prop('disabled', true);
      });*/
   </script>
@endsection