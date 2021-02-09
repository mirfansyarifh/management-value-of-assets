
@section('table_inline_js')

     <!-- JS UNTUK TABLE -->
     <script>
  $(function () {
    $('#datatable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
    });
  });
</script>
    <!-- JS UNTUK TABLE -->
@endsection
