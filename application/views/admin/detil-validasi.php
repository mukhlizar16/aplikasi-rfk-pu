<div class="container-fluid">
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <blockquote class="blockquote font-size-14 mb-0">
                                <p>Progres data oleh konwas terhadap paket pekerjaan saat ini.</p>
                                <footer class="blockquote-footer font-size-12 mt-0">
                                    Berdasarkan masing-masing item.
                                    <button class="btn btn-primary" onclick="history.back()">Kembali</button>
                                </footer>
                            </blockquote>
                        </div>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="table-validate">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle;" class="text-center" rowspan="2">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Divisi</th>
                                        <th class="text-center" rowspan="2" style="vertical-align: middle;">Seksi</th>
                                        <th class="text-center" rowspan="2" style="vertical-align: middle;">Bulan</th>
                                        <th class="text-center" colspan="3">Sebelumnya</th>
                                        <th class="text-center" colspan="3">Sekarang</th>
                                        <th class="text-center" colspan="3">S/D Bulan Ini</th>
                                        <th class="text-center" rowspan="2" style="vertical-align: middle;">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Volume</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Bobot</th>
                                        <th class="text-center">Volume</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Bobot</th>
                                        <th class="text-center">Volume</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($progres as $p) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $p->divisi ?></td>
                                            <td><?= $p->seksi == 'Lainnya' ? $p->seksi_lain : $p->seksi  ?></td>
                                            <td class="text-center"><?= $p->bulan ?></td>
                                            <td class="text-center"><?= str_replace('.', ',', round($p->vol_sebelum, 2)) ?></td>
                                            <td class="text-center" nowrap><?= rupiah($p->jlh_harga_sebelum) ?></td>
                                            <td class="text-center"><?= str_replace('.', ',', round($p->bobot_sebelum, 2)) ?></td>
                                            <td class="text-center"><?= str_replace('.', ',', round($p->vol_sekarang, 2)) ?></td>
                                            <td class="text-center" nowrap><?= rupiah($p->jlh_harga_sekarang) ?></td>
                                            <td class="text-center"><?= str_replace('.', ',', round($p->bobot_sekarang, 2)) ?></td>
                                            <td class="text-center"><?= str_replace('.', ',', round($p->vol_total, 2)) ?></td>
                                            <td class="text-center" nowrap><?= rupiah($p->harga_total) ?></td>
                                            <td class="text-center"><?= str_replace('.', ',', round($p->bobot_total, 2)) ?></td>
                                            <td class="text-center" nowrap>
                                                <?php if ($p->is_validate == 0) : ?>
                                                    <button class="btn btn-sm btn-warning">Edit</button>
                                                    <button class="btn btn-sm btn-primary" data-id="<?= $p->id ?>" id="btn-validate">Validasi</button>
                                                <?php else : ?>
                                                    <button class="btn btn-sm btn-success waves-effect waves-light">VALID</button>
                                                <?php endif ?>
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

<!-- Modal validasi -->
<div class="modal fades" id="validateModal" tabindex="-1" role="dialog" aria-labelledby="validateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="validateModalLabel">Anda akan memvalidasi ?</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="<?= site_url('admin/store_validate') ?>" id="form-validate" method="post">
                <div class="modal-body">
                    <p>Jika data sudah benar, silahkan pilih valid pada pilihan dibawah.</p>
                    <input type="hidden" name="id" id="id-progres" class="form-control">
                    <select name="valid" id="valid" class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="1">Valid</option>
                        <option value="0">Tidak Valid</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary waves-effect waves-light" type="button" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>