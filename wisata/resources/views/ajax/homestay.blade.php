@if(count($data) > 0)
@foreach($data as $d)
<a onclick="onItemClicked({{ $d->id }})" data="{{ $d->id }}" href="javascript:void(0)" class="list-item ripple">
	<div class="item">
		<div class="item-img-container">
			<img src="{{ url('uploads/homestay/thumbs/' . $d->foto) }}">
		</div>
		<div class="item-title-container">
			<p class="item-title">{{ $d->nama }}</p>
			<p class="item-subtitle">{{ $d->kisaran_harga }}</p>

			@if(count($d->reviews) > 0)
			<p class="item-rating">
				@php
				$reviews = $d->reviews->toArray();
				$userCount = 0;
				$sum = 0;

				for ($i=0; $i < count($reviews); $i++) { 
					$userCount++;
					$sum += $reviews[$i]['rating'];
				}

				$avg = round($sum/$userCount);

				@endphp

				@for($j = 0; $j < $avg; $j++)
				<img src="{{ asset('wv-assets/star-yellow.svg') }}">
				@endfor

				<span class="rating-number">({{ $userCount }})</span>
			</p>
			@endif

		</div>
		<div class="clear"></div>
	</div>
</a>
@endforeach
	@if($end == "true")
		<script type="text/javascript">
			$('#more-btn').css('display', 'none');
			alert('end');
		</script>
	@endif
@else
	@if($_GET['loadType'] == 'search' || $_GET['loadType'] == 'init')
	<div class="not-found">
		Tidak ada data
	</div>
	@else
	<script type="text/javascript">
		$('#more-btn').css('display', 'none');
		alert('end');
	</script>
	@endif
@endif
