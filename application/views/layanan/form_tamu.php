<section class="form_skUsaha" id="form_skUsaha">

    <div class="container mt-5">

        <div class="card">
            <div class="card-header">
                Form Tamu Kantor Desa Oelatimo
            </div>
            <div class="card-body">
                <div class="alert alert-danger text-center" role="alert">
                    Pastikan semua data yang anda masukan sudah <b>benar</b>!
                </div>
                <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah-tamu'); ?>"></div>
                <form action="<?= base_url('Layanan/tambahTamu') ?>" method="POST">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" autocomplete="off" class="form-control" id="nama" required value="<?= set_value('nama'); ?>">
                        <small id="nama" class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="number" name="no_hp" autocomplete="off" class="form-control" id="no_hp" required value="<?= set_value('no_hp'); ?>">
                        <small id="no_hp" class="form-text text-danger"><?= form_error('no_hp'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="instansi">Instansi</label>
                        <input type="text" name="instansi" autocomplete="off" class="form-control" id="instansi" required value="<?= set_value('instansi'); ?>">
                        <small id="instansi" class="form-text text-danger"><?= form_error('instansi'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" name="tujuan" autocomplete="off" class="form-control" id="tujuan" required value="<?= set_value('tujuan'); ?>">
                        <small id="tujuan" class="form-text text-danger"><?= form_error('tujuan'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="Pesan">Saran</label>
                        <textarea class="form-control" maxlength="150" id="Pesan" required name="saran" rows="5" placeholder="Maksium 150 Karakter"><?= set_value('saran'); ?></textarea>
                        <small><span class="hitungKarakter">150</span> Karakter Tersisa.</small>
                        <small id="Pesan" class="form-text text-danger"><?= form_error('saran'); ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</section>