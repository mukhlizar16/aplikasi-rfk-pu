<div class="container-fluid">
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-left">
                                <h5 class="card-title">Detil Progress</h5>
                            </div>
                            <div class="float-end d-none d-sm-block">
                                <a href="<?php echo site_url('admin/fisik') ?>" class="btn btn-info waves-effect waves-light">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="table-detil-fisik">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Paket Pekerjaan</th>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">% Progress</th>
										<td class="text-center">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($fisik as $f) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $f->pekerjaan ?></td>
                                            <td class="text-center"><?= $f->bulan ?></td>
                                            <td class="text-center"><?= str_replace('.', ',', $f->persen) ?></td>
											<td class="text-center" nowrap>
												<button class="btn btn-sm btn-warning" id="btn-edit" data-id="<?= $f->id ?>" data-bulan="<?= $f->bulan ?>">Edit</button>
												<button class="btn btn-sm btn-danger" id="btn-hapus" data-id="<?= $f->id ?>">Hapus</button>
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

<!--Edit Modal-->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalfisikTitle">Edit Realisasi Fisik</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-edit-detil-fisik">
				<div class="modal-body">
					<div class="form-group row mt-3">
						<label for="bulan" class="col-form-label col-md-3">Bulan</label>
						<div class="col-md-9">
							<input name="id" type="text" class="form-control" hidden id="id-progres-detil">
							<select name="bulan" id="bulan-edit-detil" class="form-control">
								<option value="">--Pilih Bulan--</option>
								<option value="1">Januari</option>
								<option value="2">Februari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
					</div>
					<div class="form-group mt-3 row">
						<label for="persen" class="col-form-label col-md-3">Persentase</label>
						<div class="col-md-9">
							<input type="text" name="persen" class="form-control" id="persen">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal
					</button>
					<button type="submit" class="btn btn-primary waves-effect waves-light" id="btn-submit-fisik">
						Update
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
