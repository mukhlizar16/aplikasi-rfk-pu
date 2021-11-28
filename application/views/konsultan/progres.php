<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-5">
							<button class="btn btn-primary" id="btn-add-progres" data-bs-toggle="modal" data-bs-target="#addModalProgres">Tambah Progres</button>
						</div>

						<div class="mb-5">
							<?php $uraian = $rab->row(); ?>
							<table class="table-borderless">
								<tbody>
									<tr>
										<td>Pekerjaan</td>
										<td>:</td>
										<td style="padding-left: 10px;">
											<strong><?= $uraian->uraian ?? 'Kosong' ?></strong>
										</td>
									</tr>
									<tr>
										<td>Nomor Kontrak</td>
										<td>:</td>
										<td style="padding-left: 10px;">
											<strong><?= $uraian->no_kontrak ?? 'Kosong' ?></strong>
										</td>
									</tr>
									<tr>
										<td>Lokasi</td>
										<td>:</td>
										<td style="padding-left: 10px;">
											<strong><?= $uraian->lokasi ?? 'Kosong' ?></strong>
										</td>
									</tr>
									<tr>
										<td>Tahun Anggaran</td>
										<td>:</td>
										<td style="padding-left: 10px;">
											<strong><?= !empty($uraian->mulai) ? date('Y', strtotime($uraian->mulai)) : 'Kosong' ?></strong>
										</td>
									</tr>
									<tr>
										<td>Kontraktor</td>
										<td>:</td>
										<td style="padding-left: 10px;">
											<strong><?= $uraian->penyedia ?? 'Kosong' ?></strong>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="mt-3 mb-3">
							<div class="row">
								<div class="col-md-8">
									<div class="form-group row">
										<label for="bulan" class="col-form-label col-md-2">Bulan ke :</label>
										<div class="col-md-6">
											<select name="bulan" id="bulan-tampil" class="form-control">
												<option value="">--Pilih--</option>
												<?php for ($i = 1; $i <= 12; $i++) : ?>
													<option value="<?= $i ?>"><?= $i ?></option>
												<?php endfor ?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table tabel-pu nowrap" id="table-progres">
								<thead>
									<thead>
										<tr>
											<th style="vertical-align: middle;" rowspan="3">No</th>
											<th style="vertical-align: middle;" rowspan="3">Uraian</th>
											<th style="vertical-align: middle;" rowspan="3">Satuan</th>
											<th class="text-center" colspan="9">Progres Bulanan</th>
										<tr>
											<th class="text-center" colspan="3">s/d Bulan Lalu</th>
											<th class="text-center" colspan="3">Bulan Ini</th>
											<th class="text-center" colspan="3">s/d Bulan Ini</th>
										<tr>
											<th>Volume</th>
											<th>Jumlah Harga</th>
											<th>Bobot</th>
											<th>Volume</th>
											<th>Jumlah Harga</th>
											<th>Bobot</th>
											<th>Volume</th>
											<th>Jumlah Harga</th>
											<th>Bobot</th>
										</tr>
										</tr>
										</tr>
									</thead>
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

<!-- Modal tambah -->
<div class="modal fade" id="addModalProgres" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Progres</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('konsultan/add_progress') ?>" id="form-add-progress">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="pekerjaan-progres">Paket Pekerjaan <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<select name="pekerjaan" id="pekerjaan-progres" class="form-control" required>
								<option value="">--Pilih--</option>
								<?php foreach ($pekerjaan as $p) : ?>
									<option value="<?= $p->id ?>"><?= $p->uraian_pekerjaan ?></option>
								<?php endforeach ?>
							</select>
							<input type="hidden" name="rab_id" id="id-rab" class="form-control">
							<input type="hidden" name="vol_sebelum" id="vol_sebelum" class="form-control">
							<input type="hidden" name="harga_sebelum" id="harga_sebelum" class="form-control">
							<input type="hidden" name="bobot_sebelum" id="bobot_sebelum" class="form-control">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="divisi-progres">Jenis Pekerjaan <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<select name="jenis" id="divisi-progres" class="form-control" required>
								<option value="">--Pilih--</option>
							</select>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="seksi-progres">Uraian Pekerjaan <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<select name="uraian" id="seksi-progres" class="form-control" required>
								<option value="">--Pilih--</option>
							</select>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="bulan">Bulan ke- <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<select name="bulan" id="bulan" class="form-control" required>
								<option value="">--Pilih--</option>
								<?php for ($i = 1; $i <= 12; $i++) : ?>
									<option value="<?= $i ?>"><?= $i ?></option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="volume-progress">Volume <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input name="volume" id="volume-progress" type="text" class="form-control" required>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="jumlah-progres">Jumlah Harga <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input name="jumlah" id="jumlah-progres" type="text" class="form-control" required>
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="bobot-progres">Bobot <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input name="bobot" id="bobot-progres" type="text" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="editModalProgres" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Form Edit Data</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('konsultan/update_progres') ?>" id="form-update-progres">
				<div class="modal-body">
					<div class="form-group row">
						<label for="nama_role-edit" class="col-form-label col-md-3">Nama</label>
						<div class="col-md-9">
							<input type="hidden" class="form-control" name="id" id="id-role">
							<input type="text" name="nama_role" id="nama_role-edit" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="hapusModalProgres" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('konsultan/hapus_progres') ?>" id="form-hapus-progres">
				<div class="modal-body">
					<p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
					<input type="hidden" name="id" id="progres-id" class="form-control">
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>