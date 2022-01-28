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
									<label for="pekerjaan-rfk" class="col-form-label col-md-2">Pekerjaan</label>
									<div class="col-md-4">
										<select name="pekerjaan" id="pekerjaan-rfk" class="form-control">
											<option value="">--Pilih--</option>
											<?php foreach ($item as $i) : ?>
												<option value="<?= $i->id_pagu ?>" <?= @ $_SESSION['pekerjaan-rfk'] == $i->id_pagu ? 'selected' : '' ?>><?= $i->uraian_pekerjaan ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
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
								<div class="form-group row mb-2">
									<label for="sumber" class="col-md-2 col-form-label">Sumber Dana</label>
									<div class="col-md-4">
										<select name="sumber" id="sumber" class="form-control">
											<option value="">--Pilih--</option>
											<option value="1">DTU</option>
											<option value="2">DAK</option>
											<option value="3">DOKA</option>
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
								<?php $no = 1;
								foreach ($result as $r) : ?>
									<tr>
										<td><?= get_abjad($no++) ?></td>
										<td colspan="13" style="font-weight: bold"><?= $r->nama_program ?></td>
									</tr>
									<tr>
										<td></td>
										<td colspan="13" style="font-weight: bold"><?= $r->nama_kegiatan ?></td>
									</tr>
									<tr>
										<td></td>
										<td colspan="13" style="font-weight: bold"><?= $r->nama_subkegiatan ?></td>
									</tr>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $r->uraian_pekerjaan ?></td>
										<td><?= $r->lokasi ?></td>
										<td nowrap><?= rupiah($r->pagu) ?></td>
										<td nowrap><?= rupiah($r->nilai_kontrak) ?></td>
										<td nowrap><?= rupiah($r->pagu - $r->nilai_kontrak) ?></td>
										<td nowrap>
											<?= $r->bobot != '' ? round($r->bobot + $r->persen_fisik, 2) : round($r->persen_fisik, 2) ?>
										</td>
										<td nowrap><?= rupiah($r->keuangan) ?></td>
										<td nowrap class="text-center">
											<?= $r->persen_kontrak >= 100 ? '100' : $r->persen_kontrak ?>
										</td>
										<td class="text-center"><?= $r->jangka ?></td>
										<td class="text-center" nowrap><?= date('d-m-Y', strtotime($r->mulai)) ?></td>
										<td class="text-center" nowrap><?= date('d-m-Y', strtotime($r->selesai)) ?></td>
										<td><?= $r->penyedia ?></td>
										<td><?= $r->no_kontrak ?></td>
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
