<div class="container-fluid">
	<div class="page-content-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<button class="btn btn-primary" id="btn-add-fisik">Tambah Data
							</button>
						</div>

						<div class="mt-2 table-responsive">
							<table class="table table-striped table-hover" id="table-fisik">
								<thead>
									<tr>
										<th>No</th>
										<th>Paket Pekerjaan</th>
										<th>% Fisik</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="addfisikModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalfisikTitle">Tambah Realisasi Fisik</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-fisik">
				<div class="modal-body">
					<div class="form-group row">
						<label for="" class="col-form-label col-md-3">Uraian Pekerjaan</label>
						<div class="col-md-9">
							<select name="pekerjaan" id="pekerjaan" class="form-control">
								<option value="">--Pilih Uraian--</option>
								<?php foreach ($kontrak as $k) : ?>
									<option value="<?= $k['id'] ?>"><?= $k['pekerjaan'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal
					</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" id="btn-submit-fisik">
						Simpan
					</button>
				</div>
			</form>
		</div>
	</div>
</div>