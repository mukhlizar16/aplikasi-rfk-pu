<div class="container-fluid">
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <blockquote class="blockquote font-size-14 mb-0">
                                <p>Data penetapan konwas terhadap paket pekerjaan saat ini.</p>
                                <footer class="blockquote-footer font-size-12 mt-0">
                                    Berdasarkan jumlah konsultan/pengawas
                                </footer>
                            </blockquote>
                        </div>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="table-konwas">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Pekerjaan</th>
                                        <th class="text-center" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($konwas as $item) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item->nama ?></td>
                                            <td><?= $item->uraian_pekerjaan ?></td>
                                            <td class="text-center">
                                                <a href="<?= site_url('admin/detil_validasi/') . base64_encode($item->id) ?>" class="btn btn-primary btn-sm">Lihat</a>
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