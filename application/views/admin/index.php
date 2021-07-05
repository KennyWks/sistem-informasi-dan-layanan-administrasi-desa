                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-info">Halaman Profil <?= word_limiter($user['nama'], 1); ?></h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">

                                <?php if ($this->session->flashdata('error')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $this->session->flashdata('error'); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah_user'); ?>"></div>
                                <?= form_open_multipart('Admin/'); ?>

                                <div class="form-group row">
                                    <label for="email" class="col-lg-2 col-form-label">Email</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-lg-2 col-form-label">Nama</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" required autocomplete="off" id="nama" name="nama" value="<?= $user['nama']; ?>">
                                        <?= form_error('nama', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2">Foto</div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img src="<?= base_url('assets/img-admin/') . $user['foto']; ?>" alt="oelatimo" class="img-thumbnail">
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                                    <label for="foto" class="custom-file-label"></label>
                                                </div>
                                                <label class="mt-2">Catatan :</label>
                                                <div class="text-danger mt-0">
                                                    <label>Ukuran file maksimal 1 MB.</>
                                                        <label>Format file yang diterima : gif / jpg / png</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-success mb-1">Ubah Profil</button>
                                        </form>
                                        <a href="<?= base_url('admin/ubahPassword'); ?>" class="btn btn-success">Ubah Password</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->