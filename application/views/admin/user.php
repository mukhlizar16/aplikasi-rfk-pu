<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-5">
							<button class="btn btn-primary" id="btn-add-role" data-bs-toggle="modal" data-bs-target="#addModalUser" onclick="$('#form-add-user')[0].reset()">Tambah User</button>
						</div>

						<div class="table-responsive">
							<table class="table nowrap" id="table-list-user">
								<thead>
									<tr>
										<th class="text-center" width="5%">No</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Password</th>
										<th>Role</th>
										<th class="text-center" width="10%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($user as $u) : ?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td><?= $u['nama'] ?></td>
											<td><?= $u['email'] ?></td>
											<td><?= $u['pass'] ?></td>
											<td><?= $u['role'] ?></td>
											<td class="text-center">
												<button id="btn-edit" data-id="<?= $u['id'] ?>" class="btn btn-sm btn-warning">
													<i class="dripicons-pencil"></i>
												</button>
												<button id="btn-hapus" data-id="<?= $u['id'] ?>" class="btn btn-sm btn-danger">
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
<div class="modal fade" id="addModalUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('admin/add_user') ?>" id="form-add-user">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="nama">Nama <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input type="text" name="nama" id="nama" class="form-control" autofocus required>
						</div>
					</div><br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="email">Email <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input type="text" name="email" id="email" class="form-control" required>
						</div>
					</div><br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="password">Password <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input type="text" name="password" id="password" class="form-control" required>
						</div>
					</div><br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="role">Role <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<select name="role" class="form-control" id="role" required>
								<option value="">--Pilih--</option>
								<?php foreach ($role as $r) : ?>
									<option value="<?= $r['id'] ?>"><?= $r['nama_role'] ?></option>
								<?php endforeach ?>
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
<div class="modal fades" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('admin/hapus_user') ?>" id="form-hapus-user">
				<div class="modal-body">
					<p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
					<input type="hidden" name="id" id="id-user" class="form-control">
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>