<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<button class="btn btn-primary" id="btn-add-satuan" data-bs-toggle="modal" data-bs-target="#addModalSatuan">Tambah Data</button>
						</div>

						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th width="10%">No.</th>
									<th>Nama Satuan</th>
									<th width="10%">Aksi</th>
								</tr>
								</thead>
								<tbody>
								<?php $no = 1; foreach ($satuan as $s) : ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $s['nama_satuan'] ?></td>
									<td>
										<button class="btn btn-danger btn-sm" id="btn-hapus" data-id="<?= $s['id'] ?>">
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
<div class="modal fade" id="addModalSatuan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Satuan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('admin/add_satuan') ?>" id="form-satuan">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="uraian">Nama Satuan <span
									class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input type="text" name="satuan" id="satuan-input" class="form-control" autofocus>
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
<div class="modal fades" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
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
