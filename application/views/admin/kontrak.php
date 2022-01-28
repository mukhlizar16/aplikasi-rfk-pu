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
							<table class="table table-bordered table-hover" id="table-kontrak">
								<thead>
									<tr>
										<th>No</th>
										<th class="text-center">Uraian Pekerjaan</th>
										<th class="text-center">Nilai Kontrak</th>
										<th class="text-center">Nomor Kontrak</th>
										<th class="text-center">Tanggal Kontrak</th>
										<th class="text-center">Jangka Waktu</th>
										<th class="text-center">Tanggal Mulai</th>
										<th class="text-center">Tanggal Selesai</th>
										<th class="text-center">Penyedia</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($kontrak as $k) : ?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td>
												<div style="width: 250px">
													<?= $k['pekerjaan'] ?>
												</div>
											</td>
											<td class="text-end" nowrap><?= rupiah($k['nilai']) ?></td>
											<td class="text-center"><?= $k['nomor'] ?></td>
											<td nowrap><?= date('d-m-Y', strtotime($k['tgl'])) ?></td>
											<td class="text-center"><?= $k['jangka'] ?></td>
											<td nowrap><?= date('d-m-Y', strtotime($k['mulai'])) ?></td>
											<td nowrap><?= date('d-m-Y', strtotime($k['selesai'])) ?></td>
											<td><?= $k['penyedia'] ?></td>
											<td class="text-center" nowrap>
												<button class="btn btn-sm btn-warning waves-effect waves-light" data-id="<?= $k['id'] ?>" data-pagu="<?= $k['id_pagu'] ?>" id="btn-edit">Edit</button>
												<button class="btn btn-sm btn-danger waves-effect waves-light" data-id="<?= $k['id'] ?>" id="btn-hapus">Hapus</button>
											</td>
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

<!-- Modal edit -->
<div class="modal fade" id="editKontrakModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalKontrakTitle">Edit Data Kontrak</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-edit-kontrak">
				<div class="modal-body">
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Uraian Pekerjaan</label>
						<div class="col-md-9">
							<select name="uraian" id="pilihan-edit-kontrak" class="form-control" style="width: 100%" required>
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
							<input type="text" class="form-control" id="program-edit-kontrak" readonly>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Kegiatan</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="kegiatan-edit-kontrak" readonly>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Sub Kegiatan</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="subkegiatan-edit-kontrak" readonly>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="pagu" class="col-form-label col-md-3">Pagu Anggaran</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input type="text" class="form-control" id="pagu-edit-kontrak">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Nilai Kontrak</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input type="text" class="form-control" id="nilai-edit-kontrak" name="nilai" required>
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Sisa Kontrak</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input type="text" class="form-control" id="sisa-edit-kontrak" name="sisa">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Nomor Kontrak</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="nomor" id="nomor-edit-kontrak" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Tanggal Kontrak</label>
						<div class="col-md-9">
							<input type="date" class="form-control" name="tanggal" id="tanggal-edit-kontrak" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Jangka Waktu Kontrak</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="number" min="0" class="form-control" name="waktu" id="waktu-edit-kontrak" required>
								<span class="input-group-text">Hari</span>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Tanggal Mulai</label>
						<div class="col-md-9">
							<input type="date" class="form-control" name="mulai" id="mulai-edit-kontrak" required>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Tanggal Selesai</label>
						<div class="col-md-9">
							<input type="date" class="form-control" name="selesai" id="selesai-edit-kontrak" required>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Nama Penyedia</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="penyedia" id="penyedia-edit-kontrak" required>
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

<!-- modal hapus -->
<div class="modal fade" id="hapusKontrakModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalKontrakTitle">Yakin ingin menghapus?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-hapus-kontrak">
				<div class="modal-body">
					<p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
					<input type="hidden" name="id" id="id-kontrak" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger waves-effect waves-light" id="btn-submit-realisasi">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
