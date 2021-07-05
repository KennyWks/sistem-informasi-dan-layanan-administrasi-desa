<section class="pemerintah" id="pemerintah">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Pemerintah</div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">

                    <div class="row">
                        <?php foreach ($rows_kades as $row_kades) : ?>
                            <div class="col-md">
                                <div class="card mb-3">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="<?= base_url(); ?>assets/img-kades/<?= $row_kades['foto']; ?>" class="card-img" alt="oelatimo">
                                            <h5 class="card-title text-center mt-4"><?= $row_kades['nama']; ?></h5>
                                            <p class="card-text text-center"><small class="text-muted"><?= $row_kades['awal']; ?> - <?= $row_kades['akhir']; ?></small></p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <?= $row_kades['pidato']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <footer></footer>
                </blockquote>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-header">Perangkat Desa</div>
            <div class="card-body">
                <blockquote class="blockquote">
                    <div class="row">
                        <?php foreach ($row_perangkat as $row) : ?>
                            <div class="col-md-4 px-1">
                                <div class="card mt-3 text-center">
                                    <i class="fas fa-user-tie fa-4x"></i>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['nama']; ?></h5>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted"><?= $row['jabatan']; ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <?php foreach ($row_dusun as $row) : ?>
                            <div class="col-md-4 px-1">
                                <div class="card mt-3 text-center">
                                    <i class="fas fa-user-tie fa-4x"></i>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['nama']; ?></h5>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted"><?= $row['jabatan']; ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </blockquote>
                <footer></footer>
            </div>
        </div>

    </div>
</section>