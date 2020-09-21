@extends('layouts.webview')

@section('content')

<section class="mt-2">
	<table class="label-table">
		<tr>
			<td class="main-label" style="font-style: italic">{{$namaWilayah}}</td>
		</tr>
	</table>

	<div class="section-content">
		<p class="narasi">
			{{$narasi}}
		</p>
		<iframe class="mt-2" style="width: 100%; height: 215px" src="{{$youtube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
</section>



<section class="mt-2">
	<table class="label-table">
		<tr>
			<td class="main-label">Event</td>
			<td class="all" rowspan="2"><a href="javascript:void(0)" onclick="onClicked('event-index', {{ $id }})" class="all-link">Lihat Semua</a></td>
		</tr>
		<tr>
			<td class="sub-label">Event-event seru yang ada di {{ $namaWilayah }}</td>
		</tr>
	</table>

	@if(count($event) > 0)
	<div class="horizontal-menu">
		<div class="horizontal-menu-items">

			@foreach($event as $e)
			<a onclick="onClicked('event-detail', {{ $e->id }})" href="javascript:void(0)" class="horizontal-menu-item card-item ripple">
				<div class="img-container">
					<img src="{{ url('uploads/event/thumbs/' . $e->foto) }}">
				</div>
				<div class="label-container">
					<div class="label-top">{{ $e->nama }}</div>
					<div class="label-bottom">{{ date('D, j M y. H:i', $e->start) }}</div>
				</div>
			</a>
			@endforeach

		</div>
	</div>
	@else
	<div class="not-found">
		Tidak ada data
	</div>
	@endif

	<div class="chart">
		<canvas id="bar-chart" width="800" height="450"></canvas>
	</div>

</section>

@endsection

@section('scripts')

<script type="text/javascript">
	$(document).ready(function(){
		let i = 1;
		$(".img-container").each(function(){
			var refH = $(this).height();
			var refW = $(this).width();
			var refRatio = refW/refH;

			var imgH = $(this).children("img").height();
			var imgW = $(this).children("img").width();

			if ( (imgW/imgH) < refRatio ) {
				$(this).addClass("portrait");
			} else {
				$(this).addClass("landscape");
			}
			i++;
		})
	});

</script>
<script type="text/javascript">
	$('.ripple').ripple({
		color:'#ffffff',
		time:'.4s'
	});

	function onClicked(type, id) {
		alert(type + ';' + id);
	}
</script>


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

<script type="text/javascript">
	// Bar chart
	new Chart(document.getElementById("bar-chart"), {
		type: 'bar',
		data: {
			labels: <?= json_encode($labels) ?>,
			datasets: [
			{
				label: "Jumlah Pengunjung",
				backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
				data: <?= json_encode($data) ?>
			}
			]
		},
		options: {
			legend: { display: false },
			title: {
				display: true,
				text: 'Jumlah Pengunjung'
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
