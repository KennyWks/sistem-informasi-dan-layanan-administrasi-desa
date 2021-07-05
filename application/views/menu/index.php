  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-6">

              <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
              <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah_menu'); ?>"></div>
              <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah_menu'); ?>"></div>

              <a href="#" class="btn btn-primary mb-3 tombolTambahData" data-toggle="modal" data-target="#formModal">Tambah Menu</a>
              <div class="table-responsive">
                  <table class="table table-hover" id="dataTable">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Menu</th>
                              <th scope="col">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $i = 1;
                            foreach ($menu as $m) : ?>
                              <tr>
                                  <th scope="row"><?= $i; ?></th>
                                  <td><?= $m['menu']; ?></td>
                                  <td>
                                      <a href="<?= base_url(''); ?>" class="badge badge-success tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $m['id']; ?>">Ubah</a>
                                      <a href="<?= base_url(''); ?>/menu/hapusMenu/<?= $m['id']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
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
                  <h5 class="modal-title" id="judulModal">Tambah Menu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('menu/'); ?>" method="post">
                      <input type="hidden" name="id" id="id">
                      <div class="form-group">
                          <input type="text" class="form-control menu" name="menu" placeholder="Nama menu">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-primary">Tambah</button></div>
                  </form>
              </div>
          </div>
      </div>
  </div>