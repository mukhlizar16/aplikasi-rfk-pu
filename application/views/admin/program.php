<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<button class="btn btn-primary" id="btn-tambah-program">Tambah Data</button>
						</div>

						<div class="mt-2 table-responsive">
							<table class="table table-striped table-bordered" id="tabel-program">
								<thead>
									<tr>
										<th style="text-align: center" width="5%">No</th>
										<th style="text-align: center">Kode</th>
										<th>Nama Program</th>
										<th style="text-align: center" width="15%">Tanggal</th>
										<th style="text-align: center" width="10%">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($program as $p) : ?>
										<tr>
											<td style="text-align: center"><?= $no++ ?></td>
											<td style="text-align: center" width="15%"><?= $p['kode_program'] ?></td>
											<td><?= $p['nama_program'] ?></td>
											<td style="text-align: center"><?= date('d-m-Y', strtotime($p['tgl'])) ?></td>
											<td style="text-align: center">
												<button class="btn btn-danger btn-sm" data-id="<?= $p['id'] ?>" id="btn-hapus">
													<i class="dripicons-trash"></i>
												</button>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

						<div class="mt-2">
							<ul class="tree">
								<?php foreach ($pekerjaan as $p) : ?>
									<li style="list-style: none;">
										<input type="checkbox" checked="checked" id="c1" />
										<label class="tree_label" for="c1"><?= $p['nama'] ?></label>
										<ul>
											<?php foreach ($p['kegiatan'] as $k) : ?>
												<li style="list-style: none;">
													<input type="checkbox" checked="checked" id="c2" />
													<label for="c2" class="tree_label"><?= $k['nama'] ?></label>
													<ul>
														<?php foreach ($k['sub'] as $s) : ?>
															<li style="list-style: none;"><span class="tree_label"><?= $s->nama ?></span></li>
														<?php endforeach ?>
													</ul>
												</li>
											<?php endforeach ?>
										</ul>
									</li>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="tambahProgramModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahModalLabel">Form Tambah Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= site_url('admin/simpan_program') ?>" id="form-program">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-form-label col-md-4 col-sm-4" for="uraian">Kode Program <span class="required">*</span>
						</label>
						<div class="col-md-8 col-sm-8 ">
							<input type="text" name="kode" class="form-control">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label class="col-form-label col-md-4 col-sm-4" for="uraian">Nama Program <span class="required">*</span>
						</label>
						<div class="col-md-8 col-sm-8 ">
							<input type="text" name="program" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal hapus -->
<div class="modal fades" id="hapusProgramModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form action="<?= site_url('admin/hapus_program') ?>" id="form-hapus-program">
				<div class="modal-body">
					<p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
					<input type="hidden" name="id" id="program-id" class="form-control">
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>