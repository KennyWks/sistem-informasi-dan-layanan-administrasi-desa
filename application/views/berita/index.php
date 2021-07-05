<section class="berita" id="berita">
    <div class="container mt-5">

        <div class="row">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header"><i class="far fa-newspaper fa-fw"></i> <?= $total_rows; ?> Berita</div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">

                            <form action="<?= base_url(); ?>berita" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari berita..." name="keyword" autocomplete="off">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>

                            <?php if (empty($rows)) : ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    Maaf, berita yang anda cari tidak ditemukan!
                                </div>
                            <?php endif; ?>

                            <?php foreach ($rows as $row) : ?>
                                <div class="card mb-3">
                                    <div class="row no-gutters">
                                        <div class="col-lg-4">
                                            <a href="<?= base_url(); ?>assets/img-berita/<?= $row['foto']; ?>" target="_blank">
                                                <img src="<?= base_url(); ?>assets/img-berita/<?= $row['foto']; ?>" class="card-img" alt="Oelatimo">
                                            </a>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card-body">
                                                <a href="<?= base_url(); ?>berita/detailBerita/<?= $row['id_berita']; ?>">
                                                    <h5 class="card-title"><?= word_limiter($row['judul'], 5);  ?></h5>
                                                </a>
                                                <p class="card-text"><small class="text-muted"><i class="far fa-calendar-alt fa-fw"></i> <?= tanggal_indonesia(date('Y-m-d', $row['tanggal'])); ?>, <i class="far fa-clock fa-fw"></i> <?= date('H:m', $row['tanggal']); ?> WITA | <a href="<?= base_url(); ?>berita">Kabar Desa</a></small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <?= $this->pagination->create_links(); ?>

                            <footer></footer>
                        </blockquote>
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