@extends('layouts.webview')

@section('content')

<div style="padding: 0 0 70px 0">
	<section style="z-index: 6" class="list-container ">
		<div class="content-comment"></div>
	</section>

	<section style="z-index: 7" class="more-section">
		<div>
			<a id="more-btn" offset="0" href="javascript:void(0)">Muat lebih banyak</a>
		</div>
		<div class="lds-ring gone" id="loading"><div></div><div></div><div></div><div></div></div>
	</section>
</div>

@section('scripts')

<script type="text/javascript">
	$(document).ready(function(){
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
		})
	});

</script>
<script type="text/javascript">

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
	});

	getData(0, 'init');

	$('#more-btn').click(function() {
		let currentOffset = $(this).attr('offset');
		let newOffset = parseInt(currentOffset) + 20;
		$(this).attr('offset', newOffset);
		getData(newOffset, 'append');
	})

	function startLoading() {
		$('#loading').removeClass('gone');
		$('#more-btn').addClass('gone');
	}

	function stopLoading() {
		$('#loading').addClass('gone');
		$('#more-btn').removeClass('gone');
	}

	function getData(offset, loadType) {

		let type = "{{ $_GET['type'] }}";
		let id = "{{ $_GET['id'] }}";

		startLoading();
		jQuery.ajax({
			url: "/ajax/review-content?id=" + id + "&offset=" + offset + "&type=" + type + "&loadType=" + loadType,
			method: 'get',
			success: function(result){
				$('.content-comment').append(result);
				stopLoading();

				if($('.not-found').length == 1) {
					$('#more-btn').addClass('gone');
				}
			}});
	}
	
</script>

@endsection
