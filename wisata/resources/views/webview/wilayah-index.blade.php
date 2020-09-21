@extends('layouts.webview')

@section('content')

<section class="mt-2 pb-5">
	<table class="label-table"> 
		<tr>
			<td class="main-label">Wilayah</td>
		</tr>
		<tr>
			<td class="sub-label">Pilih wilayah wisata</td>
		</tr>
	</table>

	<div class="v-scroll-container">

		@if(count($wilayah) > 0)
		@foreach($wilayah as $w)
		<a data="{{ $w->id }}" href="javascript:void(0)" class="horizontal-menu-item card-item v-scroll ripple">
			<div class="img-container">
				<img src="{{ url('uploads/wilayah/thumbs/' . $w->foto) }}">
			</div>
			<div class="label-container">
				<div class="label-top">{{ $w->nama }}</div>
				<div class="label-bottom">{{ $w->deskripsi }}</div> 
			</div>
		</a>
		@endforeach
		@else
		<div class="not-found">
			Tidak ada data
		</div>
		@endif

		<div class="clear"></div>

	</div>
</section>

@endsection

@section('scripts')

<script type="text/javascript">
	// $(document).ready(function(){
	// 	let i = 1;
	// 	$(".img-container").each(function(){
	// 		var refH = $(this).height();
	// 		var refW = $(this).width();
	// 		var refRatio = refW/refH;

	// 		alert(i + ". " + refW);

	// 		var imgH = $(this).children("img").height();
	// 		var imgW = $(this).children("img").width();

	// 		if ( (imgW/imgH) < refRatio ) { 
	// 			$(this).addClass("portrait");
	// 		} else {
	// 			$(this).addClass("landscape");
	// 		}
	// 		i++;
	// 	})
	// });

</script>
<script type="text/javascript">
	$('.ripple').ripple({
		color:'#ffffff',
		time:'.4s'
	});

	$('.card-item').click(function() {
		let id = $(this).attr('data');
		alert(id);
	});
</script>

@endsection
