<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<button class="btn btn-primary" id="btn-add-fisik">Tambah Data
							</button>
						</div>
						<fieldset>
							<form action="<?= site_url('admin/detil_fisik') ?>" method="post" id="form-detil-fisik">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row mb-3">
											<label for="pekerjaan" class="form-label col-md-4">Paket Pekerjaan :</label>
											<div class="col-md-8">
												<select name="pekerjaan" id="pekerjaan" class="form-control select2">
													<option value="">--Pilih--</option>
													<?php foreach ($pekerjaan as $p) : ?>
														<option value="<?= $p->id ?>"><?= $p->uraian_pekerjaan ?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label for="bulan" class="form-label col-md-4">Bulan ke :</label>
											<div class="col-md-8">
												<select name="bulan" id="bulan" class="form-control select2">
													<option value="">--Pilih--</option>
													<?php for ($i = 1; $i <= 12; $i++) : ?>
														<option value="<?= $i ?>"><?= $i ?></option>
													<?php endfor; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<button class="btn btn-primary waves-effect waves-light" type="submit">Tampilkan</button>
									</div>
								</div>
							</form>
						</fieldset>
						<div class="mt-5 table-responsive">
							<table class="table table-bordered table-hover" id="table-fisik">
								<thead>
									<tr>
										<th>No</th>
										<th>Paket Pekerjaan</th>
										<th class="text-center">% Progress</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($fisik as $f) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $f->pekerjaan ?></td>
											<td class="text-center"><?= str_replace('.', ',', $f->persen) ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="addfisikModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalfisikTitle">Tambah Realisasi Fisik</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-fisik">
				<div class="modal-body">
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Uraian Pekerjaan</label>
						<div class="col-md-9">
							<select name="pekerjaan" id="pekerjaan" class="form-control">
								<option value="">--Pilih Uraian--</option>
								<?php foreach ($kontrak as $k) : ?>
									<option value="<?= $k['id'] ?>"><?= $k['pekerjaan'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="bulan" class="col-form-label col-md-3">Bulan</label>
						<div class="col-md-9">
							<select name="bulan" id="bulan" class="form-control">
								<option value="">--Pilih Bulan--</option>
								<option value="1">Januari</option>
								<option value="2">Februari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
					</div>
					<div class="form-group mt-3 row">
						<label for="persen" class="col-form-label col-md-3">Persentase</label>
						<div class="col-md-9">
							<input type="text" name="persen" class="form-control" id="persen">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal
					</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" id="btn-submit-fisik">
						Simpan
					</button>
				</div>
			</form>
		</div>
	</div>
</div>