<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<button class="btn btn-primary" id="btn-add-pagu">Tambah Data
							</button>
						</div>

						<div class="mt-2 table-responsive">
							<table class="table table-striped table-bordered" id="tabel-pagu">
								<thead>
									<tr>
										<th style="text-align: center; vertical-align: middle" width="5%">No</th>
										<th style="vertical-align: middle">Program</th>
										<th style="vertical-align: middle">Kegiatan</th>
										<th style="vertical-align: middle">Sub Kegiatan</th>
										<th>Uraian Pekerjaan</th>
										<th style="vertical-align: middle">Lokasi</th>
										<th style="text-align: center;vertical-align: middle">Volume</th>
										<th style="text-align: center;vertical-align: middle">Satuan</th>
										<th style="text-align: center;vertical-align: middle">Pagu</th>
										<th style="text-align: center;vertical-align: middle">Jenis</th>
										<th style="text-align: center;vertical-align: middle">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($pagu as $p) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $p['nm_p'] ?></td>
											<td><?= $p['nm_k'] ?></td>
											<td><?= $p['nama_sub'] ?></td>
											<td><?= $p['pekerjaan'] ?></td>
											<td><?= $p['lokasi'] ?></td>
											<td style="text-align: center"><?= $p['volume'] ?></td>
											<td style="text-align: center"><?= $p['satuan'] ?></td>
											<td nowrap><?= rupiah($p['pagu']) ?></td>
											<td><?= $p['jenis'] ?></td>
											<td nowrap>
												<button class="btn btn-warning btn-sm" id="btn-edit" data-id="<?= $p['id'] ?>">
													<i class="fa fa-pencil-alt"></i>
												</button>
												<button class="btn btn-danger btn-sm" id="btn-hapus" data-id="<?= $p['id'] ?>">
													<i class="fa fa-trash-alt"></i>
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
<div class="modal fade" id="tambahPaguModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalPaguTitle">Tambah Kegiatan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('admin/add_pagu') ?>" method="post" id="form-pagu">
				<div class="modal-body">
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Sub Kegiatan</label>
						<div class="col-md-9">
							<input type="hidden" class="form-control" name="tipe" id="tipe">
							<select name="subkegiatan" id="subkegiatan" class="form-control" style="width: 100%">
								<option value="">--Pilih Sub Kegiatan--</option>
								<?php foreach ($subkegiatan as $item) : ?>
									<option value="<?= $item['id'] ?>"><?= $item['kode_subkegiatan'] . ' - ' . $item['nama_subkegiatan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Program</label>
						<div class="col-md-9">
							<input type="hidden" class="form-control" name="id_pagu" id="id-pagu">
							<input type="text" class="form-control" name="program" id="program">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Kegiatan</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="kegiatan" id="kegiatan">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Uraian Pekerjaan</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Lokasi</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="lokasi" id="lokasi">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Volume</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="volume" id="volume">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Satuan</label>
						<div class="col-md-9">
							<select class="form-control" name="satuan" id="satuan">
								<option value="">--Pilih--</option>
								<?php foreach ($satuan as $s) : ?>
									<option value="<?= $s['id'] ?>"><?= $s['nama_satuan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Pagu</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text" for="">Rp.</span>
								<input type="text" class="form-control" name="pagu" id="pagu">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Jenis</label>
						<div class="col-md-9">
							<select name="jenis" id="jenis" class="form-control">
								<option value="">--Pilih--</option>
								<option value="1">Tender</option>
								<option value="2">Non Tender</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" id="btn-submit-pagu">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="hapusPaguModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalPaguTitle">Yakin akan menghapus</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('admin/delete_pagu') ?>" method="post" id="form-delete-pagu">
				<div class="modal-body">
					<input type="hidden" class="form-control" name="id" id="id-pagu-delete">
					<p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger waves-effect waves-light">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>