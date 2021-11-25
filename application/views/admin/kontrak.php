<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<button class="btn btn-primary" id="btn-add-kontrak">Tambah Data
							</button>
						</div>

						<div class="mt-2 table-responsive">
							<table class="table table-striped table-hover" id="table-kontrak">
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
								<tbody>
									<?php $no = 1;
									foreach ($kontrak as $k) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td style="width: 35%"><?= $k['pekerjaan'] ?></td>
											<td nowrap><?= rupiah($k['nilai']) ?></td>
											<td><?= $k['nomor'] ?></td>
											<td nowrap><?= date('d-m-Y', strtotime($k['tgl'])) ?></td>
											<td><?= $k['jangka'] ?></td>
											<td nowrap><?= date('d-m-Y', strtotime($k['mulai'])) ?></td>
											<td nowrap><?= date('d-m-Y', strtotime($k['selesai'])) ?></td>
											<td nowrap><?= $k['penyedia'] ?></td>
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
<div class="modal fade" id="addKontrakModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalKontrakTitle">Tambah Realisasi</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-kontrak">
				<div class="modal-body">
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Uraian Pekerjaan</label>
						<div class="col-md-9">
							<select name="uraian" id="uraian-kontrak" class="form-control" style="width: 100%" required>
								<option value="">--Pilih--</option>
								<?php foreach ($pagu as $p) : ?>
									<option value="<?= $p['id'] ?>"><?= $p['pekerjaan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Program</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="program-kontrak" readonly>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Kegiatan</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="kegiatan-kontrak" readonly>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Sub Kegiatan</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="subkegiatan-kontrak" readonly>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="pagu" class="col-form-label col-md-3">Pagu Anggaran</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input type="text" class="form-control" id="pagu-kontrak">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Nilai Kontrak</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input type="text" class="form-control" id="nilai-kontrak" name="nilai" required>
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Sisa Kontrak</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input type="text" class="form-control" id="sisa-kontrak" name="sisa">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Nomor Kontrak</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="nomor" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Tanggal Kontrak</label>
						<div class="col-md-9">
							<input type="date" class="form-control" name="tanggal" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Jangka Waktu Kontrak</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="number" min="0" class="form-control" name="waktu" required>
								<span class="input-group-text">Hari</span>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Tanggal Mulai</label>
						<div class="col-md-9">
							<input type="date" class="form-control" name="mulai" required>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Tanggal Selesai</label>
						<div class="col-md-9">
							<input type="date" class="form-control" name="selesai" required>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Nama Penyedia</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="penyedia" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" id="btn-submit-realisasi">
						Simpan
					</button>
				</div>
			</form>
		</div>
	</div>
</div>