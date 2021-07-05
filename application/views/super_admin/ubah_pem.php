                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-info">Form Ubah Pemberitahuan</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                <form action="<?= base_url('Super_Admin/ubahPem/') . $pem['id_pemb']; ?>" method="POST">
                                    <input type="hidden" name="id_pemb" id="id_pemb" value="<?= $pem['id_pemb'] ?>">
                                    <div class="form-group">
                                        <label for="judul">Judul pemberitahuan</label>
                                        <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" value="<?= $pem['judul'] ?>">
                                        <?= form_error('judul', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="isi" class="col-lg-2 col-form-label">Isi Pemberitahuan</label>
                                        <div class="col-lg-7">
                                            <textarea class="form-control" id="isi" name="isi" rows="3"><?= $pem['isi']; ?></textarea>
                                            <script type="text/javascript">
                                                CKEDITOR.replace('isi');
                                            </script>
                                            <?= form_error('isi', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="role_id">Penerima pemberitahuan</label>
                                        <select class="form-control" id="role_id" name="role_id">
                                            <option value="2">Admin</option>
                                            <option value="3">Penduduk</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->