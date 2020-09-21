@extends('layouts.user')

@section('title', 'Pemerintah | Edit Pemerintah')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-8 offset-md-2 col-sm-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<div class="more-data">

							<form action="{{ route('admin.gov.update', $gov->id) }}" method="post" class="forms-sample">
								@csrf
								<div class="more-data-data">

									@include('components.message')

									<h4 class="card-title mb-3">Edit Pemerintah</h4>
									<div class="row">

										<div class="col-md-8 col-sm-12">
											<div class="form-group">
												<label>Wilayah</label>
												<select class="form-control" name="wilayah" required>
													@foreach($wilayah as $w)
													<option {{ ($gov->wilayah_id == $w->id) ? 'selected' : '' }} value="{{ $w->id }}">{{ $w->nama }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label>Latitude, Longitude</label>
												<input value="{{ $gov->latlng }}" name="latlng" type="text" class="form-control" placeholder="-1.634503, 103.548480" required>
											</div>
											<div class="form-group">
												<label>Deskripsi</label>
												<textarea name="deskripsi" placeholder="Deskripsi" required class="form-control" style="height: 100px">{{ $gov->deskripsi }}</textarea>
											</div>
										</div>
									</div>
								</div>

								<div class="more-data-next-btn">
									<button type="submit" class="btn btn-primary btn-block">Simpan</button>
								</div>

							</form>

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

<script type="text/javascript">

	$('#avatar-file').change( function(event) {
		$("#avatar-preview").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
	});

	$('#avatar-btn').click(function() {
		$('#avatar-file').trigger('click');
	})
</script>

@endsection
