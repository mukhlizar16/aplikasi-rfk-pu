<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<blockquote class="blockquote font-size-14 mb-0">
								<p>Data lengkap tabel RFK sesuai dengan jumlah SP2D yang telah terdata.</p>
								<footer class="blockquote-footer font-size-12 mt-0">
									Berdasarkan inputan dari konsultan/pengawas
								</footer>
							</blockquote>
						</div>
						<hr>
						<div class="mb-5">
							<form action="<?= site_url('admin/detil_rfk') ?>" method="post">
								<div class="form-group row mb-2">
									<label for="pekerjaan-rfk" class="col-form-label col-md-2">Pekerjaan</label>
									<div class="col-md-4">
										<select name="pekerjaan" id="pekerjaan-rfk" class="form-control">
											<option value="">--Pilih--</option>
											<?php foreach ($item as $i) : ?>
												<option value="<?= $i->id ?>"><?= $i->uraian_pekerjaan ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="form-group row mb-2">
									<label for="bulan-rfk" class="col-form-label col-md-2">Bulan</label>
									<div class="col-md-4">
										<select name="bulan" id="bulan-rfk" class="form-control">
											<option value="">--Pilih--</option>
											<?php for ($i = 1; $i <= 12; $i++) : ?>
												<option value="<?= $i ?>"><?= $i ?></option>
											<?php endfor ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-2"></div>
									<div class="col-md-4">
										<button class="btn btn-sm btn-primary waves-effect waves-light" type="submit">Tampilkan</button>
									</div>
								</div>
							</form>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered" id="table-rfk">
								<thead>
									<tr>
										<th rowspan="2" width="5%" style="vertical-align: middle;">No</th>
										<th rowspan="2" class="text-center" style="vertical-align: middle;">Pekerjaan</th>
										<th rowspan="2" class="text-center" style="vertical-align: middle;">Lokasi</th>
										<th rowspan="2" class="text-center" style="vertical-align: middle;">Jumlah Alokasi</th>
										<th rowspan="2" class="text-center" style="vertical-align: middle;">Nilai Kontrak</th>
										<th rowspan="2" class="text-center" style="vertical-align: middle;">Sisa Tender</th>
										<th class="text-center" colspan="3">Realisasi</th>
										<th class="text-center" colspan="3">Waktu Pelaksanaan</th>
										<th class="text-center" rowspan="2" style="vertical-align: middle;">Nama Perusahaan</th>
										<th class="text-center" rowspan="2" style="vertical-align: middle;">Nomor Kontrak</th>
									</tr>
									<tr>
										<th class="text-center">% Fisik</th>
										<th class="text-center">Keuangan</th>
										<th class="text-center">% Keuangan</th>
										<th class="text-center">Hari</th>
										<th class="text-center">Mulai</th>
										<th class="text-center">Akhir</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>