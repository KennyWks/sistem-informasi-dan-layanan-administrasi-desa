                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">

                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-info">Form Ubah Penduduk</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">

                                <form method="POST" action="<?= base_url('admin/ubahPenduduk/') . $penduduk['id_peddk']; ?>">
                                    <input type="hidden" name="id_peddk" value="<?= $penduduk['id_peddk']; ?>">
                                    <div class="form-group">
                                        <label for="no_kk">NO KK</label>
                                        <input type="number" class="form-control" id="no_kk" name="no_kk" value="<?= $penduduk['no_kk']; ?>" maxlength="16" minlength="16" autocomplete="off" required>
                                        <small id="no_kk" class="form-text text-danger"><?= form_error('no_kk'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="number" class="form-control" id="nik" name="nik" value="<?= $penduduk['nik']; ?>" maxlength="16" minlength="16" required autocomplete="off">
                                        <small id="nik" class="form-text text-danger"><?= form_error('nik'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $penduduk['nama']; ?>" required autocomplete="off">
                                        <small id="nama" class="form-text text-danger"><?= form_error('nama'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="rt">RT</label>
                                        <select class="form-control" id="rt" name="rt">
                                            <?php foreach ($rowRT as $rt) : ?>
                                                <?php if ($rt['rt'] == $penduduk['rt']) : ?>
                                                    <option value="<?= $rt['rt']; ?>" selected>RT <?= $rt['rt']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $rt['rt']; ?>">RT <?= $rt['rt']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="rw">RW</label>
                                        <select class="form-control" id="rw" name="rw">
                                            <?php foreach ($rowRW as $rw) : ?>
                                                <?php if ($rw['rw'] == $penduduk['rw']) : ?>
                                                    <option value="<?= $rw['rw']; ?>" selected>RW <?= $rw['rw']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $rw['rw']; ?>">RW <?= $rw['rw']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dusun">Dusun</label>
                                        <select class="form-control" id="dusun" name="dusun">
                                            <?php foreach ($rowDusun as $dusun) : ?>
                                                <?php if ($dusun['dusun'] == $penduduk['dusun']) : ?>
                                                    <option value="<?= $dusun['dusun']; ?>" selected>Dusun <?= $dusun['dusun']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $dusun['dusun']; ?>">Dusun <?= $dusun['dusun']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select class="form-control" id="jk" name="jk">
                                            <?php if ($penduduk['jk'] == 'L') : ?>
                                                <option value="L" selected>Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            <?php else : ?>
                                                <option value="P" selected>Perempuan</option>
                                                <option value="L">Laki-laki</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="hubungan">Hubungan</label>
                                        <select class="form-control" id="hubungan" name="hubungan">
                                            <?php foreach ($hubungan as $h) : ?>
                                                <?php if ($h['kode_hubungan'] == $penduduk['hubungan']) : ?>
                                                    <option value="<?= $h['kode_hubungan']; ?>" selected><?= $h['deskripsi']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $h['kode_hubungan']; ?>"><?= $h['deskripsi']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $penduduk['tempat_lahir']; ?>" autocomplete="off" required>
                                        <small id="tempat_lahir" class="form-text text-danger"><?= form_error('tempat_lahir'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lhir">Tanggal Lahir</label><br>
                                        <input type="date" class="form-control" id="tgl_lhir" name="tgl_lahir" value="<?= $penduduk['tgl_lahir']; ?>" required>
                                        <small id="tgl_lahir" class="form-text text-danger"><?= form_error('tgl_lahir'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="umur">Umur</label>
                                        <input type="number" class="form-control" id="umur" name="umur" value="<?= $penduduk['umur']; ?>" required autocomplete="off">
                                        <small id="umur" class="form-text text-danger"><?= form_error('umur'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <?php foreach ($status as $s) : ?>
                                                <?php if ($s == $penduduk['status']) : ?>
                                                    <option value="<?= $s; ?>" selected><?= $s; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $s; ?>"><?= $s; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="suku">Suku</label>
                                        <input type="text" class="form-control" id="suku" name="suku" value="<?= $penduduk['suku']; ?>" required autocomplete="off">
                                        <small id="suku" class="form-text text-danger"><?= form_error('suku'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select class="form-control" id="agama" name="agama">
                                            <?php foreach ($agama as $g) : ?>
                                                <?php if ($g == $penduduk['agama']) : ?>
                                                    <option value="<?= $g; ?>" selected><?= $g; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $g; ?>"><?= $g; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan Terakhir</label>
                                        <select class="form-control" id="pendidikan" name="pendidikan">
                                            <?php foreach ($pendidikan as $pd) : ?>
                                                <?php if ($pd['kode_pendidikan'] == $penduduk['pendidikan']) : ?>
                                                    <option value="<?= $pd['kode_pendidikan']; ?>" selected><?= $pd['deskripsi']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $pd['kode_pendidikan']; ?>"><?= $pd['deskripsi']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <select class="form-control" id="pekerjaan" name="pekerjaan">
                                            <?php foreach ($pekerjaan as $pk) : ?>
                                                <?php if ($pk['pekerjaan'] == $penduduk['pekerjaan']) : ?>
                                                    <option value="<?= $pk['pekerjaan']; ?>" selected><?= $pk['pekerjaan']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $pk['pekerjaan']; ?>"><?= $pk['pekerjaan']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ket">Keterangan</label>
                                        <input type="text" class="form-control" id="ket" name="ket" value="<?= $penduduk['ket']; ?>" autocomplete="off">
                                        <small id="ket" class="form-text text-danger"><?= form_error('ket'); ?></small>
                                    </div>
                                    <button type="submit" class="btn btn-success">Ubah</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->