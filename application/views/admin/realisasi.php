<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<button class="btn btn-primary" id="btn-add-realisasi">Tambah Data
							</button>
						</div>

						<div class="mt-2 table-responsive">
							<table class="table table-striped table-hover" id="table-realisasi">
								<thead>
									<tr>
										<th>No</th>
										<th>Uraian Pekerjaan</th>
										<th>Nilai Kontrak</th>
										<th>Nomor Kontrak</th>
										<th>Tanggal Kontrak</th>
										<th>Jangka Waktu</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Selesai</th>
										<th>Penyedia</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="addRealisasiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalRealisasiTitle">Tambah Realisasi Keuangan (Input SP2D)</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-realisasi">
				<div class="modal-body">
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Uraian Pekerjaan</label>
						<div class="col-md-9">
							<select name="uraian" id="uraian-realisasi" class="form-control" style="width: 100%">
								<option value="">--Pilih--</option>
								<?php foreach ($kontrak as $k) : ?>
									<option value="<?= $k['id'] ?>"><?= $k['pekerjaan'] ?></option>
								<?php endforeach; ?>
							</select>
							<input type="hidden" class="form-control" id="nilai-kontrak">
							<input type="hidden" class="form-control" id="nilai-pagu">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Jumlah SP2D</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input type="text" class="form-control" id="progress" name="nilai" data-mask="000.000.000.000.000" data-mask-reverse="true">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Nomor</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">No</span>
								<input type="text" class="form-control" id="nomor" name="nomor">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Tanggal</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">Tanggal</span>
								<input type="date" class="form-control" id="tanggal" name="tanggal">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Dokumen</label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="dokumen">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Persen Kontrak</label>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" class="form-control" id="persentase" name="persen_kontrak">
								<span class="input-group-text">%</span>
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Persen Pagu</label>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" class="form-control" id="persentase2" name="persen_pagu">
								<span class="input-group-text">%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal
					</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" id="btn-submit-realisasi">
						Simpan
					</button>
				</div>
			</form>
		</div>
	</div>
</div>