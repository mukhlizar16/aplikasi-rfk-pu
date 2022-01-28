<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-2">
							<button class="btn btn-primary" id="btn-add-realisasi">Tambah Data
							</button>
						</div>
						<hr>
						<div class="mb-3">
							<form action="<?= site_url('admin/detil_keuangan') ?>" method="post">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row mb-3">
											<label for="pekerjaan" class="form-label col-md-4">Paket Pekerjaan :</label>
											<div class="col-md-8">
												<select name="pekerjaan" id="pekerjaan-realisasi" class="form-control select2">
													<option value="">--Pilih--</option>
													<?php foreach ($pekerjaan as $p) : ?>
														<option value="<?= $p->id ?>"><?= $p->uraian_pekerjaan ?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label for="bulan" class="form-label col-md-4">Bulan ke :</label>
											<div class="col-md-8">
												<select name="bulan" id="bulan-realisasi" class="form-control select2">
													<option value="">--Pilih--</option>
													<?php for ($i = 1; $i <= 12; $i++) : ?>
														<option value="<?= $i ?>"><?= $i ?></option>
													<?php endfor; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<button class="btn btn-success waves-effect waves-light" type="submit">Tampilkan</button>
									</div>
								</div>
							</form>
						</div>

						<div class="mt-2 table-responsive">
							<table class="table table-bordered table-hover" id="table-realisasi">
								<thead>
									<tr>
										<th class="text-center" width=5%>No</th>
										<th class="text-center">Uraian Pekerjaan</th>
										<th class="text-center">Nomor</th>
										<th class="text-center">Jumlah SP2D</th>
										<th class="text-center">Tanggal</th>
										<th class="text-center" nowrap>% Kontrak</th>
										<th class="text-center" nowrap>% Pagu</th>
										<th class="text-center">Dokumen</th>
										<th class="text-center" width="10%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($keuangan as $k) : ?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td><?= $k->paket ?></td>
											<td class="text-center"><?= $k->nomor ?></td>
											<td nowrap><?= rupiah($k->jumlah) ?></td>
											<td class="text-center" nowrap><?= $k->tgl ?></td>
											<td class="text-center"><?= str_replace('.', ',', $k->persentase_kontrak) ?></td>
											<td class="text-center"><?= str_replace('.', ',', $k->persentase_pagu) ?></td>
											<td class="text-center">
												<a href="<?= base_url() ?>assets/upload/keuangan/<?= $k->dokumen ?>" target="_blank">
													<img src="<?= base_url() ?>assets/admin/images/pdf.png" alt="pdf" width="40px">
												</a>
											</td>
											<td class="text-center" width="10%" nowrap>
												<button class="btn btn-sm btn-warning" id="btn-edit-realisasi" data-id="<?= $k->id ?>" data-file="<?= $k->dokumen ?>">Edit</button>
												<button class="btn btn-sm btn-danger" id="btn-hapus-realisasi" data-id="<?= $k->id ?>" data-file="<?= $k->dokumen ?>">Hapus</button>
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
<div class="modal fade" id="addRealisasiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalRealisasiTitle">Tambah Realisasi Keuangan (Input SP2D)</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-realisasi" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Uraian Pekerjaan</label>
						<div class="col-md-9">
							<select name="uraian" id="uraian-realisasi" class="form-control" style="width: 100%">
								<option value="">--Pilih--</option>
								<?php foreach ($pekerjaan as $k) : ?>
									<option value="<?= $k->id ?>"><?= $k->uraian_pekerjaan ?></option>
								<?php endforeach; ?>
							</select>
							<input type="hidden" class="form-control" id="nilai-kontrak">
							<input type="hidden" class="form-control" id="nilai-pagu">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Jumlah SP2D</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input type="text" class="form-control" id="progress" name="nilai" data-mask="000.000.000.000.000" data-mask-reverse="true">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Nomor</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">No</span>
								<input type="text" class="form-control" id="nomor" name="nomor">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Tanggal</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">Tanggal</span>
								<input type="date" class="form-control" id="tanggal" name="tanggal">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Dokumen</label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="dokumen">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Persen Kontrak</label>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" class="form-control" id="persentase" name="persen_kontrak" readonly>
								<span class="input-group-text">%</span>
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Persen Pagu</label>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" class="form-control" id="persentase2" name="persen_pagu" readonly>
								<span class="input-group-text">%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal
					</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" id="btn-submit-realisasi">
						Simpan
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="editRealisasiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalRealisasiTitle">Edit Realisasi Keuangan (Input SP2D)</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<!--<form id="form-realisasi" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Uraian Pekerjaan</label>
						<div class="col-md-9">
							<select name="uraian" id="uraian-realisasi" class="form-control" style="width: 100%">
								<option value="">--Pilih--</option>
								<?php /*foreach ($pekerjaan as $k) : */?>
									<option value="<?/*= $k->id */?>"><?/*= $k->uraian_pekerjaan */?></option>
								<?php /*endforeach; */?>
							</select>
							<input type="hidden" class="form-control" id="nilai-kontrak">
							<input type="hidden" class="form-control" id="nilai-pagu">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Jumlah SP2D</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input type="text" class="form-control" id="progress" name="nilai" data-mask="000.000.000.000.000" data-mask-reverse="true">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Nomor</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">No</span>
								<input type="text" class="form-control" id="nomor" name="nomor">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Tanggal</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-text">Tanggal</span>
								<input type="date" class="form-control" id="tanggal" name="tanggal">
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Dokumen</label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="dokumen">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Persen Kontrak</label>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" class="form-control" id="persentase" name="persen_kontrak" readonly>
								<span class="input-group-text">%</span>
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Persen Pagu</label>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" class="form-control" id="persentase2" name="persen_pagu" readonly>
								<span class="input-group-text">%</span>
							</div>
						</div>
					</div>
				</div>
			</form>-->
			<div class="modal-body">
				Sedang disiapkan, segera tersedia...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal
				</button>
				<button type="submit" class="btn btn-primary waves-effect waves-light" id="btn-submit-realisasi">
					Update
				</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="delRealisasiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalRealisasiTitle">Yakin menghapus ?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-hapus-realisasi">
				<div class="modal-body">
					<p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
					<input type="hidden" name="id" id="id-del-realisasi" class="form-control">
					<input type="hidden" name="file" id="file-realisasi" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal
					</button>
					<button type="submit" class="btn btn-danger waves-effect waves-light">
						Hapus
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
