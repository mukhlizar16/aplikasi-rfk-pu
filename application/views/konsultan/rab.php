<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-5">
							<button class="btn btn-primary" id="btn-add-rab" data-bs-toggle="modal" data-bs-target="#addModalRAB">Tambah RAB</button>
						</div>

						<div class="mb-5">
							<?php $uraian = $paket->row(); ?>
							<table class="table-borderless">
								<tbody>
									<tr>
										<td>Pekerjaan</td>
										<td>:</td>
										<td style="padding-left: 10px;">
											<strong><?= $uraian->uraian ?? 'Kosong' ?></strong>
										</td>
									</tr>
									<tr>
										<td>Nomor Kontrak</td>
										<td>:</td>
										<td style="padding-left: 10px;">
											<strong><?= $uraian->no_kontrak ?? 'Kosong' ?></strong>
										</td>
									</tr>
									<tr>
										<td>Lokasi</td>
										<td>:</td>
										<td style="padding-left: 10px;">
											<strong><?= $uraian->lokasi ?? 'Kosong' ?></strong>
										</td>
									</tr>
									<tr>
										<td>Tahun Anggaran</td>
										<td>:</td>
										<td style="padding-left: 10px;">
											<strong><?= !empty($uraian->mulai) ? date('Y', strtotime($uraian->mulai)) : 'Kosong' ?></strong>
										</td>
									</tr>
									<tr>
										<td>Kontraktor</td>
										<td>:</td>
										<td style="padding-left: 10px;">
											<strong><?= $uraian->penyedia ?? 'Kosong' ?></strong>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="table-responsive">
							<table class="table nowrap" id="table-rab">
								<thead>
									<tr>
										<th style="vertical-align: middle;">No</th>
										<th style="vertical-align: middle;">Divisi</th>
										<th style="vertical-align: middle;">Volume</th>
										<th style="vertical-align: middle;">Satuan</th>
										<th style="vertical-align: middle;">Harga Satuan (Rp)</th>
										<th style="vertical-align: middle;">Jumlah Harga (Rp)</th>
										<th style="vertical-align: middle;">Bobot (%)</th>
										<!-- <th class="text-wrap">Tingkat Penyelesaian Tiap Pekerjaan</th>
										<th style="vertical-align: middle;">Tahap Pekerjaan</th> -->
										<th style="vertical-align: middle;" class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($header as $h) : ?>
										<tr>
											<td>
												<strong><?= get_abjad($no++) ?></strong>
											</td>
											<td colspan="9">
												<?php if ($h->ids == 2) {
													$divisinya = $h->nama_divisi;
												} else {
													$divisinya = 'Divisi ' . $h->divisi_id . '. ' . $h->nama_divisi;
												} ?>
												<strong>
													<?= $divisinya ?>
												</strong>
											</td>
										</tr>
										<?php $nomor = 1;
										foreach ($rab->result() as $r) : ?>
											<?php if ($r->divisi_id == $h->divisi_id) : ?>
												<tr>
													<td><?= $nomor++ ?>.</td>
													<td <?= $r->cabang_seksi_lain != '' ? 'colspan="7"' : '' ?>><?= $r->nama_seksi == 'Lainnya' ? $r->seksi_lain : $r->nama_seksi ?></td>
													<?php if ($r->cabang_seksi_lain == '') : ?>
														<td class="text-center"><?= rp($r->volume) ?></td>
														<td class="text-center"><?= $r->satuan ?></td>
														<td class="text-right"><?= rupiah($r->harga_satuan) ?></td>
														<td><?= rupiah($r->jumlah) ?></td>
														<td class="text-center"><?= str_replace('.', ',', $r->bobot) ?></td>
														<td>
															<button class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></button>
														</td>
													<?php endif ?>
												</tr>
											<?php endif ?>
											<!-- cabang seksi -->
											<?php if ($r->divisi_id == $h->divisi_id && $r->sektor_id == 2 && $r->cabang_seksi_lain != '') : ?>
												<?php foreach ($cabang as $c) : ?>
													<?php if ($c->seksi_lain == $r->seksi_lain) : ?>
														<tr>
															<td></td>
															<td>
																<?= $c->cabang_seksi_lain ?>
															</td>
															<td class="text-center"><?= rp($c->volume) ?></td>
															<td class="text-center"><?= $c->satuan ?></td>
															<td><?= rupiah($c->harga_satuan) ?></td>
															<td><?= rupiah($c->jumlah) ?></td>
															<td class="text-center"><?= rp($c->bobot) ?></td>
															<td>
																<button class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></button>
															</td>
														</tr>
													<?php endif; ?>
												<?php endforeach; ?>
											<?php endif; ?>
											<!-- end cabang seksi -->
										<?php endforeach ?>

										<!-- jumlah -->
										<?php if ($h->ids != 2) : ?>
											<?php foreach ($jumlah as $j) : ?>
												<?php if ($j->divisi_id == $h->divisi_id) : ?>
													<tr>
														<td colspan="5">Jumlah harga pekerjaan Divisi <?= $h->divisi_id ?></td>
														<td><strong><?= rupiah($j->jumlah) ?></strong></td>
														<td class="text-center"><strong><?= str_replace('.', ',', round($j->bobot, 2)) ?></strong></td>
														<td></td>
													</tr>
												<?php endif; ?>
											<?php endforeach ?>
										<?php endif; ?>
										<!-- end jumlah -->
									<?php endforeach; ?>
									<tr>
										<td colspan="5">
											<strong>Jumlah Harga (Termasuk Biaya Umum dan Keuntungan) + PPN</strong>
										</td>
										<td colspan="3">
											<strong><?= rupiah($total->total_final) ?></strong>
										</td>
									</tr>
									<tr>
										<td colspan="5">
											<strong>Pajak Pertambahan Nilai (PPN) 10%</strong>
										</td>
										<td colspan="3">
											<strong><?= rupiah(0.1 * $total->total_final) ?></strong>
										</td>
									</tr>
									<tr>
										<td colspan="5">
											<strong>Total Harga</strong>
										</td>
										<td colspan="3">
											<strong><?= rupiah(0.1 * $total->total_final + $total->total_final) ?></strong>
										</td>
									</tr>
									<tr>
										<td colspan="5">
											<strong>Total Harga Dibulatkan</strong>
										</td>
										<td colspan="3">
											<?php
											$harga_total = 0.1 * $total->total_final + $total->total_final;
											$harga_total = ceil($harga_total);
											if (substr($harga_total, -3) >= 500) {
												$harga_total = round($harga_total, -3);
											} else {
												$harga_total = round($harga_total, -3) + 1000;
											}
											?>
											<strong><?= rupiah($harga_total) ?></strong>
										</td>
									</tr>
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
<div class="modal fade" id="addModalRAB" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Form Tambah RAB</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('konsultan/add_rab') ?>" id="form-add-rab">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="pekerjaan-rab">Paket Pekerjaan <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<select name="pekerjaan" id="pekerjaan-rab" class="form-control" required>
								<option value="<?= $pekerjaan['id'] ?>"><?= $pekerjaan['pekerjaan'] ?></option>
							</select>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="jenis-rab">Jenis Pekerjaan <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<select name="jenis" id="jenis-rab" class="form-control" required>
								<option value="">--Pilih--</option>
								<?php foreach ($divisi as $d) : ?>
									<option value="<?= $d['id'] ?>"><?= $d['nama_divisi'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="uraian-rab">Uraian Pekerjaan <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<select name="uraian" id="uraian-rab" class="form-control" required>
								<option value="">--Pilih--</option>
							</select>
							<label for="seksi-lain" style="display: none;" id="label-lain">Masukkan uraian lainnya :</label>
							<input type="hidden" class="form-control" id="seksi-lain" name="seksi_lain">
							<div id=anak-uraian style="display: none;">
								<div class="form-group">
									<label for="label-anak-uraian">Apakah ada uraian lainnya ?</label>
									<select name="anak_uraian" class="form-control select2" id="option-anak-uraian">
										<option value="">--Pilih--</option>
										<option value="1">Ya</option>
										<option value="2">Tidak</option>
									</select>
								</div>
								<div class="form-group" id="input-anak-uraian" style="display: none;">
									<label for="label-anak-uraian">Uraian Tambahan :</label>
									<input type="text" name="input_anak_uraian" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="volume">Volume <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input name="volume" id="volume" type="text" class="form-control" required>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="satuan-rab">Satuan <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input name="satuan" id="satuan-rab" type="text" class="form-control" required>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="harga-rab">Harga Satuan <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input name="harga" id="harga-rab" type="text" class="form-control" data-a-dec="," data-a-sep="." required>
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="jumlah-rab">Jumlah Harga <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<div class="input-group">
								<span class="input-group-text">Rp.</span>
								<input name="jumlah" id="jumlah-rab" type="text" class="form-control" required>
							</div>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="bobot-rab">Bobot <span class="text-danger">*</span>
						</label>
						<div class="col-md-8">
							<input name="bobot" id="bobot-rab" type="text" class="form-control" required>
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
<div class="modal fade" id="editModalRAB" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Form Edit RAB</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('konsultan/update_rab') ?>" id="form-update-rab">
				<div class="modal-body">

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
<div class="modal fade" id="hapusModalRAB" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('konsultan/hapus_rab') ?>" id="form-hapus-rab">
				<div class="modal-body">
					<p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
					<input type="hidden" name="id" id="rab-id" class="form-control">
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>