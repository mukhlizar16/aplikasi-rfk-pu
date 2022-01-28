<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('template/partial/head') ?>
</head>


<body>
	<!-- Loader -->
	<div id="preloader">
		<div id="status">
			<div class="spinner-chase">
				<div class="chase-dot"></div>
				<div class="chase-dot"></div>
				<div class="chase-dot"></div>
				<div class="chase-dot"></div>
				<div class="chase-dot"></div>
				<div class="chase-dot"></div>
			</div>
		</div>
	</div>

	<!-- Begin page -->
	<div id="layout-wrapper">

		<header id="page-topbar">
			<div class="navbar-header">
				<div class="d-flex">

					<!-- LOGO -->
					<div class="navbar-brand-box">
						<a href="javascript:void" class="logo logo-dark">
							<span class="logo-sm">
								<img src="<?= base_url() ?>assets/admin/images/logo-sm.png" alt="" height="22">
							</span>
							<span class="logo-lg">
								<img src="<?= base_url() ?>assets/admin/images/logo-light.png" alt="" height="45">
							</span>
						</a>

						<a href="javascript:void" class="logo logo-light">
							<span class="logo-sm">
								<img src="<?= base_url() ?>assets/admin/images/logo-sm.png" alt="" height="22">
							</span>
							<span class="logo-lg">
								<img src="<?= base_url() ?>assets/admin/images/logo-light.png" alt="" height="45">
							</span>
						</a>
					</div>

					<button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
						<i class="mdi mdi-menu"></i>
					</button>
				</div>
				<div class="d-flex">
					<div class="dropdown d-none d-lg-inline-block ms-1">
						<button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
							<i class="mdi mdi-fullscreen"></i>
						</button>
					</div>

					<div class="dropdown d-inline-block">
						<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/admin/images/users/<?= role() == 1 ? 'woman.png' : 'avatar.png' ?>" alt="Header Avatar">
							<span class="d-none d-xl-inline-block ms-1"><?= $_SESSION['nama'] ?></span>
							<i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-end">
							<!-- item-->
							<a class="dropdown-item" href="#"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item text-danger" href="<?= site_url('login/logout') ?>"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- ========== Left Sidebar Start ========== -->
		<?php $this->load->view('template/partial/sidebar') ?>
		<!-- Left Sidebar End -->

		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="main-content">
			<div class="page-content">

				<!-- start page title -->
				<div class="page-title-box">
					<div class="container-fluid">
						<div class="row align-items-center">
							<div class="col-sm-6">
								<div class="page-title">
									<h4>
										<?= role() == 1 ? 'Administrator' : 'Konsultan' ?>
									</h4>
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
										<li class="breadcrumb-item active"><?= $breadcrumb ?></li>
									</ol>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end page title -->

				<!-- Konten -->
				<?= $konten ?>
				<!-- End Konten-->
			</div>
			<!-- End Page-content -->

			<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<script>
								document.write(new Date().getFullYear())
							</script> © Dinas PUPR Kabupaten Aceh Barat.
						</div>
						<div class="col-sm-6">
							<div class="text-sm-end d-none d-sm-block">
								Rendered in <?= $this->benchmark->elapsed_time() ?>s
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!-- end main content-->
	</div>
	<!-- END layout-wrapper -->

	<!-- Right bar overlay-->
	<div class="rightbar-overlay"></div>

	<!-- JAVASCRIPT -->
	<?php $this->load->view('template/partial/js') ?>

</body>

</html>
