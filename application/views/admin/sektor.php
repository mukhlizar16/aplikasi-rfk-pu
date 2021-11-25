<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-5">
							<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalSektor">Tambah Sektor</button>
						</div>

						<div class="table-responsive">
							<table class="table nowrap" id="table-sektor">
								<thead>
									<tr>
										<th class="text-center" width="5%">No</th>
										<th>Nama Sektor</th>
										<th class="text-center" width="20%">Tanggal</th>
										<th class="text-center" width="10%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($sektor as $s) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $s->nama_sektor ?></td>
											<td class="text-center"><?= date('d-m-Y', strtotime($s->created_at)) ?></td>
											<td class="text-center">
												<button class="btn btn-warning btn-sm glow" id="btn-edit" data-id="<?= $s->id ?>" data-nama="<?= $s->nama_sektor ?>">
													<i class="fas fa-pencil-alt fa-fw"></i>
												</button>
												<button class="btn btn-danger btn-sm glow" id="btn-hapus" data-id="<?= $s->id ?>">
													<i class="fas fa-trash-alt fa-fw"></i>
												</button>
											</td>
										</tr>
									<?php endforeach ?>
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
<div class="modal fade" id="addModalSektor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Form Tambah Sektor</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('admin/add_sektor') ?>" id="form-add-sektor">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="nama_sektor">Nama Sektor<span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input type="text" name="nama_sektor" id="nama_sektor" class="form-control" autofocus required>
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
<div class="modal fade" id="editModalSektor" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Form Edit Data</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('admin/update_sektor') ?>" id="form-update-sektor">
				<div class="modal-body">
					<div class="form-group row">
						<label for="nama-sektor-edit" class="col-form-label col-md-3">Nama Sektor</label>
						<div class="col-md-9">
							<input type="hidden" class="form-control" name="id" id="id-sektor-edit">
							<input type="text" name="nama_sektor" id="nama-sektor-edit" class="form-control">
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
<div class="modal fade" id="hapusModalSektor" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form id="form-hapus-sektor">
				<div class="modal-body">
					<p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
					<input type="hidden" name="id" id="sektor-id" class="form-control">
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>