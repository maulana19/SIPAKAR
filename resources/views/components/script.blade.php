<!-- jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script src="{{ asset('Assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('Assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('Assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('Assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('Assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('Assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('Assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('Assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('Assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('Assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('Assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('Assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('Assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('Assets/dist/js/adminlte.js') }}"></script>

@if (Request::is('users/add') || Request::is('users/edit/*') || Request::is('items/add'))
    <script src="{{ asset('Assets/dist/js/custom.min.js') }}"></script>
@endif

<script>
    // Ensure the DOM is fully loaded before adding the listener
    $(document).ready(function() {
        $('#ModalDeleteData').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var uid = button.data('whatever')
            const form = document.getElementById('formDelete')
            var url = ''

            if (@json(Request::is('users'))) {
                url = '/users/delete/';
            } else if (@json(Request::is('items'))) {
                url = '/items/delete/';
            }

            form.setAttribute('action', url + uid)

            // Perform additional actions here
        });
    });
</script>
