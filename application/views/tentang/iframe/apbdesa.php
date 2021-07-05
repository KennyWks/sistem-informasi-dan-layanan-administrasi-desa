<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
<link href="<?= base_url('assets/admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<div class="row">
    <div class="col-lg-3 mb-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <span style="font-size:12px;">Pendapatan APB Desa</span><br>
                        <span class="font-weight-bold">Rp <?= number_format($row['Rpendapatan']); ?></span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="far fa-money-bill-alt fa-2x float-right"></i>
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
                        <span style="font-size:12px;">Belanja APB Desa</span><br>
                        <span class="font-weight-bold">Rp <?= number_format($row['Rbelanja']); ?></span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="far fa-money-bill-alt fa-2x float-right"></i>
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
                        <span style="font-size:12px;">Pembiayaan APB Desa</span><br>
                        <span class="font-weight-bold">Rp <?= number_format($row['pembiayaan']); ?></span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="far fa-money-bill-alt fa-2x float-right"></i>
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
                        <span style="font-size:12px;">Jumlah Kas</span><br>
                        <span class="font-weight-bold">Rp <?= number_format($row['kas']); ?></span>
                    </div>
                    <div class="col-lg-2  mt-3">
                        <i class="far fa-money-bill-alt fa-2x float-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 shadow-sm p-3 mt-2 bg-white rounded">
        <figure class="highcharts-figure">
            <div id="Pendapatan"></div>
        </figure>
    </div>
    <div class="col-lg-6 shadow-sm p-3 mt-2 bg-white rounded">
        <figure class="highcharts-figure">
            <div id="Belanja"></div>
        </figure>
    </div>
</div>
<div class="row">
    <div class="col-lg shadow-sm p-3 mt-2 bg-white rounded">
        <figure class="highcharts-figure">
            <div id="Perbandingan"></div>
        </figure>
    </div>
</div>

<script src="<?= base_url('assets/js/') ?>code/highcharts.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/export-data.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/accessibility.js"></script>
<script src="<?= base_url('assets/js/') ?>code/modules/exporting.js"></script>

<!-- pendapatan -->
<script type="text/javascript">
    Highcharts.chart('Pendapatan', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafik Pendapatan'
        },
        subtitle: {
            text: 'Sumber : APB Desa Oelatimo'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}% <br> Rp {point.jumlah:f}</b>'
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
                name: 'Pendapatan Asli',
                y: <?= $row['pasli']; ?>,
                jumlah: '<?= number_format($row['pasli']); ?>',
                selected: true,
                sliced: true
            }, {
                name: 'Transfer',
                y: <?= $row['transfer']; ?>,
                jumlah: '<?= number_format($row['transfer']); ?>'
            }, {
                name: 'Pendapatan Lain',
                y: <?= $row['plain']; ?>,
                jumlah: '<?= number_format($row['plain']); ?>'
            }]
        }]
    });
</script>

<!-- belanja -->
<script type="text/javascript">
    Highcharts.chart('Belanja', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafik Belanja'
        },
        subtitle: {
            text: 'Sumber : APB Desa Oelatimo'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}% <br> Rp {point.jumlah:.f}</b>'
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
                name: 'Penyelenggaraan Pemerintahan Desa',
                y: <?= $row['ppdp']; ?>,
                jumlah: '<?= number_format($row['ppdp']); ?>',
                selected: true,
                sliced: true
            }, {
                name: 'Pelaksanaan Pembangunan Desa',
                y: <?= $row['ppdb']; ?>,
                jumlah: '<?= number_format($row['ppdb']); ?>'
            }, {
                name: 'Pemberdayaan Masyarakat Desa',
                y: <?= $row['pmd']; ?>,
                jumlah: '<?= number_format($row['pmd']); ?>'
            }, {
                name: 'Pembinaan Kemasyarakatan Desa',
                y: <?= $row['pkd']; ?>,
                jumlah: '<?= number_format($row['pkd']); ?>'
            }, {
                name: 'Belanja Tak Terduga',
                y: <?= $row['btt']; ?>,
                jumlah: '<?= number_format($row['btt']); ?>'
            }]
        }]
    });
</script>

<script type="text/javascript">
    Highcharts.chart('Perbandingan', {

        title: {
            text: 'Perbandingan Anggaran & Realisasi Anggaran'
        },

        subtitle: {
            text: 'Sumber : APB Desa Oelatimo'
        },

        yAxis: {
            title: {
                text: 'Jumlah Anggaran (Rp)'
            }
        },

        xAxis: {
            accessibility: {
                rangeDescription: 'Rentang Tahun : 2017 - <?= date('Y') ?>'
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2017
            }
        },

        series: [{
            name: 'Anggaran Pendapatan (Rp)',
            data: [<?= $row1['pendapatan']; ?>, <?= $row2['pendapatan']; ?>, <?= $row3['pendapatan']; ?>, null, <?= $row5['pendapatan']; ?>, <?= $row6['pendapatan']; ?>, <?= $row7['pendapatan']; ?>, <?= $row8['pendapatan']; ?>]
        }, {
            name: 'Realisasi Pendapatan (Rp)',
            data: [<?= $row1['Rpendapatan']; ?>, <?= $row2['Rpendapatan']; ?>, <?= $row3['Rpendapatan']; ?>, null, <?= $row5['Rpendapatan']; ?>, <?= $row6['Rpendapatan']; ?>, <?= $row7['Rpendapatan']; ?>, <?= $row7['Rpendapatan']; ?>]
        }, {
            name: 'Anggaran Belanja (Rp)',
            data: [<?= $row1['belanja']; ?>, <?= $row2['belanja']; ?>, <?= $row3['belanja']; ?>, null, <?= $row5['belanja']; ?>, <?= $row6['belanja']; ?>, <?= $row7['belanja']; ?>, <?= $row8['belanja']; ?>]
        }, {
            name: 'Realisasi Belanja (Rp)',
            data: [<?= $row1['Rbelanja']; ?>, <?= $row2['Rbelanja']; ?>, <?= $row3['Rbelanja']; ?>, null, <?= $row5['Rbelanja']; ?>, <?= $row6['Rbelanja']; ?>, <?= $row7['Rbelanja']; ?>, <?= $row8['Rbelanja']; ?>]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
</script>