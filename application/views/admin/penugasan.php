<div class="container-fluid">
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-5">
                            <button class="btn btn-primary" id="btn-add-penugasan" data-bs-toggle="modal" data-bs-target="#addModalPenugasan">Tambah Penugasan</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table nowrap" id="table-penugasan">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th>Pekerjaan</th>
                                        <th>Nama Konsultan</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($riwayat as $r) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $r['pekerjaan'] ?></td>
                                            <td><?= $r['nama'] ?></td>
                                            <td class="text-center"><?= date('d-m-Y', strtotime($r['tanggal'])) ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-danger" id="btn-hapus" data-id="<?= $r['id'] ?>">
                                                    <i class="dripicons-trash"></i>
                                                </button>
                                            </td>
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

<!-- Modal tambah -->
<div class="modal fade" id="addModalPenugasan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Penugasan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('admin/add_penugasan') ?>" id="form-add-penugasan">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="nama_divisi">Pekerjaan <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-8">
                            <select name="pekerjaan" id="pekerjaan-tugas" class="form-control" required>
                                <option value="">--Pilih--</option>
                                <?php foreach ($pekerjaan as $p) : ?>
                                    <option value="<?= $p['id'] ?>"><?= $p['pekerjaan'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="divisi">Konsultan <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-8">
                            <select name="konsultan" id="konsultan-tugas" class="form-control" required>
                                <option value="">--Pilih--</option>
                                <?php foreach ($konsultan as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                <?php endforeach ?>
                            </select>
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
<div class="modal fades" id="editModalpenugasan" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Form Edit Data</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="<?= site_url('admin/update_penugasan') ?>" id="form-update-role">
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
<div class="modal fades" id="hapusModalpenugasan" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="form-hapus-penugasan">
                <div class="modal-body">
                    <p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
                    <input type="hidden" name="id" id="id-hapus-tugas" class="form-control">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary waves-effect waves-light" type="button" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>