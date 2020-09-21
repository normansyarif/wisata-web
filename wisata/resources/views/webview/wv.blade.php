@extends('layouts.webview')

@section('content')

<style type="text/css">
	.deskripsi-wv {
		text-align: justify;

	}

	.deskripsi-wv img {
		max-width: 100%;
	}
</style>

<div style="padding: 0 0 70px 0">
	<section style="z-index: 6; padding: 20px">
		<p style="font-weight:bold; font-size: 1.2em; margin-bottom: 20px; font-style: italic;">{{ $label }} {{ $data->wilayah->nama }}</p>
		<div class="deskripsi-wv">
			{!! $data->deskripsi !!}
		</div>
	</section>
</div>

@endsection
