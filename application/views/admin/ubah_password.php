                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Form Ubah Password</h1>
                    <div class="error" data-flashdata="<?= $this->session->flashdata('passSalah'); ?>"></div>
                    <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubahPass'); ?>"></div>

                    <div class="row">
                        <div class="col-lg-6">
                            <form action="<?= base_url('admin/ubahPassword'); ?>" method="POST">
                                <div class="form-group">
                                    <label for="passLama">Password Lama</label>
                                    <input type="password" class="form-control" id="passLama" name="passLama" required>
                                    <?= form_error('passLama', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password1">Password Baru</label>
                                    <input type="password" class="form-control" id="password1" name="password1" minlength="8" required>
                                    <?= form_error('password1', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" id="password2" name="password2" required minlength="8">
                                    <?= form_error('password2', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                </div>
                <!-- End of Main Content -->