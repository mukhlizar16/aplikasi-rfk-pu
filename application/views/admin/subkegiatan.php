<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<button class="btn btn-primary" id="btn-tambah-subkegiatan">Tambah Data</button>
						</div>

						<div class="mt-2 table-responsive">
							<table class="table table-striped table-bordered" id="tabel-subkegiatan">
								<thead>
								<tr>
									<th style="text-align: center" width="5%">No</th>
									<th style="text-align: center">Kegiatan</th>
									<th style="text-align: center">Kode Sub Kegiatan</th>
									<th style="text-align: center">Sub Kegiatan</th>
									<th style="text-align: center" width="15%">Tanggal</th>
									<th style="text-align: center" width="10%">Aksi</th>
								</tr>
								</thead>
								<tbody>
								<?php $no = 1; foreach ($subkegiatan as $s) : ?>
									<tr>
										<td style="text-align: center"><?= $no++ ?></td>
										<td><?= $s['nama_kegiatan'] ?></td>
										<td style="text-align: center"><?= $s['kode_subkegiatan'] ?></td>
										<td><?= $s['nama_subkegiatan'] ?></td>
										<td style="text-align: center"><?= date('d-m-Y', strtotime($s['tgl'])) ?></td>
										<td style="text-align: center">
											<button class="btn btn-danger"
													data-toggle="tooltip"
													data-placement="top"
													title="Hapus"
													data-id="<?= $s['id'] ?>" id="btn-hapus">
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
<div class="modal fade" id="tambahSubKegiatanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Kegiatan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('admin/simpan_subkegiatan') ?>" id="form-subkegiatan">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-form-label col-md-5" for="uraian">Kode Sub Kegiatan <span
									class="required">*</span>
						</label>
						<div class="col-md-7">
							<input type="text" name="kode" class="form-control">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-form-label col-md-5" for="uraian">Nama Sub Kegiatan <span
									class="required">*</span>
						</label>
						<div class="col-md-7">
							<input type="text" name="subkegiatan" class="form-control">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-form-label col-md-5" for="uraian">Kegiatan <span
									class="required">*</span>
						</label>
						<div class="col-md-7">
							<select name="kegiatan" id="kegiatan" class="form-control">
								<option value="">--Pilih--</option>
								<?php foreach ($kegiatan as $k) : ?>
									<option value="<?= $k['id'] ?>"><?= $k['kode_kegiatan'] . ' - ' . $k['nama_kegiatan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="hapusSubKegiatanModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('admin/hapus_subkegiatan') ?>" class="form-horizontal form-label-left" id="form-hapus-subkegiatan">
				<div class="modal-body">
					<p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
					<input type="hidden" name="id" id="subkegiatan-id" class="form-control">
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
