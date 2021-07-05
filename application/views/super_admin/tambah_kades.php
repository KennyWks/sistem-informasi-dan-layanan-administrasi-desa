                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-info">Form Tambah Kades</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">

                                <?= form_open_multipart('Super_Admin/tambahKades'); ?>
                                <div class="form-group row">
                                    <label for="nama" class="col-lg-2 col-form-label">Nama</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" autocomplete="off">
                                        <?= form_error('nama', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jabatan" class="col-lg-2 col-form-label">Jabatan</label>
                                    <div class="col-lg-7">
                                        <select class="form-control" id="jabatan" name="jabatan">
                                            <?php foreach ($jabatan as $j) : ?>
                                                <option value="<?= $j['kode_jabatan']; ?>"><?= $j['deskripsi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2">Periode</div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="awal" name="awal" placeholder="Tahun Awal" autocomplete="off" value="<?= set_value('awal'); ?>">
                                                    <?= form_error('awal', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="akhir" name="akhir" placeholder="Tahun Akhir" autocomplete="off" value="<?= set_value('akhir'); ?>">
                                                    <?= form_error('akhir', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-2">Foto</div>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                                    <label for="foto" class="custom-file-label"></label>
                                                </div>
                                                <label class="mt-2">Catatan :</label>
                                                <div class="text-danger mt-0">
                                                    <label>Ukuran file maksimal 250 Kb.</>
                                                        <label>Format file yang diterima : gif / jpg / png</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pidato" class="col-lg-2 col-form-label">Pidato</label>
                                    <div class="col-lg-7">
                                        <textarea class="form-control" id="pidato" name="pidato" rows="3"><?= set_value('pidato'); ?></textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace('pidato');
                                        </script>
                                        <?= form_error('pidato', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->