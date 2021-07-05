  <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg">
              <?php if (validation_errors()) { ?>
                  <div class="alert alert-danger" role="alert">
                      <?= validation_errors(); ?>
                  </div>
              <?php } ?>

              <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah_submenu'); ?>"></div>
              <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah_submenu'); ?>"></div>

              <a href="" class="btn btn-primary mb-3 tampilModalTambahSubMenu" data-toggle="modal" data-target="#myModal">Tambah Submenu</a>
              <div class="table-responsive">
                  <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">SubMenu</th>
                              <th scope="col">Menu</th>
                              <th scope="col">Url</th>
                              <th scope="col">Icon</th>
                              <th scope="col">Aktif</th>
                              <th scope="col">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $i = 1;
                            foreach ($subMenu as $sm) : ?>
                              <tr>
                                  <th scope="row"><?= $i; ?></th>
                                  <td><?= $sm['judul']; ?></td>
                                  <td><?= $sm['menu']; ?></td>
                                  <td><?= $sm['url']; ?></td>
                                  <td><?= $sm['icon']; ?></td>
                                  <td><?= $sm['aktif']; ?></td>

                                  <td>
                                      <a href="#" class="badge badge-success tampilModalUbahSubMenu" data-toggle="modal" data-target="#myModal" data-id="<?= $sm['id']; ?>">Ubah</a>
                                      <a href="<?= base_url(''); ?>/menu/hapusSubMenu/<?= $sm['id']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
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

  <!-- The Modal Tambah-->
  <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-md">
          <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                  <h4 class="modal-title" id="judulModal">Tambah Submenu</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                  <form action="<?= base_url('menu/subMenu'); ?>" method="POST">
                      <input type="hidden" name="id" id="id">
                      <div class="form-group">
                          <input type="text" class="form-control nama_menu" name="judul" placeholder="Nama Submenu">
                      </div>
                      <div class="form-group">
                          <select name="menu_id" class="form-control menu_id">
                              <option value="">Pilih</option>
                              <?php foreach ($Menu as $m) : ?>
                                  <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control nama_url" name="url" placeholder="Nama url">
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control nama_icon" name="icon" placeholder="Nama icon">
                      </div>
                      <div class="form-group">
                          <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="aktif" value="1" id="aktif" checked>
                              <label for="aktif" class="form-check-label">
                                  Aktif ?
                              </label>
                          </div>
                      </div>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
              </form>
          </div>
      </div>
  </div>