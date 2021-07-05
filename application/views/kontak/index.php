<section class="kontak" id="kontak">
    <div class="container mt-5">

        <div class="row">

            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-envelope fa-lg"></i> Hubungi Kami</h3>
                    </div>
                    <div class="kirim-pesan" data-flashdata="<?= $this->session->flashdata('flash_kirim'); ?>"></div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">

                            <form action="" method="POST">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="NDepan">Nama Depan</label>
                                        <input type="text" name="NDepan" autocomplete="off" class="form-control" id="NDepan" required value="<?= set_value('NDepan'); ?>">
                                        <small id="Ndepan" class="form-text text-danger"><?= form_error('NDepan'); ?></small>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="NBelakang">Nama Belakang</label>
                                        <input type="text" name="NBelakang" autocomplete="off" class="form-control" id="NBelakang" required value="<?= set_value('NBelakang'); ?>">
                                        <small id="NBelakang" class="form-text text-danger"><?= form_error('NBelakang'); ?></small>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="Email">Email</label>
                                        <input type="email" name="Email" autocomplete="off" class="form-control" id="Email" value="<?= set_value('Email'); ?>">
                                        <small id="Email" class="form-text text-danger"><?= form_error('Email'); ?></small>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="NKontak">Nomor Kontak</label>
                                        <input type="number" name="NKontak" maxlength="13" minlength="11" required autocomplete="off" class="form-control" id="NKontak" value="<?= set_value('NKontak'); ?>">
                                        <small id="NKontak" class="form-text text-danger"><?= form_error('NKontak'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Pesan">Isi pesan Anda</label>
                                    <textarea class="form-control" maxlength="150" id="Pesan" required name="Pesan" rows="5" placeholder="Maksium 150 Karakter"><?= set_value('Pesan'); ?></textarea>
                                    <small><span class="hitungKarakter">150</span> Karakter Tersisa.</small>
                                    <small id="Pesan" class="form-text text-danger"><?= form_error('Pesan'); ?></small>
                                </div>
                                <div class="form-row">
                                    <p class="h6">Tidak bisa melihat karakter? Klik <a href="javascript:void(0);" class="refreshCaptcha1">disini</a> untuk muat ulang.</p>
                                    <div class="form-group col-lg-7">
                                        <p class="recaptcha_image" id="captImgKontak"><?= $captchaImg; ?></p>
                                        <input type="text" name="captcha" autocomplete="off" required class="form-control" id="captcha" placeholder="Isi karakter di atas pada kolom ini.">
                                        <small id="kontak" class="form-text text-danger ml-2"><?= form_error('captcha'); ?></small>
                                    </div>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                            </form>

                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 mt-1">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-address-book fa-fw"></i> Kontak</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2 mb-4">
                            <div class="col-lg">Jl. Sulamu No. Kec. Kupang Timur, Kab. Kupang, Nusa Tenggara Timur, Indonesia.</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg">Kode Pos 554547</div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg">+6282146807002 | info_Oelatimo@gmail.com</div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <a href="#" target="_blank">
                                    <i class="fab fa-twitter fa-2x"></i>
                                </a>&nbsp;&nbsp;&nbsp;
                                <a href="#" target="_blank">
                                    <i class="fab fa-facebook-f fa-2x"></i>
                                </a>&nbsp;&nbsp;&nbsp;
                                <a href="https://api.whatsapp.com/send?phone=+6281247569523>&text=Halo Admin." target="_blank">
                                    <i class="fab fa-whatsapp fa-2x"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>