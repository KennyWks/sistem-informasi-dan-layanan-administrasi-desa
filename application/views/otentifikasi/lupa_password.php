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
                                    <h1 class="h4 text-gray-900 mb-4">Lupa password anda?</h1>
                                    <h3 class="h5 text-gray-900 mb-2">Jangan khawatir! kami punya solusi. Cukup isi email anda pada kolom dibawah ini dan selanjutnya kami akan mengirimkan link untuk mengubah password anda.</h3>
                                </div>

                                <?= $this->session->flashdata('message'); ?>.

                                <form class="user" method="POST" action="<?= base_url('Super_Admin/lupaPassword'); ?>">
                                    <div class="form-group">
                                        <input type="text" autocomplete="off" class="form-control form-control-user" autofocus name="email" id="email" placeholder="Email..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" name="kirim" class="btn btn-primary btn-user btn-block">
                                        Kirim link
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('otentifikasi/'); ?>">Kembali ke halaman login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>