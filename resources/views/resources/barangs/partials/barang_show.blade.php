@section('barang_show')

<div class="modal fade" id="modal-view">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-primary" style="text-align:center">
            <h4 class="modal-title">Detail Item</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="text-center">
                <i class="fa fa-3x fa-refresh fa-spin"></i>
                <div>Please wait...</div>
            </div>
        </div>
    </div>
</div>

<script>
$('.modal-view').click(function(event) {
        event.preventDefault();
        var url = $(this).attr('href');
        $("#modal-view").modal('show');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',

        })
        .done(function(response) {
            $("#modal-view").find('.modal-body').html(response);
        });

    });
</script>
@endsection
