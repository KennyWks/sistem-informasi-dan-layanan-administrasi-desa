<div class="container-fluid">
    <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('daftar-user'); ?>"></div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><span style='font-size:25px;'>&#128521;</span> Selamat Datang <?= word_limiter($user['nama'], 1); ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Permohonan SK</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $permohonan; ?> Permohonon</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">SK Yang Diverifikasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $setujui; ?> Permohonan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengunjung (Online)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $POnline; ?> Pengunjung</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-eye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengunjung (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $PTotal; ?> Pengunjung</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-eye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="jan" data-p1="<?= $bln1; ?>"></div>
        <div class="feb" data-p2="<?= $bln2; ?>"></div>
        <div class="mar" data-p3="<?= $bln3; ?>"></div>
        <div class="apr" data-p4="<?= $bln4; ?>"></div>
        <div class="mei" data-p5="<?= $bln5; ?>"></div>
        <div class="jun" data-p6="<?= $bln6; ?>"></div>
        <div class="jul" data-p7="<?= $bln7; ?>"></div>
        <div class="agus" data-p8="<?= $bln8; ?>"></div>
        <div class="sep" data-p9="<?= $bln9; ?>"></div>
        <div class="okt" data-p10="<?= $bln10; ?>"></div>
        <div class="nov" data-p11="<?= $bln11; ?>"></div>
        <div class="des" data-p12="<?= $bln12; ?>"></div>
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Kunjungan Website (/Bulan)</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="data1" data-sk1="<?= $data1; ?>"></div>
        <div class="data2" data-sk2="<?= $data2; ?>"></div>
        <div class="data3" data-sk3="<?= $data3; ?>"></div>
        <div class="data4" data-sk4="<?= $data4; ?>"></div>
        <div class="data5" data-sk5="<?= $data5; ?>"></div>
        <div class="data6" data-sk6="<?= $data6; ?>"></div>
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Surat Keterangan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> SK Tidak Mampu
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> SK Susunan Keluarga
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> SK Kematian
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-dark"></i> SK Domisili
                        </span>

                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> SK Usaha
                        </span>

                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> SK Penjualan Ternak
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->