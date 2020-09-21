@extends('layouts.user')

@section('title', 'Wisata Jambi | Manage Wilayah')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">

						@include('components.message')

						<h4 class="card-title text-success">Data Pengunjung {{ $wilayah->nama }}</h4>

						<canvas id="myChart" width="400" height="100"></canvas>

						<div style="float: right; margin-bottom: 20px"><a href="{{ route('admin.statistik.add') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Tambah</a></div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> Periode </th>
										<th> Jumlah Pengunjung </th>
										<th> Aksi </th>
									</tr>
								</thead>
								<tbody>

									@foreach($statistik as $s)
									<tr>
										<td>{{ $s->label }}</td>
										<td>{{ $s->value }} orang</td>
										<td>
											<a href="{{ route('admin.statistik.edit', $s->id) }}" class="btn btn-success btn-sm">Edit</a>
											<a class="btn btn-danger btn-sm" href="{{ route('admin.statistik.delete', $s->id) }}"
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus statistik ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.statistik.delete', $s->id) }}">@csrf</form>
											</a>
										</td>
									</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	@include('components.user-footer')

</div>

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>

@php
	$labels = [];
	$data   = [];
	$limit  = 1;
	foreach($statistik->reverse() as $s){
		if($limit >= 12) break;
		array_push($labels, $s["label"]);
		array_push($data, $s["value"]);

	}
@endphp

var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
		type: 'line',
		data: {
				labels: <?= json_encode($labels) ?>,
				datasets: [{
						label: 'Jumlah Pengunjung',
						data: <?= json_encode($data) ?>,
						backgroundColor: 'rgba(23, 102, 155, 0.1)',
						borderColor: 'rgba(23, 102, 155, 1)',
						borderWidth: 1
				}]
		},
		options: {
				elements: {
						line: {
								tension: 0
						}
				},
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

@endsection
