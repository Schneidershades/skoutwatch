<!DOCTYPE html>
<html lang="zxx">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Themezhub" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <title> @yield('title') - Unilag Vendor Portal</title>

        <!-- Custom CSS -->
        <link href="{{ URL::to('assets/css/styles.css')}}" rel="stylesheet">
        <link href="{{ URL::to('assets/css/plugins/lobibox.min.css')}}" rel="stylesheet">
        <link href="{{ URL::to('assets/css/plugins/datatables.min.css')}}" rel="stylesheet">

    </head>

    <body>
		<!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
       <div class="preloader"></div>

        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">

            @yield('content')

            <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="{{ URL::to('assets/js/jquery.min.js')}}"></script>
		<script src="{{ URL::to('assets/js/popper.min.js')}}"></script>
		<script src="{{ URL::to('assets/js/bootstrap.min.js')}}"></script>
		<script src="{{ URL::to('assets/js/slick.js')}}"></script>
		<script src="{{ URL::to('assets/js/slider-bg.js')}}"></script>
		<script src="{{ URL::to('assets/js/smoothproducts.js')}}"></script>
		<script src="{{ URL::to('assets/js/snackbar.min.js')}}"></script>
		<script src="{{ URL::to('assets/js/jQuery.style.switcher.js')}}"></script>
		<script src="{{ URL::to('assets/js/custom.js')}}"></script>
		<script src="{{ URL::to('assets/js/custom.js')}}"></script>
		<script src="{{ URL::to('assets/js/custom.js')}}"></script>
		<script src="{{ URL::to('assets/js/lobibox.min.js')}}"></script>
		<script src="{{ URL::to('assets/js/notifications.min.js')}}"></script>
		{{-- <script src="{{ URL::to('assets/js/datatables.min.js"></script> --}}
        <script src="https://js.paystack.co/v1/inline.js"></script>

        <link href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>


		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->
		<script type="text/javascript">
            // let table = new DataTable('.table');

            var table = $('.table').DataTable( {
                dom: 'Bfrtip',
                buttons: [ 'copy', 'excel', 'pdf', 'print']
            } );

            table.buttons().container().appendTo( '.table .col-md-6:eq(0)' );


			$(document).ready(function() {
				@if(Session::has('success'))
					function info_noti(){
						Lobibox.notify('success', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							size: 'mini',
							position: 'top right',
							icon: 'fa fa-info-circle',
							msg: '{{ Session::get("success") }}'
						});
					}
				@endif

				@if(Session::has('info'))
					function info_noti(){
						Lobibox.notify('info', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							size: 'mini',
							position: 'top right',
							icon: 'fa fa-info-circle',
							msg: '{{ Session::get("info") }}'
						});
					}
				@endif

				@if(Session::has('danger'))
					function info_noti(){
						Lobibox.notify('danger', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							size: 'mini',
							position: 'top right',
							icon: 'fa fa-info-circle',
							msg: '{{ Session::get("danger") }}'
						});
					}
				@endif
        	});
		</script>

        @yield('scripts')

	</body>

</html>
