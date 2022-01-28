<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="col-md-6">
							<form action="" id="form-cek-pagu">
								<div class="form-group mb-3">
									<label for="program-cek-pagu">Program</label>
									<select name="program" id="program-cek-pagu" class="form-control">
										<option value="">--Pilih--</option>
										<?php foreach ($program as $p) : ?>
											<option value="<?= $p->id ?>"><?= $p->nama_program ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group mb-3">
									<label for="kegiatan-cek-pagu">Kegiatan</label>
									<select name="kegiatan" id="kegiatan-cek-pagu" class="form-control">
										<option value="">--Pilih--</option>
									</select>
								</div>
								<div class="form-group mb-3">
									<label for="sub-kegiatan-cek-pagu">Sub Kegiatan</label>
									<select name="subkegiatan" id="sub-kegiatan-cek-pagu" class="form-control">
										<option value="">--Pilih--</option>
									</select>
								</div>
								<div class="form-group" style="text-align: right;">
									<button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Tampilkan</button>
								</div>
							</form>
						</div>
						<div class="mt-5 table-responsive">
							<table class="table table-bordered table-hover" id="table-cek-pagu">
								<thead>
									<th>Item</th>
									<th>Total</th>
								</thead>
								<tbody>

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
<div class="modal fade" id="cekPaguModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalKontrakTitle">Judul</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="">
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" id="btn-submit-realisasi">
						Simpan
					</button>
				</div>
			</form>
		</div>
	</div>
</div>