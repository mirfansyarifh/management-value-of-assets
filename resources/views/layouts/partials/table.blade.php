
@section('table_inline_js')

    <!-- JS UNTUK TABLE -->
    <script>
  $(function () {
    $('#datatable1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": false,
    });
  });
</script>
    <!-- JS UNTUK TABLE -->
    <script>
  $(function () {
    $('#datatable2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": false,
    });
  });
</script>
@endsection
