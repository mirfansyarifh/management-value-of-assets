@extends('layouts.home')

@section('plugin_css')
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
@endsection

@section('content')
<div class="row">
   <!-- right column -->
   <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="card card-success">
         <div class="card-header">
            <h3 class="card-title">Tambah Data Aktiva :<b style="text-transform: uppercase"> {{ $category }}</b></h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <form role="form" action="{{ route('aktiva.store') }}" method="POST">
               @csrf
               <div class="row">
                  <div class="col-sm-12">
                     <!-- select -->
                     <div class="form-group">
                        <label>Barang @error('barang_id') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <div class="ui search">
                           <div class="ui left icon input" id="search-div" style="margin-bottom:10px;">
                              <input class="prompt" type="text" placeholder="CARI BARANG" name="dummy" id="barang-source">
                              <i class="search icon"></i>
                           </div>
                        </div>
                        {{--<input type="text" class="form-control @error('barang_id') is-invalid @enderror search-barang" style="text-transform: uppercase" name="dummy">--}}
                        <input type="hidden" name="barang_id" id="barang_id">

                        {{--<select class="form-control @error('barang_id') is-invalid @enderror" style="text-transform: uppercase" name="barang_id"><i>SUB</i>
                           @foreach($barangs as $barang)
                              <option value="{{ $barang->id }}">{{ $barang->nama_barang }}, {{ $barang->kategori['nama'] }}, {{ $barang->properties->merk ?? 'TIDAK BERMERK'}}, {{ $barang->status_guna }}</option>
                           @endforeach
                        </select>--}}
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <!-- nilai perolehan -->
                     <div class="form-group">
                        <label>Nilai Perolehan (000.00) @error('nilai_perolehan') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <input name="nilai_perolehan" type="text" class="form-control @error('nilai_perolehan') is-invalid @enderror" placeholder="Enter ..." value="{{ old('nilai_perolehan') }}">
                      </div>
                  </div>
                  <div class="col-sm-6">
                     <!-- nilai buku -->
                     <div class="form-group">
                        <label>Tanggal Perolehan (TAHUN-BULAN-TGL) @error('tgl_perolehan') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <div class="input-group">
                        <input name="tgl_perolehan" type="text" class="form-control @error('tgl_perolehan') is-invalid @enderror" value="{{ old('tgl_perolehan') }}"/>
                           </div>
                        </div>
                      </div>
                  </div>
               <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Submit</button>
            </form>
         </div>
      </div>
      <!-- general form elements disabled -->
   </div>
   <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@section('plugin_js')
   <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
@endsection

@section('inline_js')
   <script>
      $('.ui.search')
              .search({
                 type          : 'category',
                 minCharacters : 3,
                 apiSettings   : {
                    onResponse: function(searchResponse) {
                       var
                               response = {
                                  results : {}
                               }
                       ;
                       // translate GitHub API response to work with search
                       $.each(searchResponse, function(index, item) {
                          var
                                  kategori   = item.kategori,
                                  maxResults = 20
                          ;
                          if(index >= maxResults) {
                             return false;
                          }
                          // create new language category
                          if(response.results[kategori] === undefined) {
                             response.results[kategori] = {
                                name    : kategori,
                                results : []
                             };
                          }
                          // add result to category
                          console.log(item);

                          let property = (
                                  item.property.hasOwnProperty('sertifikat')
                                  ? `No. Sertif: ${item.property.sertifikat.nomor} Masa berlaku: ${item.property.sertifikat.masa_berlaku} Tgl berakhir: ${item.property.sertifikat.tanggal_berakhir}`
                                  : item.property.hasOwnProperty('nopolis')
                                          ? `Merk: ${item.property.merk} No. Polisi: ${item.property.nopolis}`
                                          : `Merk: ${item.property.merk}`
                          );

                          response.results[kategori].results.push({
                             title       : item.nama_barang,
                             description : `Kondisi: ${item.kondisi} Sub Kategori: ${item.sub_kategori} Status: ${item.status_guna} ${property}`,
                             id          : item.id
                          });
                       });
                       return response;
                    },
                    url: '{{ route('barang.searchByCategory', ['category' => $category]) }}?nama_barang={query}'
                 },
                 onSelect    : ({id, title}, _) => {
                    $('#barang_id').val(id);
                 }
              })
      ;
   </script>
@endsection