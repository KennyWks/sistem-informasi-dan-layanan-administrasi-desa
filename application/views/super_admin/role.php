  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-6">

              <div class="baseurl2" id="<?= base_url(''); ?>"></div>

              <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

              <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah_role'); ?>"></div>
              <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah_role'); ?>"></div>

              <a href="#" class="btn btn-primary mb-3 tombolTambahDataRole" data-toggle="modal" data-target="#formModal">Tambah Role Baru</a>
              <div class="table-responsive">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Role</th>
                              <th scope="col">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $i = 1;
                            foreach ($role  as $r) : ?>
                              <tr>
                                  <th scope="row"><?= $i; ?></th>
                                  <td><?= $r['role']; ?></td>
                                  <td>
                                      <a href="<?= base_url('Super_Admin/roleAkses/') . $r['id']; ?>" class="badge badge-warning">Akses</a>
                                      <a href="<?= base_url(''); ?>" class="badge badge-success tampilModalUbahRole" data-toggle="modal" data-target="#formModal" data-id="<?= $r['id']; ?>">Ubah</a>
                                      <a href="<?= base_url(''); ?>/Super_Admin/hapusRole/<?= $r['id']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
                                  </td>
                              </tr>
                          <?php $i++;
                            endforeach; ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>

  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Modal -->
  <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="judulModal">Tambah</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('Super_Admin/role'); ?>" method="post">
                      <input type="hidden" name="id" id="id">
                      <div class="form-group">
                          <input type="text" class="form-control nama_role" name="role" placeholder="Nama role">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-primary">Tambah</button></div>
                  </form>
              </div>
          </div>
      </div>
  </div>