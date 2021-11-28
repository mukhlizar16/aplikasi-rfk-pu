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
										<th rowspan="2" width="5%" style="vertical-align: middle;">No</th>
										<th rowspan="2" class="text-center" style="vertical-align: middle;">Pekerjaan</th>
										<th rowspan="2" class="text-center" style="vertical-align: middle;">Lokasi</th>
										<th rowspan="2" class="text-center" style="vertical-align: middle;">Jumlah Alokasi</th>
										<th rowspan="2" class="text-center" style="vertical-align: middle;">Nilai Kontrak</th>
										<th rowspan="2" class="text-center" style="vertical-align: middle;">Sisa Tender</th>
										<th class="text-center" colspan="3">Realisasi</th>
										<th class="text-center" colspan="3">Waktu Pelaksanaan</th>
										<th class="text-center" rowspan="2" style="vertical-align: middle;">Nama Perusahaan</th>
										<th class="text-center" rowspan="2" style="vertical-align: middle;">Nomor Kontrak</th>
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
										<td style="font-weight: bold;" colspan="3">
											Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Aceh Barat
										</td>
										<td style="font-weight: bold;" nowrap><?= rupiah($dinas->pagu) ?></td>
										<td style="font-weight: bold;" nowrap><?= rupiah($dinas->kontrak) ?></td>
										<td style="font-weight: bold;" nowrap><?= rupiah($dinas->pagu - $dinas->kontrak) ?></td>
									</tr>
									<?php foreach ($program as $p) : ?>
										<tr>
											<td colspan="3" style="font-weight: bold;"><?= $p->nama_program ?></td>
											<td style="font-weight: bold;"><?= rupiah($p->pagu) ?></td>
											<td style="font-weight: bold;"><?= rupiah($p->kontrak) ?></td>
											<td style="font-weight: bold;"><?= rupiah($p->pagu - $p->kontrak) ?></td>
										</tr>
										<!-- start showing kegiatan -->
										<?php $keg = 1;
										foreach ($kegiatan as $k) : ?>
											<?= $k->program_id ?>
											<?php if ($k->program_id === $p->id) : ?>
												<tr>
													<td class="text-center" style="font-weight: bold;"><?= get_abjad($keg++) ?>.</td>
													<td colspan="2" style="font-weight: bold;"><?= $k->nama_kegiatan ?></td>
													<td style="font-weight: bold;"><?= rupiah($k->pagu) ?></td>
													<td style="font-weight: bold;"><?= rupiah($k->kontrak) ?></td>
													<td style="font-weight: bold;"><?= rupiah($k->pagu - $k->kontrak) ?></td>
												</tr>
											<?php endif; ?>
											<!-- start showing subkegiatan -->
											<?php $subkeg = 1;
											foreach ($subkegiatan as $sk) : ?>
												<?php if ($sk->idk == $k->id && $sk->idp == $p->id) : ?>
													<tr>
														<td class="text-center" style="font-weight: bold;"><?= strtolower(get_abjad($subkeg++)) ?>.</td>
														<td style="font-weight: bold;" colspan="2"><?= $sk->nama_subkegiatan ?></td>
														<td style="font-weight: bold;" nowrap><?= rupiah($sk->pagu) ?></td>
														<td style="font-weight: bold;" nowrap><?= rupiah($sk->kontrak) ?></td>
														<td style="font-weight: bold;" nowrap><?= rupiah($sk->pagu - $sk->kontrak) ?></td>
													</tr>
												<?php endif; ?>

												<!-- start showing item -->
												<?php $no = 1;
												foreach ($item as $i) : ?>
													<?php if ($i->subkeg == $sk->id && $i->idk == $k->id && $i->idp == $p->id) : ?>
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
													<?php endif; ?>
												<?php endforeach; ?>
												<!-- end start -->
											<?php endforeach; ?>
											<!-- end showing subkegiatan -->
										<?php endforeach; ?>
										<!-- end showing kegiatan -->
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