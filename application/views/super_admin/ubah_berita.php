                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-info">Form Ubah Berita</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                <?= form_open_multipart('Super_Admin/ubahBerita/' . $berita['id_berita']); ?>

                                <input type="hidden" name="id_berita" value="<?= $berita['id_berita']; ?>">
                                <div class="form-group row">
                                    <label for="judul" class="col-lg-2 col-form-label">Judul Berita</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $berita['judul']; ?>" autocomplete="off">
                                        <?= form_error('judul', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-lg-2 col-form-label">Isi Berita</label>
                                    <div class="col-lg-7">
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $berita['deskripsi']; ?></textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace('deskripsi');
                                        </script>
                                        <?= form_error('deskripsi', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="penulis" class="col-lg-2 col-form-label">Penulis Berita</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $berita['penulis']; ?>" autocomplete="off">
                                        <?= form_error('penulis', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2">Foto</div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img src="<?= base_url('assets/img-berita/') . $berita['foto']; ?>" alt="oelatimo" class="img-thumbnail">
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
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->