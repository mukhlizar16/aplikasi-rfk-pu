<div class="container-fluid">
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-5">
                            <button class="btn btn-primary" id="btn-add-seksi" data-bs-toggle="modal" data-bs-target="#addModalSeksi">Tambah Seksi</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table nowrap" id="table-seksi">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th>Nama Divisi</th>
                                        <th width="50%">Nama Seksi</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($seksi as $s) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $s['nama_divisi'] ?></td>
                                            <td class="text-wrap"><?= $s['nama_seksi'] ?></td>
                                            <td class="text-center"><?= date('d-m-Y', strtotime($s['tanggal'])) ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-danger btn-sm glow" id="btn-hapus" data-id="<?= $s['id'] ?>">
                                                    <i class="fas fa-trash-alt fa-fw"></i>
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
<div class="modal fade" id="addModalSeksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Seksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('admin/add_seksi') ?>" id="form-add-seksi">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="nama_divisi">Nama <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="nama" id="nama_divisi" class="form-control" autofocus required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="divisi">Divisi <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-8">
                            <select name="divisi" id="divisi" class="form-control" required>
                                <option value="">--Pilih--</option>
                                <?php foreach ($divisi as $d) : ?>
                                    <option value="<?= $d['id'] ?>"><?= $d['nama_divisi'] ?></option>
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
<div class="modal fades" id="editModalSeksi" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Form Edit Data</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="<?= site_url('admin/update_seksi') ?>" id="form-update-role">
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
<div class="modal fades" id="hapusModalSeksi" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="<?= site_url('admin/hapus_seksi') ?>" id="form-hapus-role">
                <div class="modal-body">
                    <p>Setelah dihapus, data tidak dapat dikembalikan lagi.</p>
                    <input type="hidden" name="id" id="role-id" class="form-control">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>