<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/auth/css/my-style.css" />
	<link rel="shortcut icon" href="<?= base_url() ?>assets/admin/images/favicon.ico">
	<title>Dinas PUPR Aceh Barat - Login</title>
</head>
<body>

<div class="split-screen">
	<div class="left">
		<section class="copy">
			<h1>Selamat Datang</h1>
			<p>Ini merupakan halaman login untuk admin</p>
		</section>
	</div>
	<div class="right">
		<form action="<?= site_url('login/process') ?>" method="post">
			<section class="copy">
				<h2>Sign In</h2>
				<div class="login-container">
					<p class="small">Silahkan masukkan data login</p>
				</div>
			</section>

			<?= $this->session->flashdata('status') ?>

			<div class="input-container email">
				<label for="email">Email</label>
				<input type="text" class="<?= form_error('email') == '' ? '':'is-invalid' ?>" name="email" id="email" placeholder="contoh: john@mail.com" autofocus>
				<div class="invalid-feedback">
					<?= strip_tags(form_error('email')) ?>
				</div>
			</div>
			<div class="input-container password">
				<label for="password">Password</label>
				<input type="password" class="<?= form_error('password') == '' ? '':'is-invalid' ?>" name="password" id="password" placeholder="password minimal 6 karakter">
				<i class="fas fa-eye-slash"></i>
				<div class="invalid-feedback">
					<?= strip_tags(form_error('password')) ?>
				</div>
			</div>
			<button class="signin-btn">Login</button>
		</form>
	</div>
</div>


<script>
	var url = '<?= base_url() ?>';
</script>
</body>
</html>
