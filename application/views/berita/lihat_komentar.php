<section class="lihatKomentar" id="lihatKomentar">
    <div class="container mt-5">

        <div class="row">
            <div class="id_berita" data-id="<?= $row['id_berita']; ?>"></div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header"><a href="<?= base_url(); ?>berita/detailBerita/<?= $row['id_berita']; ?>" class="btn btn-outline-primary"><i class="fas fa-angle-left"></i> Kembali ke artikel</a></div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <div class="text-center">
                                <div class="h3 text-primary"><?= $row['judul']; ?></div>
                                <div><small class="font-weight-bold"><?= $row['penulis']; ?> | <a class="text-decoration-none" href="<?= base_url(); ?>berita">Kabar Desa</a></small></div>
                                <div><small class="text-muted"><?= tanggal_indonesia_lengkap(date('Y-m-d', $row['tanggal'])); ?> | <?= date('H:m', $row['tanggal']); ?> WITA</small></div>
                            </div>
                            <br>
                            <div style="height: 10px; width:auto; background-color:#eee"></div>
                            <br>
                            <div class="row">
                                <div class="col-md-9 mb-2">
                                    <small class="font-weight-bold"><?= $hitungK; ?> Komentar</small>
                                </div>
                                <div class="col-md-2">
                                    <div class="dropdown">
                                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Urutkan
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item baru" type="button">Komentar Baru</button>
                                            <button class="dropdown-item lama" type="button">Komentar Lama</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr class="my-3">
                            <div class="card_komentar"></div>
                            <div class="pagination_link"></div>
                        </blockquote>
                        <footer></footer>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-1">
                <!-- berita populer -->
                <div class="card">
                    <i class="far fa-newspaper fa-5x text-center pt-2"></i>
                    <div class="card-body">
                        <h3 class="card-title text-center">Berita Terpopuler</h3>
                        <?php $i = 1;
                        foreach ($beritaTerpopuler as $beritaP) : ?>
                            <div class="row">
                                <div class="col-lg">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex left-content-between align-items-center">
                                            <span class="badge badge-primary badge-pill mr-2"><?= $i++; ?></span>
                                            <a class="text-dark" href="<?= base_url(); ?>/berita/detailBerita/<?= $beritaP['id_berita'] ?>">
                                                <?= word_limiter($beritaP['judul'], 5); ?>.
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- berita acak -->
                <div class="card mt-2">
                    <i class="far fa-newspaper fa-5x text-center pt-2"></i>
                    <div class="card-body">
                        <h3 class="card-title text-center">Berita Acak</h3>
                        <?php $i = 1;
                        foreach ($randBerita as $berita) : ?>
                            <div class="row">
                                <div class="col-lg">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex left-content-between align-items-center">
                                            <span class="badge badge-primary badge-pill mr-2"><?= $i++; ?></span>
                                            <a class="text-dark" href="<?= base_url(); ?>/berita/detailBerita/<?= $berita['id_berita'] ?>">
                                                <?= word_limiter($berita['judul'], 5); ?>.
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>