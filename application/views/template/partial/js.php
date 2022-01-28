<?php
$uri = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
?>

<script src="<?= base_url() ?>assets/admin/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/select2/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/sweetalert2/sweetalert2.all.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url() ?>assets/theme/datatables/datatables.min.js"></script>

<!-- jsquery mask -->
<script src="<?= base_url() ?>assets/admin/libs/jquery-mask/jquery.mask.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/autonumeric/autoNumeric.js"></script>

<script src="<?= base_url() ?>assets/admin/js/app.js"></script>
<?php if ($uri == 'admin') : ?>
	<script src="<?= base_url() ?>assets/admin/js/admin.js?version=<?= time() ?>"></script>
	<?php if ($uri2 == '') : ?>
		<script type="text/javascript">
			Highcharts.chart("chart", {
				title: {
					text: "Realisasi Keuangan Bulanan Dinas PUPR",
				},
				subtitle: {
					text: "Sumber: Internal Dinas PUPR Kab. Aceh Barat",
				},
				yAxis: {
					title: {
						text: "% Realisasi",
					},
				},
				xAxis: {
					categories: [
						"Jan",
						"Feb",
						"Mar",
						"Apr",
						"Mei",
						"Jun",
						"Jul",
						"Agus",
						"Sep",
						"Okt",
						"Nov",
						"Des",
					],
				},
				legend: {
					layout: "vertical",
					align: "right",
					verticalAlign: "middle",
				},
				plotOptions: {
					line: {
						dataLabels: {
							enabled: true,
						},
						enableMouseTracking: true,
					},
				},
				series: [{
					name: "Realisasi",
					data:
					<?php foreach ($grafik as $g) {
						echo "[" . round(($g['januari'] / $g['total']) * 100, 2) . "," . round($g['februari'] / $g['total'] * 100, 2) . "," .
								round($g['maret'] / $g['total'] * 100, 2) . "," . round($g['april'] / $g['total'] * 100, 2) . "," .
								round($g['mei'] / $g['total'] * 100, 2) . "," . round($g['juni'] / $g['total'] * 100, 2) . "," .
								round($g['juli'] / $g['total'] * 100, 2) . "," . (round($g['agustus'] / $g['total'] * 100, 2)) . "," .
								round($g['september'] / $g['total'] * 100, 2) . "," . round($g['oktober'] / $g['total'] * 100, 2) . "," .
								round($g['november'] / $g['total'] * 100, 2) . "," . round($g['desember'] / $g['total'] * 100, 2) . "]";
					} ?>
				}],
				tooltip: {
					useHTML: true,
					headerFormat: '<table><tr><th colspan="2">{point.key}</th></tr>',
					pointFormat: '<tr><td style="color: {series.color}">{series.name}</td>' + '<td style="text-align: right"><b>{point.y}</b></td></tr>',
					valueSuffix: '%',
					footerFormat: '</table>',
				}
			});

			//	grafik pie
			Highcharts.chart('pie', {
				chart: {
					/*plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,*/
					type: 'pie',
					options3d: {
						enabled: true,
						alpha: 45,
						beta: 0
					}
				},
				title: {
					text: 'Persentase Proporsi Anggaran Berdasarkan Sumber Dana'
				},
				colors: ['#ff8686', '#86ffb7', '#ffe07e'],
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
						depth: 35,
						dataLabels: {
							enabled: true,
							format: '{point.name}'
						}
					}
				},
				series: [{
					type: 'pie',
					name: 'Persentase',
					colorByPoint: true,
					data: [{
						name: 'DTU',
						y: <?= round($pie['DTU'] / $pie['total'] * 100, 2) ?>,
						sliced: true,
						selected: true
					}, {
						name: 'DOKA',
						y: <?= round($pie['DOKA'] / $pie['total'] * 100, 2) ?>
					}, {
						name: 'DAK',
						y: <?= round($pie['DAK'] / $pie['total'] * 100, 2) ?>
					}]
				}]
			});
		</script>
	<?php endif; ?>
<?php endif; ?>
<?php if ($this->uri->segment(1) == 'konsultan') : ?>
	<script src="<?= base_url() ?>assets/konsultan/konsultan.js?version=<?= time() ?>"></script>
<?php endif; ?>
