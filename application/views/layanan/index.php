<section class="layanan" id="layanan">
    <div class="container mt-5">

        <div class="row">
            <div class="col-lg">

                <div class="card">
                    <div class="card-header"><i class="fas fa-handshake fa-fw"></i> Layanan</div>
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title text-danger">Perhatian!</h5>
                            <p class="card-text">Sebelum melakukan permohonan layanan administrasi, mohon login terlebih dahulu. Anda bisa melihat layanan administrasi apa saja yang disediakan pemerintah Desa Oelatimo bagi penduduk desa dibawah ini atau langsung melakukan proses login untuk mengakses layanan.</p>
                            <a href="<?= base_url(); ?>Otentifikasi_Penduduk" class="btn btn-primary"><i class="fa fa-unlock-alt"></i> Login Sekarang!</a>
                        </div>
                        <blockquote class="blockquote mb-0">
                            <div class="card-deck">
                                <div class="row">
                                    <?php foreach ($layanan as $l) : ?>
                                        <?php if ($l['id_sk'] == 8) : ?>
                                            <div class="col-md-4">
                                                <div class="card mt-3 text-center">
                                                    <i class="far fa-file-alt fa-5x mt-3"></i>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center"><?= $l['nama']; ?></h5>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="<?= base_url('Surat_Keterangan/skUsaha/' . $l['id_sk']); ?>" class="btn btn-primary"><i class="fa fa-unlock-alt fa-fw"></i> Proses</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="col-md-4">
                                                <div class="card mt-3 text-center">
                                                    <i class="far fa-file-alt fa-5x mt-3"></i>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center"><?= $l['nama']; ?></h5>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="<?= base_url(); ?>Otentifikasi_Penduduk" class="btn btn-primary"><i class="fa fa-unlock-alt fa-fw"></i> Login</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <footer></footer>
                        </blockquote>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>