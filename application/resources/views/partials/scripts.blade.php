<!-- REQUIRED JS SCRIPTS -->
{{--custom js--}}
<script src="{{ asset('/js/custom.js') }}" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
{{--editabel bootstrap--}}
<script src="{{ asset('/js/bootstrap-editable.1.5.1.js') }}" type="text/javascript"></script>
<!-- Jesny Bootstrap -->
{{--sweet alert--}}
<script src="{{ asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/jasny-bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<!-- dataTables JS -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
      $(document).ready(function() {
            $("[id^=dataTables]").dataTable();
      });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<!-- Bootstrap toastr -->
<script src="{{ asset('/js/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>

{{--date picker--}}
{{--<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>--}}

<!-- CK Editor -->
{{--<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>--}}
        <!-- include summernote css/js-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>