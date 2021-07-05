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
                                <form action="" <?= base_url('Super_Admin/tambahPem/'); ?> method="POST">
                                    <input type="hidden" id="id">
                                    <div class="form-group">
                                        <label for="judul">Judul pemberitahuan</label>
                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul'); ?>">
                                        <small id="kontak" class="form-text text-danger ml-2"><?= form_error('judul'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="isi">Isi pemberitahuan</label>
                                        <textarea class="form-control" id="isi" name="isi" rows="3"><?= set_value('isi'); ?></textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace('isi');
                                        </script>
                                        <small id="kontak" class="form-text text-danger ml-2"><?= form_error('isi'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="role_id">Penerima pemberitahuan</label>
                                        <select class="form-control" id="role_id" name="role_id">
                                            <option value="2">Admin</option>
                                            <option value="3">Penduduk</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->