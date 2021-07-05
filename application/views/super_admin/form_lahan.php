                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md">

                            <!-- Collapsable Card Example -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-info">Form Lahan</h6>
                                    <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah-lahan'); ?>"></div>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_lahan" value="<?= $lahan['id_lahan']; ?>">
                                            <div class="form-group">
                                                <label for="wilayah">Luas Wilayah</label>
                                                <input type="text" class="form-control" id="wilayah" name="wilayah" value="<?= $lahan['wilayah']; ?>" autocomplete="off">
                                                <?= form_error('wilayah', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="pemukiman">Luas Lahan Pemukiman</label>
                                                <input type="text" class="form-control" id="pemukiman" name="pemukiman" value="<?= $lahan['pemukiman']; ?>" autocomplete="off">
                                                <?= form_error('pemukiman', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="pertanian">Luas Lahan Pertanian</label>
                                                <input type="text" class="form-control" id="pertanian" name="pertanian" value="<?= $lahan['pertanian']; ?>" autocomplete="off">
                                                <?= form_error('pertanian', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="perkebunan">Luas Lahan Perkebunan</label>
                                                <input type="text" class="form-control" id="perkebunan" name="perkebunan" value="<?= $lahan['perkebunan']; ?>" autocomplete="off">
                                                <?= form_error('perkebunan', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="tambak">Luas Lahan Tambak Ikan</label>
                                                <input type="text" class="form-control" id="tambak" name="tambak" value="<?= $lahan['tambak']; ?>" autocomplete="off">
                                                <?= form_error('tambak', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="hutan">Luas Lahan Hutan</label>
                                                <input type="text" class="form-control" id="hutan" name="hutan" value="<?= $lahan['hutan']; ?>" autocomplete="off">
                                                <?= form_error('hutan', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                            </div>

                                            <div class="form-group">
                                                <label for="embung">Luas Danau/Waduk/Embung/Situ</label>
                                                <input type="text" class="form-control" id="embung" name="embung" value="<?= $lahan['embung']; ?>" autocomplete="off">
                                                <?= form_error('embung', '<small class="form-text text-danger pl-2">', '</small>'); ?>
                                            </div>

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