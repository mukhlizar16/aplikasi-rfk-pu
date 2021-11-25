<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-5">
							<button class="btn btn-primary" id="btn-add-adendum" data-bs-toggle="modal" data-bs-target="#addModalAdendum">Tambah Adendum</button>
						</div>

						<div class="table-responsive">
							<table class="table table-bordered nowrap" id="table-adendum">
								<thead>
									<tr>
										<th class="text-center" rowspan="2" style="width: 5%; vertical-align: middle;">No</th>
										<th class="text-center" rowspan="2" style="vertical-align: middle;">Uraian Pekerjaan</th>
										<th class="text-center" colspan="3">Kontrak Awal</th>
										<th class="text-center" colspan="2">Kontrak Adendum</th>
									</tr>
									<tr>
										<th class="text-center">Volume</th>
										<th class="text-center">Jumlah Harga</th>
										<th class="text-center">Bobot</th>
										<th class="text-center">Volume</th>
										<th class="text-center">Bobot</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($adendum as $a) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<?php if ($a->sektor_id == 2) {
												if ($a->cabang_seksi_lain == null) {
													$pekerjaan = $a->seksi_lain;
												} else {
													$pekerjaan = $a->cabang_seksi_lain;
												}
											} else {
												if ($a->seksi == 'Lainnya') {
													$pekerjaan = $a->seksi_lain;
												} else {
													$pekerjaan = $a->seksi;
												}
											} ?>
											<td><?= $pekerjaan ?></td>
											<td class="text-center"><?= str_replace('.', ',', $a->volume_lama) ?></td>
											<td class="text-center"><?= rupiah($a->harga_lama) ?></td>
											<td class="text-center"><?= str_replace('.', ',', $a->bobot) ?></td>
											<td class="text-center"><?= $a->volume_baru ?></td>
											<td class="text-center"><?= str_replace(".", ",", $a->bobot_baru) ?></td>
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
<div class="modal fade" id="addModalAdendum" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Adendum</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('konsultan/add_adendum') ?>" id="form-add-adendum">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="rab-id">Uraian Pekerjaan <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<select name="rab_id" id="rab-id-adendum" class="form-control" required>
								<option value="">--Pilih--</option>
								<?php foreach ($rab_data as $r) : ?>
									<option value="<?= $r->id ?>"><?= $r->seksi_lain == null && $r->cabang_seksi_lain == null ? $r->seksi : ($r->cabang_seksi_lain != null ? $r->seksi_lain . ' - ' . $r->cabang_seksi_lain : $r->seksi_lain) ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="vol-lama" class="col-form-label col-md-4">Volume Sebelumnya</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="vol-lama" name="vol_lama" readonly>
							<input type="hidden" class="form-control" id="jumlah-lama" name="jumlah_lama" readonly>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="vol-baru" class="col-form-label col-md-4">Volume Sekarang <span class="text-danger">*</span></label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="vol-baru" name="vol_baru">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="bobot-baru" class="col-form-label col-md-4">Bobot Sekarang <span class="text-danger">*</span></label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="bobot-baru" name="bobot_baru">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="jlh-harga" class="col-form-label col-md-4">Jumlah Harga</label>
						<div class="col-md-8">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input type="text" class="form-control" id="jlh-harga" name="harga_adendum" readonly>
							</div>
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
<div class="modal fade" id="editModaladendum" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Form Edit Data</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('konsultan/update_adendum') ?>" id="form-update-adendum">
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
<div class="modal fade" id="hapusModaladendum" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('konsultan/hapus_adendum') ?>" id="form-hapus-adendum">
				<div class="modal-body">
					<p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
					<input type="hidden" name="id" id="adendum-id" class="form-control">
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>