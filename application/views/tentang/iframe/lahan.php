<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
<link href="<?= base_url('assets/admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<div class="row">
    <div class="col-lg-3 mb-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <span style="font-size:12px;">Luas Lahan Pertanian</span><br>
                        <span class="font-weight-bold"><?= $lahan['pertanian']; ?> Ha</span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="fab fa-lg fa-pagelines float-right"></i>
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
                        <span style="font-size:12px;">Luas Lahan Perkebunan</span><br>
                        <span class="font-weight-bold"><?= $lahan['perkebunan']; ?> Ha</span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="fa fa-lg fa-tree float-right"></i>
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
                        <span style="font-size:12px;">Luas Lahan Tambak Ikan</span><br>
                        <span class="font-weight-bold"><?= $lahan['tambak']; ?> Ha</span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="fas fa-lg fa-fish float-right"></i>
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
                        <span style="font-size:12px;">Luas Lahan Pemukiman</span><br>
                        <span class="font-weight-bold"><?= $lahan['pemukiman']; ?> Ha</span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="fa fa-lg fa-home float-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg shadow-sm p-3 mt-2 bg-white rounded">
        <figure class="highcharts-figure">
            <div id="lahan"></div>
        </figure>
    </div>
</div>

<?php
$lain2 = $lahan['wilayah'] - ($lahan['pemukiman'] + $lahan['pertanian'] + $lahan['perkebunan'] + $lahan['tambak'] + $lahan['hutan'] + $lahan['embung']);
?>

<script src="<?= base_url('assets/js/') ?>code/highcharts.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/export-data.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/accessibility.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/exporting.js"></script>

<!-- lahan -->
<script type="text/javascript">
    Highcharts.chart('lahan', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafik Perbandingan Jumlah Lahan'
        },
        subtitle: {
            text: 'Jumlah Total Lahan : <?= $lahan['wilayah']; ?> Ha'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}% <br> {point.jumlah:.1f}</b>'
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
                name: 'Pemukiman',
                y: <?= $lahan['pemukiman']; ?>,
                jumlah: <?= $lahan['pemukiman']; ?> + ' Ha',
                selected: true,
                sliced: true
            }, {
                name: 'Pertanian',
                y: <?= $lahan['pertanian']; ?>,
                jumlah: <?= $lahan['pertanian']; ?> + ' Ha'
            }, {
                name: 'Perkebunan',
                y: <?= $lahan['perkebunan']; ?>,
                jumlah: <?= $lahan['perkebunan']; ?> + ' Ha'
            }, {
                name: 'Tambak Ikan',
                y: <?= $lahan['tambak']; ?>,
                jumlah: <?= $lahan['tambak']; ?> + ' Ha',
            }, {
                name: 'Hutan',
                y: <?= $lahan['hutan']; ?>,
                jumlah: <?= $lahan['hutan']; ?> + ' Ha'
            }, {
                name: 'Danau/Waduk/Situ/Embung',
                y: <?= $lahan['embung']; ?>,
                jumlah: <?= $lahan['embung']; ?> + ' Ha',
            }, {
                name: 'Lain-lain',
                y: <?= $lain2; ?>,
                jumlah: <?= $lain2; ?> + ' Ha',
            }]
        }]
    });
</script>