
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="{{ asset('customer/tngc.png') }}">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('customer/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('customer/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('customer/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('customer/css/jquery.fancybox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('customer/fonts/icomoon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('customer/fonts/flaticon/font/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('customer/css/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('customer/css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('customer/css/style.css') }}">

  <title>Pendakian Ciremai - {{ $title }}</title>
</head>

<body>

    @include('user.template.navbar')

    @yield('container')

    @include('user.template.footer')

    <!-- Modal Register -->
		<div class="modal fade" id="ModalRegister" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="formModalLabel">Form Register</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="/register" method="post" enctype="multipart/form-data">
							@csrf
							<div class="mb-2">
								<label for="name" class="form-label">Name :</label>
								<input type="text" class="form-control" id="name" name="name" required>
								<small>* wajib, minimal 5 huruf</small>
							</div>
							<div class="mb-2">
								<label for="username" class="form-label">Username :</label>
								<input type="text" class="form-control" id="username" name="username"   required>
								<small>* wajib, minimal 5 huruf</small>
							</div>
							<div class="mb-2">
								<label for="email" class="form-label">Email :</label>
								<input type="text" class="form-control" id="email" name="email"   required>
								<small>* wajib, masukan email yang valid</small>
							</div>
							<div class="mb-2">
								<label for="email" class="form-label">Alamat :</label>
								<input type="text" class="form-control" id="alamat" name="alamat"   required>
							</div>
								<input type="hidden"  id="role" name="role" value="User">
							<div class="mb-2">
								<label for="jenis_kelamin" class="form-label mr-3">Jenis Kelamin :</label>
								<select class="form-select" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin" required>
									<option value="">Pilih JK</option>
									<option value="L">Laki-Laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
							<div class="mb-2">
								<label for="jenis_identitas" class="form-label mr-3">Jenis Identitas :</label>
								<select class="form-select" aria-label="Default select example" id="jenis_identitas" name="jenis_identitas" required>
									<option value="">Pilih Identitas</option>
									<option value="KTP">KTP</option>
									<option value="SIM">SIM</option>
									<option value="KTM">KTM</option>
								</select>
							</div>
							<div class="mb-2">
								<label for="no_identitas" class="form-label">No Identitas :</label>
								<input type="text" class="form-control" id="no_identitas" name="no_identitas"   required>
								<small>* wajib, minimal 10 digit</small>
							</div>
							<div class="mb-2">
								<label for="no_hp" class="form-label">No Hp :</label>
								<input type="text" class="form-control" id="no_hp" name="no_hp" required>
								<small>* wajib, minimal 10 digit</small>
							</div>
							<div class="mb-3">
								<label for="foto_identitas" class="form-label">Foto Identitas :</label>
								<input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="foto_identitas" name="foto_identitas"  required>
								<small>* foto KTP / SIM / KTM</small>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password :</label>
								<input type="password" class="form-control" id="password" name="password"  required>
								<small>* wajib, minimal 5 huruf</small>
							</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Register</button>
					</form>
					</div>
				
				</div>
			</div>
		</div>

		<!-- Modal Login User -->
	<div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModalLabel">Login User</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/login" method="post">
						@csrf
						<div class="mb-2">
							<label for="email" class="form-label">Email :</label>
							<input type="text" class="form-control" id="email" name="email" required>
							<small class="text-danger">* Masukan email yang valid</small>
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Password :</label>
							<input type="password" class="form-control" id="password" name="password"  required>
							<small class="text-danger">* Password minimal 5 digit</small>
						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Login</button>
				</form>
				</div>
			
			</div>
		</div>
	</div>

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  @include('sweetalert::alert')
  <script src="{{ asset('customer/js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('customer/js/popper.min.js') }}"></script>
  <script src="{{ asset('customer/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('customer/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('customer/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('customer/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('customer/js/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('customer/js/aos.js') }}"></script>
  <script src="{{ asset('customer/js/moment.min.js') }}"></script>
  <script src="{{ asset('customer/js/daterangepicker.js') }}"></script>

  <script src="{{ asset('customer/js/typed.js') }}"></script>

  <script>
	$(function() {
		var slides = $('.slides'),
		images = slides.find('img');

		images.each(function(i) {
			$(this).attr('data-id', i + 1);
		})

		var typed = new Typed('.typed-words', {
			strings: ["Palutungan."," Linggarjati."," Apuy."," Linggasana."],
			typeSpeed: 80,
			backSpeed: 80,
			backDelay: 4000,
			startDelay: 1000,
			loop: true,
			showCursor: true,
			preStringTyped: (arrayPos, self) => {
				arrayPos++;
				console.log(arrayPos);
				$('.slides img').removeClass('active');
				$('.slides img[data-id="'+arrayPos+'"]').addClass('active');
			}

		});
	})
</script>
  
  <script src="{{ asset('customer/js/custom.js') }}"></script>

</body>

</html>
