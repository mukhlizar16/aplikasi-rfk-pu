<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-5">
							<button class="btn btn-primary" id="btn-add-jenisBelanja" data-bs-toggle="modal"
									data-bs-target="#modalJenisBelanja">Tambah
							</button>
						</div>

						<div class="table-responsive">
							<table class="table nowrap" id="table-seksi">
								<thead>
								<tr>
									<th class="text-center" width="5%">No</th>
									<th class="text-center">Akun</th>
									<th width="50%">Deskripsi</th>
									<th class="text-center">parent</th>
									<th class="text-center" width="10%">Aksi</th>
								</tr>
								</thead>
								<tbody>
								<?php $no = 1;
								foreach ($item as $i) : ?>
								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td class="text-center"><?= $i->akun ?></td>
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
<div class="modal fade" id="modalJenisBelanja" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	 aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Form Tambah Jenis Belanja</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('admin/add_jenisbelanja') ?>" id="form-add-jenis-belanja">
				<div class="modal-body">
					<div class="form-group mb-2 row">
						<label class="col-md-4 col-form-label" for="akun">Akun <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input type="text" name="akun" id="akun" class="form-control" autofocus required>
						</div>
					</div>
					<div class="form-group mb-2 row">
						<label class="col-md-4 col-form-label" for="deskripsi">Deskripsi <span
									class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="parent">Parent <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<select name="parent" id="parent" class="form-control form-select">
								<option value="">--Pilih--</option>
								<?php foreach ($optlabel as $opt) : ?>
									<optgroup label="<?= $opt->nama ?>">
										<?php foreach ($options as $option) : ?>
											<?php if ($opt->id == $option->parent_id) : ?>
												<option value="<?= $option->id ?>"><?= $option->akun . '-' . $option->nama ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</optgroup>
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

<!-- Modal edit -->
<div class="modal fades" id="editModalSeksi" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Form Edit Data</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('admin/update_seksi') ?>" id="form-update-role">
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
<div class="modal fades" id="hapusModalSeksi" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('admin/hapus_seksi') ?>" id="form-hapus-role">
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
