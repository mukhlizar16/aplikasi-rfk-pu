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
                            <table class="table table-hover table-bordered">
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
                                                <button class="btn btn-sm btn-warning">Edit</button>
                                                <button class="btn btn-sm btn-success">Validasi</button>
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