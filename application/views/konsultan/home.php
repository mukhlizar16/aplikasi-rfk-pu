<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<h4 class="header-title mb-4 float-sm-start">Informasi</h4>
						<div class="clearfix"></div>
						<p>Disini semua informasi dari admin muncul.</p>
					</div>
				</div>
			</div>
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<h4 class="header-title mb-4 float-sm-start">List Pekerjaan</h4>
						<div class="clearfix"></div>
						Anda memiliki tugas dan tanggung jawab pekerjaan sebagai berikut:
						<?php foreach ($pekerjaan as $p) : ?>
							<div class="pekerjaan">
								<div class="tanggal" style="color:goldenrod; font-weight:bold">
									<i class="dripicons-bell"></i> <?= date('d-m-Y', strtotime($p['tanggal'])) ?>
								</div>
								<div class="judul">
									<ul>
										<li><?= $p['pekerjaan'] ?></li>
									</ul>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>