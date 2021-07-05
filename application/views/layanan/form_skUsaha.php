<section class="form_skUsaha" id="form_skUsaha">

    <div class="container mt-5">

        <div class="card">
            <div class="card-header">
                Form Pengajuan SK Usaha
            </div>
            <div class="card-body">
                <div class="alert alert-danger text-center" role="alert">
                    Pastikan semua data yang anda masukan sudah <b>benar</b>!
                </div>
                <form action="<?= base_url('Surat_Keterangan/skUsaha/' . $nomorKab['id_sk']); ?>" method="POST">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nik">NIK</label>
                            <input type="number" maxlength="16" minlength="16" autocomplete="off" autofocus class="form-control" id="nik" name="nik" required placeholder="Nomor Induk Kependudukan" value="<?= set_value('nik'); ?>">
                            <small id="nik" class="form-text text-danger ml-2"><?= form_error('nik'); ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama">Nama Pemilik Usaha</label>
                            <input type="text" class="form-control" id="nama" autocomplete="off" name="nama" required placeholder="Nama Pemilik Usaha" value="<?= set_value('nama'); ?>">
                            <small id="nama" class="form-text text-danger ml-2"><?= form_error('nama'); ?></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tempat_lahir">Tempat Lahir</label><br>
                            <input type="text" class="form-control" autocomplete="off" id="tempat_lahir" required name="tempat_lahir" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir'); ?>">
                            <small id="tempat_lahir" class="form-text text-danger ml-2"><?= form_error('tempat_lahir'); ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_lahir">Tanggal Lahir</label><br>
                            <input type="date" class="form-control" id="tgl_lahir" required autocomplete="off" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>" max="<?php echo date("Y-m-d"); ?>">
                            <small id="tgl_lahir" class="form-text text-danger ml-2"><?= form_error('tgl_lahir'); ?></small>
                        </div>
                    </div>
                    <label>Alamat</label>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" autocomplete="off" name="Arumah" required placeholder="Nama Jalan atau Nomor Rumah" value="<?= set_value('Arumah'); ?>">
                            <small id="Arumah" class="form-text text-danger ml-2"><?= form_error('Arumah'); ?></small>
                        </div>
                        <div class="form-group col-md-1">
                            <input type="number" autocomplete="off" class="form-control" name="Art" required placeholder="RT" value="<?= set_value('Art'); ?>">
                            <small id="Art" class="form-text text-danger ml-2"><?= form_error('Art'); ?></small>
                        </div>
                        <div class="form-group col-md-1">
                            <input type="number" autocomplete="off" class="form-control" name="Arw" required placeholder="RW" value="<?= set_value('Arw'); ?>">
                            <small id="Arw" class="form-text text-danger ml-2"><?= form_error('Arw'); ?></small>
                        </div>
                        <div class="form-group col-md-2">
                            <select name="deskel" class="form-control pilihDesaKel">
                                <option value="">Pilih Desa/Kelurahan</option>
                                <option value="Desa">Desa</option>
                                <option value="Kelurahan">Kelurahan</option>
                            </select>
                            <small id="deskel" class="form-text text-danger ml-2"><?= form_error('deskel'); ?></small>
                            <div class="Adeskel mt-2">
                                <input type="text" autocomplete="off" class="form-control" id="Adeskel" name="Adeskel" required placeholder="Pilih" value="<?= set_value('Adeskel'); ?>">
                                <small id="Adeskel" class="form-text text-danger ml-2"><?= form_error('Adeskel'); ?></small>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control Akec" autocomplete="off" name="Akec" required placeholder="Nama Kecamatan" value="<?= set_value('Akec'); ?>">
                            <small id="Akec" class="form-text text-danger ml-2"><?= form_error('Akec'); ?></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pekerjaan">Pekerjaan</label>
                            <select id="pekerjaan" class="form-control" name="pekerjaan" required>
                                <option value="" selected>Pilih</option>
                                <?php foreach ($pekerjaan as $p) : ?>
                                    <option value="<?= $p['id_pekerjaan']; ?>"><?= $p['pekerjaan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small id="pekerjaan" class="form-text text-danger ml-2"><?= form_error('pekerjaan'); ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="agama">Agama</label>
                            <select id="agama" name="agama" class="form-control" required>
                                <option value="" selected>Pilih</option>
                                <?php foreach ($agama as $rowA) : ?>
                                    <option value="<?= $rowA; ?>"><?= $rowA; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small id="agama" class="form-text text-danger ml-2"><?= form_error('agama'); ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bidang">Bidang Usaha</label>
                        <input type="text" class="form-control" id="bidang" name="bidang" autocomplete="off" required placeholder="Bidang Usaha" value="<?= set_value('bidang'); ?>">
                        <small id="bidang" class="form-text text-danger ml-2"><?= form_error('bidang'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi Usaha Di Desa Oelatimo</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" autocomplete="off" required placeholder="Lokasi Usaha Di Desa Oelatimo" value="<?= set_value('lokasi'); ?>">
                        <small id="lokasi" class="form-text text-danger ml-2"><?= form_error('lokasi'); ?></small>
                    </div>
                    <p class="h6">Tidak bisa melihat karakter? Klik <a href="javascript:void(0);" class="refreshCaptcha3">disini</a> untuk muat ulang.</p>
                    <div class="form-group col-md-4">
                        <p class="recaptcha_image" id="captskUsaha"><?= $captchaImg; ?></p>
                        <input type="text" name="captcha" autocomplete="off" required class="form-control" id="captcha" placeholder="Isi karakter di atas pada kolom ini.">
                        <small id="captcha" class="form-text text-danger ml-2"><?= form_error('captcha'); ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Proses</button>
                </form>
            </div>
        </div>
    </div>

</section>