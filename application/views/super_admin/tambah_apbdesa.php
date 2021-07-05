                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">

                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-info">Form Tambah Data APBDesa</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                <?= $this->session->flashdata('error-apbdesa'); ?>
                                <form method="POST" action="<?= base_url('Super_Admin/tambahAPBDesa'); ?>">
                                    <input type="hidden" name="id_apbdesa">
                                    <div class="form-group">
                                        <label for="pendapatan">Pendapatan</label>
                                        <small id="pendapatan" class="form-text text-primary">Item Ini Diisi Sesuai Dengan Jumlah Anggaran Pendapatan Pada APBDesa Bukan Realisasi</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input type="text" class="form-control uang" id="pendapatan" name="pendapatan" autocomplete="off" value="<?= set_value('pendapatan'); ?>">
                                        </div>
                                        <small id="pendapatan" class="form-text text-danger"><?= form_error('pendapatan'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="pasli">Pendapatan (Pendapatan Asli Desa)</label>
                                        <small id="pasli" class="form-text text-primary">Item Ini Diisi Sesuai Dengan Jumlah Pendapatan Asli Desa Pada APBDesa Realisasi</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input type="text" class="form-control uang" id="pasli" name="pasli" autocomplete="off" value="<?= set_value('pasli'); ?>">
                                        </div>
                                        <small id="pasli" class="form-text text-danger"><?= form_error('pasli'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="transfer">Pendapatan (Transfer)</label>
                                        <small id="transfer" class="form-text text-primary">Item Ini Diisi Sesuai Dengan Jumlah Pendapatan Transfer Pada APBDesa Realisasi</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input type="text" class="form-control uang" id="transfer" name="transfer" autocomplete="off" value="<?= set_value('transfer'); ?>">
                                        </div>
                                        <small id="transfer" class="form-text text-danger"><?= form_error('transfer'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="plain">Pendapatan Lain Desa</label>
                                        <small id="plain" class="form-text text-primary">Item Ini Diisi Sesuai Dengan Jumlah Pendapatan Lain Desa Pada APBDesa Realisasi</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input type="text" class="form-control uang" id="plain" name="plain" autocomplete="off" value="<?= set_value('plain'); ?>">
                                        </div>
                                        <small id="plain" class="form-text text-danger"><?= form_error('plain'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="belanja">Belanja</label>
                                        <small id="belanja" class="form-text text-primary">Item Ini Diisi Sesuai Dengan Jumlah Belanja Anggaran Pada APBDesa Bukan Realisasi</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input type="text" class="form-control uang" id="belanja" name="belanja" autocomplete="off" value="<?= set_value('belanja'); ?>">
                                        </div>
                                        <small id="belanja" class="form-text text-danger"><?= form_error('belanja'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="ppdb">Pelaksanaan Pembangunan Desa</label>
                                        <small id="ppdb" class="form-text text-primary">Item Ini Diisi Sesuai Dengan Jumlah Anggaran Pelaksanaan Pembangunan Desa Pada APBDesa Realisasi</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input type="text" class="form-control uang" id="ppdb" name="ppdb" autocomplete="off" value="<?= set_value('ppdb'); ?>">
                                        </div>
                                        <small id="ppdb" class="form-text text-danger"><?= form_error('ppdb'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="ppdp">Penyelenggaraan Pemerintahan Desa</label>
                                        <small id="ppdp" class="form-text text-primary">Item Ini Diisi Sesuai Dengan Jumlah Anggaran Penyelenggaraan Pemerintahan Desa Pada APBDesa Realisasi</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input type="text" class="form-control uang" id="ppdp" name="ppdp" autocomplete="off" value="<?= set_value('ppdp'); ?>">
                                        </div>
                                        <small id="ppdp" class="form-text text-danger"><?= form_error('ppdp'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="pmd">Pemberdayaan Masyarakat Desa</label>
                                        <small id="pmd" class="form-text text-primary">Item Ini Diisi Sesuai Dengan Jumlah Anggaran Pemberdayaan Masyarakat Desa Pada APBDesa Realisasi</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input type="text" class="form-control uang" id="pmd" name="pmd" autocomplete="off" value="<?= set_value('pmd'); ?>">
                                        </div>
                                        <small id="pmd" class="form-text text-danger"><?= form_error('pmd'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="pkd">Pembinaan Kemasyarakatan Desa</label>
                                        <small id="pkd" class="form-text text-primary">Item Ini Diisi Sesuai Dengan Jumlah Anggaran Pembinaan Kemasyarakatan Desa Pada APBDesa Realisasi</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input type="text" class="form-control uang" id="pkd" name="pkd" autocomplete="off" value="<?= set_value('pkd'); ?>">
                                        </div>
                                        <small id="pkd" class="form-text text-danger"><?= form_error('pkd'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="btt">Belanja Tak Terduga</label>
                                        <small id="btt" class="form-text text-primary">Item Ini Diisi Sesuai Dengan Jumlah Anggaran Belanja Tak Terduga Pada APBDesa Realisasi</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input type="text" class="form-control uang" id="btt" name="btt" autocomplete="off" value="<?= set_value('btt'); ?>">
                                        </div>
                                        <small id="btt" class="form-text text-danger"><?= form_error('btt'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="pembiayaan">Pembiayaan</label>
                                        <small id="pembiayaan" class="form-text text-primary">Item Ini Diisi Sesuai Dengan Jumlah Anggaran Pembiayaan Pada APBDesa Realisasi</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input type="text" class="form-control uang" id="pembiayaan" name="pembiayaan" autocomplete="off" value="<?= set_value('pembiayaan'); ?>">
                                        </div>
                                        <small id="pembiayaan" class="form-text text-danger"><?= form_error('pembiayaan'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="kas">Kas</label>
                                        <small id="kas" class="form-text text-primary">Item Ini Diisi Sesuai Dengan Jumlah Kas Pada APBDesa Realisasi</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input type="text" class="form-control uang" id="kas" name="kas" autocomplete="off" value="<?= set_value('kas'); ?>">
                                        </div>
                                        <small id="kas" class="form-text text-danger"><?= form_error('kas'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun">Tahun Anggaran</label>
                                        <input type="text" class="form-control" maxlength="4" minlength="4" id="tahun" name="tahun" autocomplete="off" value="<?= set_value('tahun'); ?>">
                                        <small id="tahun" class="form-text text-danger"><?= form_error('tahun'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="anggaran">Jenis APBDesa</label>
                                        <select class="form-control" id="anggaran" name="anggaran">
                                            <option value="A">Awal</option>
                                            <option value="P">Perubahan</option>
                                        </select>
                                        <small id="anggaran" class="form-text text-danger"><?= form_error('anggaran'); ?></small>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->