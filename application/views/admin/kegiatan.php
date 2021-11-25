<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<button class="btn btn-primary" id="btn-tambah-kegiatan">Tambah Data</button>
						</div>

						<div class="table-responsive">
							<table class="table table-striped table-bordered" id="tabel-kegiatan">
								<thead>
								<tr>
									<th style="text-align: center" width="5%">No</th>
									<th style="text-align: center">Program</th>
									<th style="text-align: center">Kode Kegiatan</th>
									<th style="text-align: center">Kegiatan</th>
									<th style="text-align: center" width="15%">Tanggal</th>
									<th style="text-align: center" width="10%">Aksi</th>
								</tr>
								</thead>
								<tbody>
								<?php $no = 1;
								foreach ($kegiatan as $k) : ?>
									<tr>
										<td style="text-align: center"><?= $no++ ?></td>
										<td><?= $k['program'] ?></td>
										<td style="text-align: center"><?= $k['kode_kegiatan'] ?></td>
										<td><?= $k['nama_kegiatan'] ?></td>
										<td style="text-align: center"><?= date('d-m-Y', strtotime($k['tgl'])) ?></td>
										<td style="text-align: center">
											<button class="btn btn-danger"
													data-toggle="tooltip"
													data-placement="top"
													title="Hapus"
													data-id="<?= $k['id'] ?>" id="btn-hapus">
												<i class="fa fa-trash"></i>
											</button>
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
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Kegiatan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('admin/simpan_kegiatan') ?>" id="form-kegiatan">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="uraian">Kode Kegiatan <span
									class="required">*</span>
						</label>
						<div class="col-md-8">
							<input type="text" name="kode" class="form-control">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-form-label col-md-4" for="uraian">Nama Kegiatan <span
									class="required">*</span>
						</label>
						<div class="col-md-8">
							<input type="text" name="kegiatan" class="form-control">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-form-label col-md-4" for="uraian">Program <span
									class="required">*</span>
						</label>
						<div class="col-md-8">
							<select name="program" id="program" class="form-control">
								<option value="">--Pilih--</option>
								<?php foreach ($program as $p) : ?>
									<option value="<?= $p['id'] ?>"><?= $p['kode_program'] . ' - ' . $p['nama_program'] ?></option>
								<?php endforeach; ?>
							</select>
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

<!-- Modal hapus -->
<div class="modal fades" id="hapusKegiatanModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('admin/hapus_kegiatan') ?>" id="form-hapus-kegiatan">
				<div class="modal-body">
					<p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
					<input type="hidden" name="id" id="kegiatan-id" class="form-control">
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
