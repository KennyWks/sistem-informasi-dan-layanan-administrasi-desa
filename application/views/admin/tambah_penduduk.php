                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">

                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-info">Form Tambah Penduduk</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                <form method="POST" action="<?= base_url('admin/tambahPenduduk'); ?>">
                                    <input type="hidden" name="id_peddk">
                                    <div class="form-group">
                                        <label for="no_kk">NO KK</label>
                                        <input type="number" class="form-control" id="no_kk" name="no_kk" autocomplete="off" required minlength="16" autofocus maxlength="16" value="<?= set_value('no_kk'); ?>">
                                        <small id="no_kk" class="form-text text-danger"><?= form_error('no_kk'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="number" class="form-control" id="nik" name="nik" required minlength="16" maxlength="16" autocomplete="off" value="<?= set_value('nik'); ?>">
                                        <small id="nik" class="form-text text-danger"><?= form_error('nik'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= set_value('nama'); ?>">
                                        <small id="nama" class="form-text text-danger"><?= form_error('nama'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="rt">RT</label>
                                        <select class="form-control" id="rt" name="rt">
                                            <option value="">Pilih</option>
                                            <?php foreach ($rowRT as $rt) : ?>
                                                <option value="<?= $rt['rt']; ?>">RT <?= $rt['rt']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small id="rt" class="form-text text-danger"><?= form_error('rt'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="rw">RW</label>
                                        <select class="form-control" id="rw" name="rw">
                                            <option value="">Pilih</option>
                                            <?php foreach ($rowRW as $rw) : ?>
                                                <?php if ($rw['rw'] == $penduduk['rw']) : ?>
                                                    <option value="<?= $rw['rw']; ?>" selected>RW <?= $rw['rw']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $rw['rw']; ?>">RW <?= $rw['rw']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <small id="rw" class="form-text text-danger"><?= form_error('rw'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="dusun">Dusun</label>
                                        <select class="form-control" id="dusun" name="dusun">
                                            <option value="">Pilih</option>
                                            <?php foreach ($rowDusun as $dusun) : ?>
                                                <option value="<?= $dusun['dusun']; ?>">Dusun <?= $dusun['dusun']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small id="dusun" class="form-text text-danger"><?= form_error('dusun'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select class="form-control" id="jk" name="jk">
                                            <option value="">Pilih</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                        <small id="jk" class="form-text text-danger"><?= form_error('jk'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="hubungan">Hubungan</label>
                                        <select class="form-control" id="hubungan" name="hubungan">
                                            <option value="">Pilih</option>
                                            <?php foreach ($hubungan as $h) : ?>
                                                <option value="<?= $h['kode_hubungan']; ?>"><?= $h['deskripsi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small id="hubungan" class="form-text text-danger"><?= form_error('hubungan'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required autocomplete="off" value="<?= set_value('tempat_lahir'); ?>">
                                        <small id="tempat_lahir" class="form-text text-danger"><?= form_error('tempat_lahir'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lhir">Tanggal Lahir</label><br>
                                        <input type="date" class="form-control" id="tgl_lhir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="umur">Umur</label>
                                        <input type="number" class="form-control" id="umur" name="umur" autocomplete="off" required value="<?= set_value('umur'); ?>">
                                        <small id="umur" class="form-text text-danger"><?= form_error('umur'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="">Pilih</option>
                                            <?php foreach ($status as $s) : ?>
                                                <option value="<?= $s; ?>"><?= $s; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small id="status" class="form-text text-danger"><?= form_error('status'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="suku">Suku</label>
                                        <input type="text" class="form-control" id="suku" name="suku" required autocomplete="off" value="<?= set_value('suku'); ?>">
                                        <small id="suku" class="form-text text-danger"><?= form_error('suku'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select class="form-control" id="agama" name="agama">
                                            <option value="">Pilih</option>
                                            <?php foreach ($agama as $g) : ?>
                                                <option value="<?= $g; ?>"><?= $g; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small id="agama" class="form-text text-danger"><?= form_error('agama'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan Terakhir</label>
                                        <select class="form-control" id="pendidikan" name="pendidikan">
                                            <option value="">Pilih</option>
                                            <?php foreach ($pendidikan as $pd) : ?>
                                                <option value="<?= $pd['kode_pendidikan']; ?>"><?= $pd['deskripsi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small id="pendidikan" class="form-text text-danger"><?= form_error('pendidikan'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <select class="form-control" id="pekerjaan" name="pekerjaan">
                                            <option value="">Pilih</option>
                                            <?php foreach ($pekerjaan as $pk) : ?>
                                                <option value="<?= $pk['pekerjaan']; ?>"><?= $pk['pekerjaan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small id="pekerjaan" class="form-text text-danger"><?= form_error('pekerjaan'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="ket">Keterangan</label>
                                        <input type="text" class="form-control" id="ket" name="ket" autocomplete="off" value="<?= set_value('ket'); ?>">
                                        <small id="ket" class="form-text text-danger"><?= form_error('ket'); ?></small>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->