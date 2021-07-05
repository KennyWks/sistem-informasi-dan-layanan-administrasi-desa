<section class="bacaBerita" id="bacaBerita">
    <div class="container mt-5">

        <div class="row">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header"><i class="far fa-newspaper fa-fw"></i> Kabar Desa</div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['judul']; ?></h5>
                                    <p class="card-text"><small class="text-muted"><i class="far fa-calendar-alt fa-fw"></i> <?= tanggal_indonesia(date('Y-m-d', $row['tanggal'])); ?>, <i class="far fa-clock fa-fw"></i> <?= date('H:m', $row['tanggal']); ?> WITA | <a href="<?= base_url(); ?>berita">Kabar Desa</a></small></p>
                                </div>
                                <img src="<?= base_url(); ?>assets/img-berita/<?= $row['foto']; ?>" class="card-img-top" style="width:auto; height:400px;" alt="oelatimo">
                            </div>

                            <div class="row mt-5 mr-2 ml-1 mb-3">
                                <?= $row['deskripsi']; ?>
                            </div>
                            <footer>
                                <div class="row ml-1">

                                    <div class="mr-2">
                                        <a href="<?= base_url('berita/lihatKomentar/' . $row['id_berita']); ?>" class="btn btn-primary"><i class="fas fa-comment-dots fa-fw"></i> <span class="badge badge-secondary"><?= $hitungK; ?></span> Komentar</a>
                                    </div>
                                    <div class="mr-2">Bagikan Berita</div>
                                    <div class="mr-2">
                                        <a class="twitter-share-button" target="_blank" href="https://twitter.com/intent/tweet?text=<?= base_url() ?>berita/detailBerita/<?= $row['id_berita']; ?>">
                                            <i class="fab fa-twitter fa-fw"></i>
                                        </a>
                                    </div>
                                    <div class="mr-2">
                                        <div data-href="http://localhost/desa/berita/detailBerita/<?= $row['id_berita']; ?>" data-layout="button" data-size="large">
                                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url() ?>berita%2FdetailBerita%2F<?= $row['id_berita']; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                                                <i class="fab fa-facebook-f fa-fw"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mr-2">
                                        <a href="https://wa.me/whatsappphonenumber/?text=<?= base_url() ?>berita/detailBerita/<?= $row['id_berita']; ?>" target="_blank" data-action="share/whatsapp/share"> <i class="fab fa-whatsapp fa-fw"></i></a>
                                        </a>
                                    </div>

                            </footer>

                        </blockquote>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <i class="fas fa-comment-dots fa-fw"></i> Kirim komentar tentang berita ini
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <small> Nomor HP Anda tidak akan dipublikasikan. Ruas yang wajib ditandai *</small>
                            <div class="kirim-komentar" data-flashdata="<?= $this->session->flashdata('flash_kirim_komentar'); ?>"></div>
                            <form action="" method="POST">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input type="hidden" name="id_berita" value="<?= $row['id_berita']; ?>">
                                <div class="form-group mt-3">
                                    <textarea class="form-control" required placeholder="Komentar Anda (Maksium 150 Karakter)" name="isi_komentar" maxlength="150" rows="5"><?= set_value('isi_komentar'); ?></textarea>
                                    <small id="isi_komentar" class="form-text text-danger"><?= form_error('isi_komentar'); ?></small>
                                    <small><span class="hitungKarakter">150</span> Karakter Tersisa.</small>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="form-group">
                                            <input type="text" class="form-control" required name="nama" placeholder="Nama*" autocomplete="off" value="<?= set_value('nama'); ?>">
                                            <small id="nama" class="form-text text-danger"><?= form_error('nama'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" value="<?= set_value('email'); ?>">
                                            <small id="hp" class="form-text text-danger"><?= form_error('email'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="form-group">
                                            <input type="text" class="form-control" required minlength="11" name="hp" placeholder="Nomor HP*" autocomplete="off" value="<?= set_value('hp'); ?>">
                                            <small id="hp" class="form-text text-danger"><?= form_error('hp'); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <p class="h6">Tidak bisa melihat karakter? Klik <a href="javascript:void(0);" class="refreshCaptcha2">disini</a> untuk muat ulang.</p>
                                    <div class="form-group col-md-6">
                                        <p class="recaptcha_image" id="captImgBerita"><?= $captchaImg; ?></p>
                                        <input type="text" name="captcha" autocomplete="off" class="form-control" id="captcha" placeholder="Isi karakter di atas pada kolom ini." required>
                                        <small id="kontak" class="form-text text-danger ml-2"><?= form_error('captcha'); ?></small>
                                    </div>
                                </div>
                                <button class="btn btn-primary" name="komentar" type="submit">Komentar</button>
                            </form>
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