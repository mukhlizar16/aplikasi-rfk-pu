<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<div class="justify-content-between align-items-center d-flex">
								<blockquote class="blockquote font-size-14 mb-0">
									<p>Data lengkap tabel RFK sesuai dengan jumlah SP2D yang telah terdata.</p>
									<footer class="blockquote-footer font-size-12 mt-0">
										Berdasarkan inputan dari konsultan/pengawas
									</footer>
								</blockquote>
								<a href="<?= site_url('admin/table_rfk') ?>"
								   class="btn btn-warning waves-effect waves-light">Kembali</a>
							</div>
						</div>
						<hr>
						<div class="mb-5">
							<form action="<?= site_url('admin/detil_rfk') ?>" method="post">
								<div class="form-group row mb-2">
									<label for="bulan-rfk" class="col-form-label col-md-2">Bulan</label>
									<div class="col-md-4">
										<select name="bulan" id="bulan-rfk" class="form-control">
											<option value="">--Pilih--</option>
											<?php for ($i = 1; $i <= 12; $i++) : ?>
												<option value="<?= $i ?>" <?= @ $_SESSION['bulan-rfk'] == $i ? 'selected' : '' ?>><?= $i ?></option>
											<?php endfor ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-2"></div>
									<div class="col-md-4">
										<button class="btn btn-sm btn-primary waves-effect waves-light" type="submit">
											Tampilkan
										</button>
									</div>
								</div>
							</form>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered" id="table-rfk">
								<thead>
								<tr>
									<th rowspan="2" width="5%" style="vertical-align: middle;">No</th>
									<th rowspan="2" class="text-center" style="vertical-align: middle;">Pekerjaan</th>
									<th rowspan="2" class="text-center" style="vertical-align: middle;">Lokasi</th>
									<th rowspan="2" class="text-center" style="vertical-align: middle;">Jumlah Alokasi
									</th>
									<th rowspan="2" class="text-center" style="vertical-align: middle;">Nilai Kontrak
									</th>
									<th rowspan="2" class="text-center" style="vertical-align: middle;">Sisa Tender</th>
									<th class="text-center" colspan="3">Realisasi</th>
									<th class="text-center" colspan="3">Waktu Pelaksanaan</th>
									<th class="text-center" rowspan="2" style="vertical-align: middle;">Nama
										Perusahaan
									</th>
									<th class="text-center" rowspan="2" style="vertical-align: middle;">Nomor Kontrak
									</th>
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
								<tr>
									<td colspan="3">
										<b>Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Aceh Barat</b>
									</td>
									<td>
										<b><?= rupiah($dinas->pagu) ?></b>
									</td>
									<td nowrap>
										<b><?= rupiah($dinas->nilai_kontrak) ?></b>
									</td>
									<td nowrap>
										<b><?= rupiah($dinas->pagu - $dinas->nilai_kontrak) ?></b>
									</td>
									<td></td>
									<td nowrap><b><?= rupiah($dinas->keuangan) ?></b></td>
									<td nowrap><b><?= round($dinas->persen_kontrak, 2) ?></b></td>
								</tr>
								<?php foreach ($program as $pg) : ?>
									<?php $keg=1; foreach ($kegiatan as $kg) : ?>
										<?php $sub= 1; foreach ($subkeg as $sk) : ?>
											<?php if ($pg->idp == $kg->idp) : ?>
												<?php if ($kg->idkeg == $sk->idkeg && $kg->idp == $pg->idp) : ?>
													<?php $no = 1;
													foreach ($result2 as $r) : ?>
														<?php if ($sk->ids == $r->ids && $r->idkeg == $kg->idkeg && $r->idp == $pg->idp) : ?>
															<tr>
																<td colspan="3" style="font-weight: bold">
																	<?= $pg->nama_program ?>
																</td>
																<td>
																	<b><?= rupiah($pg->pagu) ?></b>
																</td>
																<td>
																	<b><?= rupiah($pg->nilai_kontrak) ?></b>
																</td>
															</tr>
														<!-- kegiatan -->
															<tr>
																<td><?= get_abjad($keg++) ?></td>
																<td colspan="2" style="font-weight: bold">
																	<?= $kg->nama_kegiatan ?>
																</td>
																<td style="font-weight: bold">
																	<?= rupiah($kg->pagu) ?>
																</td>
																<td style="font-weight: bold">
																	<?= rupiah($kg->nilai_kontrak) ?>
																</td>
															</tr>
														<!-- subkegiatan -->
															<tr>
																<td><?= get_abjad_kecil($sub++) ?></td>
																<td colspan="2"
																	style="font-weight: bold"><?= $r->nama_subkegiatan ?></td>
																<td nowrap>
																	<b><?= rupiah($sk->pagu) ?></b>
																</td>
																<td nowrap>
																	<b><?= rupiah($sk->nilai_kontrak) ?></b>
																</td>
															</tr>
															<tr>
																<td><?= $no++ ?></td>
																<td><?= $r->uraian_pekerjaan ?></td>
																<td><?= $r->lokasi ?></td>
																<td nowrap><?= rupiah($r->pagu) ?></td>
																<td nowrap><?= rupiah($r->nilai_kontrak) ?></td>
																<td nowrap><?= rupiah($r->pagu - $r->nilai_kontrak) ?></td>
																<td nowrap>

																</td>
																<td nowrap><?= rupiah($r->keuangan) ?></td>
																<td nowrap class="text-center">
																	<?= $r->persen_kontrak >= 100 ? '100' : $r->persen_kontrak ?>
																</td>
																<td class="text-center"><?= $r->jangka ?></td>
																<td class="text-center"
																	nowrap><?= date('d-m-Y', strtotime($r->mulai)) ?></td>
																<td class="text-center"
																	nowrap><?= date('d-m-Y', strtotime($r->selesai)) ?></td>
																<td><?= $r->penyedia ?></td>
																<td><?= $r->no_kontrak ?></td>
															</tr>
														<?php endif; ?>
													<?php endforeach ?>
												<?php endif ?>
											<?php endif; ?>
										<?php endforeach; ?>
									<?php endforeach; ?>
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
