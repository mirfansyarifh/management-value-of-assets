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
            <h3 class="card-title">Pinjam Barang<b style="text-transform: uppercase"> </b></h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <form role="form" action="{{ route('peminjaman.update', ['peminjaman' => $peminjaman->id]) }}" method="post">
            @csrf
            <input name="_method" type="hidden" value="PUT">
               <input value="{{ $peminjaman->pemohon->id }}" name="pemohon_id" type="hidden" readonly>
               <input value="{{ $peminjaman->peninjau->id ?? auth()->user()->roles->first()->name === 'umum' ? auth()->user()->id : null }}" name="peninjau_id" type="hidden" readonly>
               <div class="row">
                  <div class="col-sm-6">
                     <!-- TANGGAL MULAI PINJAM -->
                     <div class="form-group">
                     <label>TANGGAL MULAI PINJAM @error('tgl_mulai') <i class="far fa-times-circle"> {{ $message }} @enderror</i></label><i> (1999-03-31)</i>
                        <input value="{{ $peminjaman->tgl_mulai }}" name="tgl_mulai" type="text" class="form-control @error('tgl_mulai') is-invalid @enderror" placeholder="Enter ..">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <!-- TANGGAL SELESAI PINJAM -->
                     <div class="form-group">
                        <label>TANGGAL AKHIR PINJAM @error('tgl_selesai') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label><i> (1999-03-31)</i>
                           <input value="{{ $peminjaman->tgl_selesai }}" name="tgl_selesai" type="text" class="form-control @error('tgl_selesai') is-invalid @enderror" placeholder="Enter ..">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <!-- KETERANGAN -->
                     <div class="form-group">
                     <label>KETERANGAN</label>
                        <input value="{{ $peminjaman->keterangan ?? '' }}" name="keterangan" type="text" class="form-control" placeholder="Enter ..">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                        <h3 style="text-align:center"> DAFTAR BARANG YANG DI PINJAM</h3><hr>
                     <div class="ui search">
                        <div class="ui left icon input" id="search-div" style="margin-bottom:10px;">
                           <input class="prompt" type="text" placeholder="CARI BARANG" name="dummy" id="barang-source">
                           <i class="search icon"></i>
                        </div>
                     </div>
                     <!-- div button add -->
                     <table class="table table-bordered" style="text-align:center; text-transform: uppercase" id="item_table">
                        <thead>
                           <tr>
                              <th>BARANG</th>
                              <th style="width:20px">ACTION</th>
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($peminjaman->barangs as $barang)
                           <tr>
                              <td><input type="text" name="dummies[]" class="form-control" value="{{ $barang->nama_barang }} {{ $barang->properties->merk ?? '' }} {{ $barang->properties->nomor->nopolis ?? '' }}" disabled>
                                 <input type="hidden" name="barang_ids[]" class="form-control" value="{{ $barang->id }}" readonly></td>
                              <td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>
                           </tr>
                        @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
               @role('umum')
               <div class="row">
                  <div class="col-sm-12">
                     <!-- STATUS -->
                     <div class="form-group">
                        <label>STATUS @error('status') <i class="far fa-times-circle"></i> {{ $message }} @enderror</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" style="width: 100%; text-transform: uppercase">
                           @foreach(['pending', 'approved', 'ditolak', 'selesai'] as $status)
                              <option value="{{ $status }}" {{ $status === $peminjaman->status ? 'selected': '' }} >{{strtoupper($status)}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
               @else
               <input name="status" type="hidden" value="{{ $peminjaman->status }}" readonly>
               @endrole
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
   <b>note:</b><br>
   <i>*segala bentuk kerusakan <b style="color:red"> ditanggung peminjam</b></i>
</div>
<!-- /.row -->  
@endsection

@section('plugin_js')
   <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
@endsection

@section('inline_js')
<script>  

$(document).ready(function(){
      
      var count = 0;

      function addBarang(id, nama) {
         count++;
         var html = '';
         html += '<tr>';
         //html += '<td><select name="item_category[]" class="form-control item_barang"><option value="halo">PILIH BARANG</option></select></td>';
         html += `<td>
<input type="text" name="dummies[]" class="form-control" value="${nama}" disabled>
<input type="hidden" name="barang_ids[]" class="form-control" value="${id}" readonly>
</td>`;
         html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
         $('tbody').append(html);
      }

      $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
      });

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

                       let property = (
                               item.property.hasOwnProperty('nopolis')
                                       ? `No. Polisi: ${item.property.nopolis}`
                                       : `Merk: ${item.property.merk}`
                       );

                       // add result to category
                       response.results[kategori].results.push({
                          title       : item.nama_barang,
                          description : `Kondisi: ${item.kondisi} <br> Sub Kategori: ${item.sub_kategori} <br> ${property}`,
                          id          : item.id
                       });
                    });
                    return response;
                 },
                 url: '{{ route('barang.search') }}?nama_barang={query}'
              },
              onSelect    : ({id, title}, _) => {
                 //console.log(id);
                 let source = $('#barang-source');
                 source.val('');
                 source.text('');
                 $('.ui.search').search('hide results');
                 addBarang(id, title);
                 return false;
              }
           })
   ;
   });
</script>
@endsection

