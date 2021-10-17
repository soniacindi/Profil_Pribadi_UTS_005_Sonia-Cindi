<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	@livewireStyles

	<!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

  
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
	{{$slot}}
	@livewireScripts
	
		<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- validasi -->
<script src="{{asset('admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- alert -->
<script src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- bs-custom-file-input -->
<script src="{{asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>


<!-- InputMask -->
<script src="{{asset('admin/moment-with-locales.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
@stack('scripts')

	<script>
	  var Toast = Swal.mixin({
	    toast: true,
	    position: 'top-end',
	    showConfirmButton: false,
	    timer: 3000
	  });
	  function berhasilHapus(){
	    Toast.fire({
	      icon: 'success',
	      title: 'Data berhasil dihapus.'
	    })
	  };
	  function berhasilEdit(){
	    Toast.fire({
	      icon: 'success',
	      title: 'Data berhasil diedit.'
	    })
	  };
	  function berhasilSimpan(){
	    Toast.fire({
	      icon: 'success',
	      title: 'Data berhasil disimpan.'
	    })
	  };

		window.livewire.on('biodataAdded',()=>{
			$('#modalTambahBiodata').modal('hide');
			berhasilSimpan();
		});
		window.livewire.on('biodataUpdated',()=>{
			$('#modalEditBiodata').modal('hide');
			berhasilEdit();
		});
		window.livewire.on('biodataDeleted',()=>{
			$('#modalHapusBiodata').modal('hide');
			berhasilHapus();
		});

		window.livewire.on('pengalamenAdded',()=>{
			$('#modalTambahPengalamen').modal('hide');
			berhasilSimpan();
		});
		window.livewire.on('pengalamenUpdated',()=>{
			$('#modalEditPengalamen').modal('hide');
			berhasilEdit();
		});
		window.livewire.on('pengalamenDeleted',()=>{
			$('#modalHapusPengalamen').modal('hide');
			berhasilHapus();
		});

		window.livewire.on('pendidikanAdded',()=>{
			$('#modalTambahPendidikan').modal('hide');
			berhasilSimpan();
		});
		window.livewire.on('pendidikanUpdated',()=>{
			$('#modalEditPendidikan').modal('hide');
			berhasilEdit();
		});
		window.livewire.on('pendidikanDeleted',()=>{
			$('#modalHapusPendidikan').modal('hide');
			berhasilHapus();
		});

		
	</script>
</body>
</html>

