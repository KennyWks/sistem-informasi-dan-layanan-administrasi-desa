<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
<link href="<?= base_url('assets/admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<div class="row">
    <div class="col-lg-3 mb-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <span style="font-size:12px;">Jumlah Saspras</span><br>
                        <span class="font-weight-bold"><?= $saspras; ?></span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="fas fa-home fa-fw"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <span style="font-size:12px;">Saspras Baik</span><br>
                        <span class="font-weight-bold"><?= $sb; ?></span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="fas fa-home fa-fw"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <span style="font-size:12px;">Saspras Rusak Sedang</span><br>
                        <span class="font-weight-bold"><?= $srs; ?></span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="fas fa-house-damage fa-fw"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <span style="font-size:12px;">Saspras Rusak Berat</span><br>
                        <span class="font-weight-bold"><?= $srb; ?></span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="fas fa-house-damage fa-fw"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-6 shadow-sm p-3 mt-2 bg-white rounded">
        <figure class="highcharts-figure">
            <div id="Pemilik"></div>
        </figure>
    </div>

    <div class="col-lg-6 shadow-sm p-3 mt-2 bg-white rounded">
        <figure class="highcharts-figure">
            <div id="Jenis"></div>
        </figure>
    </div>
</div>

<script src="<?= base_url('assets/js/') ?>code/highcharts.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/export-data.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/accessibility.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/exporting.js"></script>

<!-- status -->
<script type="text/javascript">
    Highcharts.chart('Pemilik', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafik Pemilik Saspras'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}% <br> Saspras : {point.jumlah:.f}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Presentase',
            colorByPoint: true,
            data: [{
                name: 'Desa',
                y: <?= $desa; ?>,
                jumlah: <?= $desa; ?>,
                selected: true,
                sliced: true
            }, {
                name: 'Perseorangan',
                y: <?= $orang; ?>,
                jumlah: <?= $orang; ?>
            }, {
                name: 'Swasta',
                y: <?= $swasta; ?>,
                jumlah: <?= $swasta; ?>
            }, {
                name: 'Lembaga',
                y: <?= $lembaga; ?>,
                jumlah: <?= $lembaga; ?>
            }, {
                name: 'Kabupaten',
                y: <?= $kab; ?>,
                jumlah: <?= $kab; ?>
            }, {
                name: 'Provinsi',
                y: <?= $prov ?>,
                jumlah: <?= $prov; ?>
            }, {
                name: 'Pusat',
                y: <?= $pusat ?>,
                jumlah: <?= $pusat; ?>
            }]
        }]
    });
</script>

<!-- status -->
<script type="text/javascript">
    Highcharts.chart('Jenis', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafik Jenis Saspras'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}% <br> Saspras : {point.jumlah:.f}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Presentase',
            colorByPoint: true,
            data: [{
                name: 'Air Bersih',
                y: <?= $air; ?>,
                jumlah: <?= $air; ?>,
                selected: true,
                sliced: true
            }, {
                name: 'Pendidikan',
                y: <?= $pendidikan; ?>,
                jumlah: <?= $pendidikan; ?>
            }, {
                name: 'Kesehatan',
                y: <?= $kesehatan; ?>,
                jumlah: <?= $kesehatan; ?>
            }, {
                name: 'Rohani',
                y: <?= $rohani; ?>,
                jumlah: <?= $rohani; ?>
            }, {
                name: 'Transportasi',
                y: <?= $transport; ?>,
                jumlah: <?= $transport; ?>
            }, {
                name: 'Umum',
                y: <?= $umum ?>,
                jumlah: <?= $umum; ?>
            }, {
                name: 'Lainnya',
                y: <?= $lainnya ?>,
                jumlah: <?= $lainnya; ?>
            }, {
                name: 'Olaraga',
                y: <?= $olaraga ?>,
                jumlah: <?= $olaraga; ?>
            }]
        }]
    });
</script>