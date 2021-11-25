<div class="vertical-menu">
	<div data-simplebar class="h-100">
		<div class="user-sidebar text-center">
			<div class="dropdown">
				<div class="user-img">
					<img src="<?= base_url() ?>assets/admin/images/users/avatar.png" alt="" class="rounded-circle">
					<span class="avatar-online bg-success"></span>
				</div>
				<div class="user-info">
					<h5 class="mt-3 font-size-16 text-white"><?= $_SESSION['nama'] ?></h5>
					<span class="font-size-13 text-white-50"><?= role() == 1 ? 'Administrator' : 'Konsultan' ?></span>
				</div>
			</div>
		</div>


		<!--- Sidemenu -->
		<div id="sidebar-menu">
			<!-- Left Menu Start -->
			<ul class="metismenu list-unstyled" id="side-menu">
				<!--<li class="menu-title">Home</li>-->
				<li>
					<a href="<?= site_url('home') ?>" class="waves-effect">
						<i class="dripicons-home"></i>
						<!--<span class="badge rounded-pill bg-info float-end">3</span>-->
						<span>Dashboard</span>
					</a>
				</li>
				<?php if (role() == 1) : ?>
					<li class="menu-title">Administrator</li>
					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="dripicons-suitcase"></i>
							<span>Master Data</span>
						</a>
						<ul class="sub-menu" aria-expanded="false">
							<li><a href="<?= site_url('admin/program') ?>">Program</a></li>
							<li><a href="<?= site_url('admin/kegiatan') ?>">Kegiatan</a></li>
							<li><a href="<?= site_url('admin/subkegiatan') ?>">Sub Kegiatan</a></li>
							<li><a href="<?= site_url('admin/satuan') ?>">Satuan</a></li>
							<li><a href="<?= site_url('admin/user_list') ?>">User</a></li>
							<li><a href="<?= site_url('admin/sektor') ?>">Sektor</a></li>
							<li><a href="<?= site_url('admin/divisi') ?>">Divisi</a></li>
							<li><a href="<?= site_url('admin/seksi') ?>">Seksi</a></li>
						</ul>
					</li>
					<li class="menu-title">Data Utama</li>
					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="dripicons-suitcase"></i>
							<span>Data Pagu</span>
						</a>
						<ul class="sub-menu" aria-expanded="false">
							<li><a href="<?= site_url('admin/pagu') ?>">Pagu</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="dripicons-suitcase"></i>
							<span>Data Realisasi</span>
						</a>
						<ul class="sub-menu" aria-expanded="false">
							<li><a href="<?= site_url('admin/kontrak') ?>">Data Kontrak</a></li>
							<li>
								<a href="javascrip:void" class="has-arrow waves-effect">
									Realisasi Kontrak
								</a>
								<ul class="sub-menu" aria-expanded="false">
									<li><a href="<?= site_url('admin/realisasi') ?>">Keuangan</a></li>
									<li><a href="<?= site_url('admin/fisik') ?>">Fisik</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?= site_url('admin/penugasan') ?>" class="waves-effect">
							<i class="dripicons-power"></i>
							<span>Penugasan</span>
						</a>
					</li>
					<li>
						<a href="#" class="waves-effect">
							<i class="dripicons-export"></i>
							<span>Tabel RFK</span>
						</a>
					</li>
					<li class="menu-title">Pengaturan</li>
					<li>
						<a href="javascript: void(0);" class="has-arrow waves-effect">
							<i class="dripicons-gear"></i>
							<span>Setting</span>
						</a>
						<ul class="sub-menu" aria-expanded="false">
							<li><a href="<?= site_url('admin/role') ?>">Role</a></li>
						</ul>
					</li>
				<?php else : ?>
					<li>
						<a href="<?= site_url('konsultan/rab') ?>" class="waves-effect">
							<i class="dripicons-information"></i>
							<span>RAB</span>
						</a>
					</li>
					<li>
						<a href="<?= site_url('konsultan/progres') ?>" class="waves-effect">
							<i class="dripicons-loading"></i>
							<span>Progres Report</span>
						</a>
					</li>
					<li>
						<a href="<?= site_url('konsultan/adendum') ?>" class="waves-effect">
							<i class="dripicons-lock-open"></i>
							<span>Adendum</span>
						</a>
					</li>
				<?php endif; ?>
				<li>
					<a href="<?= site_url('login/logout') ?>" class="waves-effect">
						<i class="dripicons-power"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</div>
		<!-- Sidebar -->
	</div>
</div>