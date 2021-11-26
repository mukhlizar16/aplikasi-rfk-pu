<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="table-rfk">
								<thead>
									<tr>
										<th rowspan="2" width="5%">No</th>
										<th rowspan="2" class="text-center">Program/Kegiatan</th>
										<th rowspan="2" class="text-center">Lokasi</th>
										<th rowspan="2" class="text-center">Jumlah Alokasi</th>
										<th rowspan="2" class="text-center">Nilai Kontrak</th>
										<th rowspan="2" class="text-center">Sisa Tender</th>
										<th class="text-center" colspan="3">Realisasi</th>
										<th class="text-center" colspan="3">Waktu Pelaksanaan</th>
										<th class="text-center" rowspan="2">Nama Perusahaan</th>
										<th class="text-center" rowspan="2">Nomor Kontrak</th>
									</tr>
									<tr>
										<th class="text-center">% Fisik</th>
										<th class="text-center">Keuangan</th>
										<th class="text-center">% Keuangan</th>
										<th class="text-center">Hari</th>
										<th class="text-center">Mulai</th>
										<th class="text-center">Akhir</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($item as $i) : ?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td><?= $i->uraian_pekerjaan ?></td>
											<td class="text-center"><?= $i->lokasi ?></td>
											<td nowrap><?= rupiah($i->pagu) ?></td>
											<td nowrap><?= rupiah($i->nilai_kontrak) ?></td>
											<td nowrap><?= rupiah($i->pagu - $i->nilai_kontrak) ?></td>
											<td class="text-center"><?= round($i->fisik, 2) ?></td>
											<td>Tes</td>
											<td>Tes 2</td>
											<td class="text-center"><?= $i->jangka ?></td>
											<td class="text-center" nowrap><?= date('d-m-Y', strtotime($i->mulai)) ?></td>
											<td class="text-center" nowrap><?= date('d-m-Y', strtotime($i->selesai)) ?></td>
											<td><?= $i->penyedia ?></td>
											<td><?= $i->no_kontrak ?></td>
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