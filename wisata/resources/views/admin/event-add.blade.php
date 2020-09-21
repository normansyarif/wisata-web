@extends('layouts.user')

@section('title', 'Wisata Jambi | Tambah Event')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-8 offset-md-2 col-sm-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<div class="more-data">

							<form action="{{ route('admin.event.insert') }}" enctype="multipart/form-data" method="post" class="forms-sample">
								@csrf
								<div class="more-data-data">

									@include('components.message')

									<h4 class="card-title mb-3">Tambah Event</h4>
									<div class="row">
										<div class="col-md-4 col-sm-12 mb-3">
											<img id="avatar-preview" src="{{ asset('dist/purple/assets/images/default-image.png') }}" style="width: 100%">
											<button id="avatar-btn" type="button" class="btn btn-primary btn-block">Upload gambar</button>
											<input name="foto" id="avatar-file" type="file" name="" style="display: none">
										</div>
										<div class="col-md-8 col-sm-12">
											<div class="form-group">
												<label>Nama Event</label>
												<input name="nama" type="text" class="form-control" placeholder="Nama" required>
											</div>
											<div class="form-group">
												<label>Lokasi</label>
												<input name="lokasi" type="text" class="form-control" placeholder="Lokasi" required>
											</div>
											<div class="form-group">
												<label>Latitude, Longitude</label>
												<input name="latlng" type="text" class="form-control" placeholder="-1.634503, 103.548480" required>
											</div>
											<div class="form-group">
												<label>Wilayah</label>
												<select class="form-control" name="wilayah" required>
													@foreach($wilayah as $w)
													<option value="{{ $w->id }}">{{ $w->nama }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label>Waktu Dimulai</label>
												<input name="start" type="datetime-local" class="form-control" placeholder="Dimulai" required>
											</div>
											<div class="form-group">
												<label>Waktu Berakhir</label>
												<input name="end" type="datetime-local" class="form-control" placeholder="Berakhir" required>
											</div>
											<div class="form-group">
												<label>Deskripsi</label>
												<textarea placeholder="Deskripsi" class="form-control" required name="deskripsi" style="height: 100px"></textarea>
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

	$('form').on('submit', function () {
		if($('#avatar-file').val() == "") {
			alert('Mohon pilih gambar');
			return false;
		}
		return true;
	});

	$('#avatar-file').change( function(event) {
		$("#avatar-preview").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
	});

	$('#avatar-btn').click(function() {
		$('#avatar-file').trigger('click');
	})
</script>

@endsection
