
<!-- jQuery -->
<script src="{{asset("/admin/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("/admin/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("/admin/dist/js/adminlte.min.js")}}"></script>
{{-- sweetalert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- datatable js --}}
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>

<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>