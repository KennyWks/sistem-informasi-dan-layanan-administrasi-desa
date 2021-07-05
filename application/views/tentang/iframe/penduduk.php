<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
<link href="<?= base_url('assets/admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<div class="row">
    <div class="col-lg-3 mb-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <span style="font-size:12px;">Kepala Keluarga</span><br>
                        <span class="font-weight-bold"><?= $kk; ?></span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="fa fa-lg fa-user float-right"></i>
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
                        <span style="font-size:12px;">Penduduk</span><br>
                        <span class="font-weight-bold"><?= $penduduk; ?></span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="fa fa-lg fa-users float-right"></i>
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
                        <span style="font-size:12px;">Laki-Laki</span><br>
                        <span class="font-weight-bold"><?= $laki2; ?></span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="fa fa-lg fa-male float-right"></i>
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
                        <span style="font-size:12px;">Perempuan</span><br>
                        <span class="font-weight-bold"><?= $perempuan; ?></span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="fa fa-lg fa-female float-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 shadow-sm p-3 mt-2 bg-white rounded">
        <figure class="highcharts-figure">
            <div id="usia"></div>
        </figure>
    </div>
    <div class="col-lg-6 shadow-sm p-3 mt-2 bg-white rounded">
        <figure class="highcharts-figure">
            <div id="pertumbuhan"></div>
        </figure>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 shadow-sm p-3 mt-2 bg-white rounded">
        <figure class="highcharts-figure">
            <div id="Status"></div>
        </figure>
    </div>

    <?php 
    foreach ($pekerjaan as $p) {
        $rowP[] = $p['name'];
    }
    ?>
    <div class="col-lg-6 shadow-sm p-3 mt-2 bg-white rounded">
        <figure class="highcharts-figure">
            <div id="Pekerjaan"></div>
        </figure>
    </div>
</div>

<script src="<?= base_url('assets/js/') ?>code/highcharts.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/export-data.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/accessibility.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/exporting.js"></script>

<!-- pekerjaan -->
<script type="text/javascript">
    Highcharts.chart('Pekerjaan', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Grafik Pekerjaan'
        },
        subtitle: {
            text: 'Jumlah Penduduk : <?= $penduduk ?>'
        },
        xAxis: {
            categories: <?= json_encode($rowP); ?>,
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah (Orang)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' Orang'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        credits: {
            enabled: true
        },
        series: [{
            name: 'Jumlah Data (Orang)',
            data: <?= json_encode($pekerjaan); ?>
        }]
    });
</script>

<!-- status -->
<script type="text/javascript">
    Highcharts.chart('Status', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafik Status'
        },
        subtitle: {
            text: 'Jumlah Penduduk : <?= $penduduk ?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}% <br> {point.y:.f}</b>'
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
            data: <?= json_encode($status); ?>
        }]
    });
</script>

<!-- populasi -->
<script type="text/javascript">
    // Age categories
    var categories = [
        '0-5', '6-12', '13-20', '21-30',
        '31-45', '46-65', '66-75', '76-85', '86+'
    ];

    Highcharts.chart('usia', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Populasi Penduduk Tahun <?= date("Y") ?>'
        },
        subtitle: {
            text: 'Jumlah Penduduk : <?= $penduduk ?>'
        },
        accessibility: {
            point: {
                valueDescriptionFormat: '{index}. Age {xDescription}, {value}%.'
            }
        },
        xAxis: [{
            categories: categories,
            reversed: false,
            labels: {
                step: 1
            },
            accessibility: {
                description: 'Usia (Laki-laki)'
            }
        }, { // mirror axis on right side
            opposite: true,
            reversed: false,
            categories: categories,
            linkedTo: 0,
            labels: {
                step: 1
            },
            accessibility: {
                description: 'Usia (Perempuan)'
            }
        }],
        yAxis: {
            title: {
                text: null
            },
            labels: {
                formatter: function() {
                    return Math.abs(this.value) + '%';
                }
            },
            accessibility: {
                description: 'Presentasi Populasi',
                rangeDescription: 'Antara: 0 sampai 5%'
            }
        },

        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },

        tooltip: {
            formatter: function() {
                return '<b>' + this.series.name + ', Usia ' + this.point.category + '</b><br/>' +
                    'Populasi: ' + Highcharts.numberFormat(Math.abs(this.point.y), 1) + '%';
            }
        },

        series: [{
            name: 'Laki-laki',
            data: [
                -<?= $satuL; ?>, -<?= $duaL; ?>, -<?= $tigaL; ?>, -<?= $empatL; ?>,
                -<?= $limaL; ?>, -<?= $enamL; ?>, -<?= $tujuhL; ?>, -<?= $delapanL; ?>, -<?= $sembilanL; ?>
            ]
        }, {
            name: 'Perempuan',
            data: [
                <?= $satuP; ?>, <?= $duaP; ?>, <?= $tigaP; ?>, <?= $empatP; ?>,
                <?= $limaP; ?>, <?= $enamP; ?>, <?= $tujuhP; ?>, <?= $delapanP; ?>, <?= $sembilanP; ?>
            ]
        }]
    });
</script>

<!-- pertumbuhan -->
<script type="text/javascript">
    Highcharts.chart('pertumbuhan', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Rata-rata perkembangan jumlah penduduk'
        },
        subtitle: {
            text: 'Data Tahun <?= date('Y'); ?> (/Bulan)'
        },
        subtitle: {
            text: 'Jumlah Penduduk : <?= $penduduk ?>'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agus',
                'Sep',
                'Okt',
                'Nov',
                'Des'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Laki-laki',
            data: [<?= $bulan1L; ?>, <?= $bulan2L; ?>, <?= $bulan3L; ?>, <?= $bulan4L; ?>, <?= $bulan5L; ?>, <?= $bulan6L; ?>, <?= $bulan7L; ?>, <?= $bulan8L; ?>, <?= $bulan9L; ?>, <?= $bulan10L; ?>, <?= $bulan11L; ?>, <?= $bulan12L; ?>]
        }, {
            name: 'Perempuan',
            data: [<?= $bulan1P; ?>, <?= $bulan2P; ?>, <?= $bulan3P; ?>, <?= $bulan4P; ?>, <?= $bulan5P; ?>, <?= $bulan6P; ?>, <?= $bulan7P; ?>, <?= $bulan8P; ?>, <?= $bulan9P; ?>, <?= $bulan10P; ?>, <?= $bulan11P; ?>, <?= $bulan12P; ?>]
        }]
    });
</script>