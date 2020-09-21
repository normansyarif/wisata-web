@if(count($data) > 0)

@foreach($data as $d)
<div class="list-comment">
	<div class="item">
		<div class="item-name-container">
			<p class="item-comment-name">{{ $d->nama }}</p>
			<p class="item-rating-2">

				@for($j = 0; $j < $d->rating; $j++)
				<img src="{{ asset('wv-assets/star-yellow.svg') }}">
				@endfor

			</p>
			<p class="item-comment">{{ $d->komentar }}</p>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
@endforeach
	@if($end == "true")
		<script type="text/javascript">
			$('#more-btn').css('display', 'none');
			alert('end');
		</script>
	@endif
@else
	@if($_GET['loadType'] == 'init')
		<div class="not-found">
		Tidak ada ulasan
	</div>
	@else
	<script type="text/javascript">
		$('#more-btn').css('display', 'none');
		alert('end');
	</script>
	@endif
@endif
