 <div class="container">

     <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
         <div class="card-body p-0">
             <!-- Nested Row within Card Body -->
             <div class="row">
                 <div class="col-lg">
                     <div class="p-5">
                         <div class="text-center">
                             <h1 class="h4 text-gray-900 mb-4">Selamat datang! Buat Akun baru sekarang</h1>
                         </div>
                         <form class="user" method="POST" action="<?= base_url('Super_Admin/daftarNewAdmin'); ?>">
                             <div class="form-group">
                                 <input type="text" class="form-control form-control-user" name="nama" id="nama" autocomplete="off" autofocus placeholder="Nama" value="<?= set_value('nama'); ?>">
                                 <?= form_error('nama', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                             </div>
                             <div class="form-group">
                                 <input type="text" class="form-control form-control-user" id="email" name="email" autocomplete="off" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                 <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                             </div>
                             <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <input type="password" class="form-control form-control-user" id="password1" name="password1" autocomplete="off" placeholder="Password">
                                     <?= form_error('password1', '<small class="form-text text-danger pl-4">', '</small>'); ?>
                                 </div>
                                 <div class="col-sm-6">
                                     <input type="password" class="form-control form-control-user" id="password2" name="password2" autocomplete="off" placeholder="Konfirmasi Password">
                                     <?= form_error('password1', '<small class="form-text text-danger pl-4">', '</small>'); ?>
                                 </div>
                             </div>
                             <button type="submit" class="btn btn-primary btn-user btn-block">
                                 Daftar
                             </button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div>