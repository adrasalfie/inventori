<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

</div>

<!-- Content Row -->

<div class="row">
	<div class="col-xl-12 col-lg-12">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Total Pengajuan Per Tanggal <?= date('d-m-Y', strtotime('-2 weeks')) ?> - <?= date('d-m-Y') ?></h6>
			</div>
			<!-- Card Body -->
			<div class="card-body">
				<div class="chart-area">
					<canvas id="dailyChart" width="20" height="5"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-12 col-lg-12">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Total Pengajuan Perbulan Tahun <?= date('Y') ?></h6>
			</div>
			<!-- Card Body -->
			<div class="card-body">
				<div class="chart-area">
					<canvas id="monthlyChart" width="20" height="5"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var ctx = document.getElementById('dailyChart').getContext('2d');
	var pengajuanData = <?php echo json_encode($pengajuan_pertanggal); ?>;
	var labels = Object.keys(pengajuanData);
	var data = Object.values(pengajuanData);

	var chart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: labels,
			datasets: [{
				label: 'Total Pengajuan per Tanggal',
				data: data,
				backgroundColor: 'rgba(54, 162, 235, 0.6)',
				borderColor: 'rgba(54, 162, 235, 1)',
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});

	var ctx2 = document.getElementById('monthlyChart').getContext('2d');
	var pengajuanDataPerbulan = <?php echo json_encode($pengajuan_perbulan); ?>;
	var labels2 = Object.keys(pengajuanDataPerbulan);
	var data2 = Object.values(pengajuanDataPerbulan);
	var chart2 = new Chart(ctx2, {
		type: 'bar',
		data: {
			labels: labels2,
			datasets: [{
				label: 'Total Pengajuan per Bulan',
				data: data2,
				backgroundColor: 'rgba(54, 162, 235, 0.6)',
				borderColor: 'rgba(54, 162, 235, 1)',
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>