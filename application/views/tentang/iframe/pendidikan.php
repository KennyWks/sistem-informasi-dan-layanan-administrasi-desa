<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
<link href="<?= base_url('assets/admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<div class="row">
    <?php foreach ($Cards as $card) : ?>
        <div class="col-lg-4">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <span style="font-size:12px;"><?= $card['deskripsi']; ?></span><br>
                            <span class="font-weight-bold"><?= $card['data']; ?></span>
                        </div>
                        <div class="col-lg-2 mt-3">
                            <?php if ($card['pendidikan'] >= '6') : ?>
                                <i class="fa fa-lg fa-graduation-cap float-right"></i>
                            <?php else : ?>
                                <i class="fa fa-lg fa-child float-right"></i>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<div class="shadow-sm p-3 mt-2 bg-white rounded">
    <figure class="highcharts-figure">
        <div id="pekerjaan"></div>
    </figure>
</div>

<script src="<?= base_url('assets/js/') ?>code/highcharts.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/exporting.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/export-data.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/accessibility.js"></script>

<script type="text/javascript">
    Highcharts.chart('pekerjaan', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafik Pendidikan'
        },
        subtitle: {
            text: 'Jumlah Penduduk : <?= $penduduk ?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
            data: <?= json_encode($gridLabel); ?>
        }]
    });
</script>