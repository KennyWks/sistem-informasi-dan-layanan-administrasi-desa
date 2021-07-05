        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h1 class="h4 text-gray-800 font-judul judulHalaman"><?= $title; ?></h1>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-folder fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <h1 class="h4 text-gray-800 judulHalaman"><?= $title; ?></h1>
                            </div>
                        </li>

                        <?php
                        if ($this->session->userdata('role_id') == 1) : ?>
                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>

                                    <!-- Counter - Alerts -->
                                    <?php
                                    $query = "SELECT baca FROM komentar WHERE baca = 0";
                                    $baca = $this->db->query($query)->num_rows();
                                    ?>
                                    <?php if ($baca > 0) : ?>
                                        <span class="badge badge-danger badge-counter komentar"><?= $baca; ?></span>
                                    <?php endif; ?>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">Komentar</h6>
                                    <?php
                                    $queryKomentar = "SELECT * FROM komentar ORDER BY id_komentar DESC LIMIT 5";
                                    $komentar = $this->db->query($queryKomentar)->result_array();
                                    ?>

                                    <?php foreach ($komentar as $k) : ?>
                                        <a class="dropdown-item d-flex align-items-center tampilmodalBacaKomentar" data-toggle="modal" data-target="#formModal" data-id="<?= $k['id_komentar']; ?>">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-success">
                                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500"><?= date('d F Y', $k['tgl']); ?></div>
                                                <?php if ($k['baca'] == 0) : ?>
                                                    <b><?= word_limiter($k['isi_komentar'], 5); ?></b>
                                                <?php else : ?>
                                                    <?= word_limiter($k['isi_komentar'], 5); ?>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>

                                    <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('Super_Admin/daftarKomentar'); ?>">Lihat Semua Komentar</a>
                                    </a>
                                </div>
                            </li>

                            <!-- Nav Item - Messages -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <!-- Counter - Messages -->
                                    <?php
                                    $queryPesan = "SELECT * FROM pesan WHERE baca = '0'";
                                    $NN = $this->db->query($queryPesan)->num_rows();
                                    ?>
                                    <?php if ($NN != '0') : ?>
                                        <span class="badge badge-danger badge-counter pesan"><?= $NN; ?></span>
                                    <?php endif; ?>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Pesan
                                    </h6>
                                    <?php
                                    $queryPesan = "SELECT * FROM pesan ORDER BY baca = '0' DESC LIMIT 3";
                                    $Pesan = $this->db->query($queryPesan)->result_array();
                                    ?>
                                    <?php foreach ($Pesan as $p) : ?>
                                        <a class="dropdown-item d-flex align-items-center tampilModalBacaPesan" data-toggle="modal" data-target="#formModal" data-id="<?= $p['id_pesan']; ?>">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="<?= base_url('assets/img-admin/default.JPG'); ?>" alt="Oelatimo">
                                            </div>
                                            <div class="font-weight-bold">
                                                <?php if ($p['baca'] == '0') : ?>
                                                    <div class="text-gray-900"><?= word_limiter($p['pesan'], 5); ?></div>
                                                <?php else : ?>
                                                    <div class="text-gray-500"><?= word_limiter($p['pesan'], 5); ?></div>
                                                <?php endif; ?>
                                                <div class="small text-gray-500"><?= $p['nama_depan']; ?> <?= $p['nama_belakang']; ?> · <?= date('d F Y', $p['tgl']); ?></div>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                    <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('Super_Admin/daftarPesan'); ?>">Lihat semua pesan</a>
                                </div>
                            </li>
                        <?php endif; ?>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hallo ! <?= word_limiter($user['nama'], 1); ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img-admin/') . $user['foto']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('admin'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil Saya
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->