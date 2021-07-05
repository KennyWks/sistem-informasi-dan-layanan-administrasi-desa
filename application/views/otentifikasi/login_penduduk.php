   <div class="container">

       <!-- Outer Row -->
       <div class="row justify-content-center">

           <div class="col-lg-7">

               <div class="card o-hidden border-0 shadow-lg my-5">
                   <div class="card-body p-0">
                       <!-- Nested Row within Card Body -->
                       <div class="row">
                           <div class="col-lg">
                               <div class="p-5">
                                   <div class="text-center">
                                       <h1 class="text-gray-900 welcome_login">Selamat datang penduduk Desa Oelatimo!</h1>
                                       <h1 class="text-gray-900 mb-4 welcome_login">Silahkan login.</h1>
                                   </div>

                                   <div class="belum-daftar" data-flashdata="<?= $this->session->flashdata('flash_BelumTerdaftar'); ?>"></div>

                                   <?php if ($this->session->flashdata('flash_salahNoKK')) : ?>
                                       <div class="row mt-3 ml-2 mr-2">
                                           <div class="col">
                                               <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">Maaf, <strong>No KK</strong> Anda
                                                   <?= $this->session->flashdata('flash_salahNoKK'); ?>.
                                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                               </div>
                                           </div>
                                       </div>
                                   <?php endif; ?>

                                   <?php if ($this->session->flashdata('flash_logout')) : ?>
                                       <div class="row mt-3 ml-2 mr-2">
                                           <div class="col">
                                               <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">Selamat! Anda <strong>Berhasil</strong>
                                                   <?= $this->session->flashdata('flash_logout'); ?>.
                                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                               </div>
                                           </div>
                                       </div>
                                   <?php endif; ?>

                                   <form class="user" method="POST" action="<?= base_url('Otentifikasi_Penduduk/index'); ?>">
                                       <div class="form-group">
                                           <input type="text" required autocomplete="off" autofocus class="form-control form-control-user" name="no_kk" id="no_kk" value="<?= set_value('no_kk'); ?>" placeholder="Nomor Kartu Keluarga...">
                                           <?= form_error('no_kk', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                       </div>
                                       <div class="form-group">
                                           <input type="text" required maxlength="16" minlength="16" autocomplete="off" class="form-control form-control-user" name="nik" id="nik" placeholder="Nomor Induk Kependudukan..." value="<?= set_value('nik'); ?>">
                                           <?= form_error('nik', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                       </div>
                                       <button type="submit" name="kirim" class="btn btn-primary btn-user btn-block">
                                           Login
                                       </button>
                                   </form>
                                   <hr>
                                   <div class="text-center">
                                       <a class="small" href="<?= base_url(); ?>">Kembali ke beranda</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

           </div>

       </div>

   </div>