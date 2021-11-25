<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-5">
							<button class="btn btn-primary" id="btn-add-role" data-bs-toggle="modal" data-bs-target="#addModalRole">Tambah Role</button>
						</div>

						<div class="table-responsive">
							<table class="table nowrap" id="table-role">
								<thead>
									<tr>
										<th class="text-center" width="5%">No</th>
										<th>Nama Role</th>
										<th>Tanggal</th>
										<th class="text-center" width="10%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($role as $r) : ?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td><?= $r['nama_role'] ?></td>
											<td><?= date('d-m-Y', strtotime($r['tgl'])) ?></td>
											<td class="text-center">
												<button class="btn btn-warning btn-sm" data-id="<?= $r['id'] ?>" id="btn-edit">
													<i class="dripicons-pencil"></i>
												</button>
												<button class="btn btn-danger btn-sm" data-id="<?= $r['id'] ?>" id="btn-hapus">
													<i class="dripicons-trash"></i>
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
<div class="modal fade" id="addModalRole" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Role</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('admin/add_role') ?>" id="form-add-role">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="nama_role">Nama <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input type="text" name="nama" id="nama_role" class="form-control" autofocus required>
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
<div class="modal fades" id="editModalRole" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Form Edit Data</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('admin/update_role') ?>" id="form-update-role">
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
<div class="modal fades" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('admin/hapus_role') ?>" id="form-hapus-role">
				<div class="modal-body">
					<p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
					<input type="hidden" name="id" id="role-id" class="form-control">
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>