@extends('layouts.webview')

@section('content')

<section style="z-index: 7" class="search-box">
	<div style="z-index: 8" class="search-group">
		<button style="z-index: 9" class="btn btn-search" ><img src="{{ asset('wv-assets/glass.svg') }}"></button>
		<input id="search-input" style="z-index: 10" name="search" placeholder="Pencarian..." type="search" >
	</div>
</section>

<section style="z-index: 6" class="list-container ">
	<div class="content"></div>
</section>

<section style="z-index: 7" class="more-section">
	<div>
		<a id="more-btn" offset="0" href="javascript:void(0)">Muat lebih banyak</a>
	</div>
	<div class="lds-ring gone" id="loading"><div></div><div></div><div></div><div></div></div>
</section>

@endsection

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

	let keyword = '';

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

	$("#search-input").keyup(function(event) {
	    if (event.keyCode === 13) {
	    	$('#more-btn').attr('offset', 0);
	    	$('.content').empty();
	    	keyword = $('#search-input').val();
	    	getData(0, 'search');
	    }
	});

	function listenForClick() {
		$('.ripple').ripple({
			color:'#CFD8DC',
			time:'.4s'
		});
	}

	function onItemClicked(id) {
		alert(id);
	}

	function startLoading() {
		$('#loading').removeClass('gone');
		$('#more-btn').addClass('gone');
	}

	function stopLoading() {
		$('#loading').addClass('gone');
		$('#more-btn').removeClass('gone');
	}

	function getData(offset, loadType) {

		// loadType options
		// - init (when page first loads)
		// - search
		// - append (when tampilkan lebih banyak is clicked)

		let type = "{{ $_GET['type'] }}";
		let id = "{{ $_GET['id'] }}";

		console.log(keyword);

		startLoading();
		jQuery.ajax({
			url: "/ajax/list?type=" + type + "&id=" + id + "&offset=" + offset + "&loadType=" + loadType + "&keyword=" + keyword,
			method: 'get',
			success: function(result){
				$('.content').append(result);
				listenForClick();
				stopLoading();

				if($('.not-found').length == 1) {
					$('#more-btn').addClass('gone');
				}
			}});
	}
	
	</script>

	@endsection
