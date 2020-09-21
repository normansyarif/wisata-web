@if(count($data) > 0)
@foreach($data as $d)
<a onclick="onItemClicked({{ $d->id }})" data="{{ $d->id }}" href="javascript:void(0)" class="list-item ripple">
	<div class="item">
		<div class="item-img-container">
			<img src="{{ url('uploads/event/thumbs/' . $d->foto) }}">
		</div>
		<div class="item-title-container">
			<p class="item-title">{{ $d->nama }}</p>
			<p class="item-subtitle">{{ date('D, j M y. H:i', $d->start) }}</p>
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
