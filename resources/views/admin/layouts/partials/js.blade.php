<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('/') }}admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('/') }}admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}admin/assets/vendor/jqueryui/js/jquery-ui.min.js"></script>
<script src="{{ asset('/') }}admin/assets/vendor/chart.js/chart.umd.js"></script>
<script src="{{ asset('/') }}admin/assets/vendor/echarts/echarts.min.js"></script>
<script src="{{ asset('/') }}admin/assets/vendor/quill/quill.min.js"></script>
<script src="{{ asset('/') }}admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="{{ asset('/') }}admin/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="{{ asset('/') }}admin/assets/vendor/php-email-form/validate.js"></script>

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

<script src="{{ asset('/') }}admin/assets/js/main.js"></script>

@stack('scripts')

<script>
	$(document).ready(function() {
		toastr.options.timeOut = 10000;
		@if (Session::has('error'))
			toastr.error('{{ Session::get('error') }}');
		@elseif(Session::has('success'))
			toastr.success('{{ Session::get('success') }}');
		@endif
	});
</script>
</body>

</html>
