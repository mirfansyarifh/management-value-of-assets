@section('delete_inline_js')
    <!-- modal delete -->
    <div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
        <div class="modal-header">
            <h4 class="modal-title">Hapus Item</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Apakah anda yakin akan menghapus item ini? (tidak bisa dibatalkan)</p>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="delete-btn">Delete</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- JS UNTUK MENGHAPUS -->
    <script>
    let url = '';
    $('.modal-del').on('click', (e)=>{
        e.preventDefault();
        url = typeof e.target.href === 'undefined' || typeof e.target.href === undefined ? e.target.parentElement.href : e.target.href;

        $('#modal-delete').show();
    });
    $('#delete-btn').on('click', (e) => {
        e.preventDefault();
        let token = '{{ csrf_token() }}';
        $.ajax({
            url: url,
            type: "POST",
            data: {_method:'DELETE', _token:token},
            success: function(result) {console.log(result); location.reload();},
            error: (jqXHR) => {console.log(jqXHR.responseText)}
        });
    })
    </script>
    <!-- JS UNTUK MENGHAPUS -->

@endsection