@extends('layouts.user')

@section('title', 'Wisata Jambi | Tambah Wilayah')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-8 offset-md-2 col-sm-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<div class="more-data">

							<form action="{{ route('admin.wilayah.insert') }}" enctype="multipart/form-data" method="post" class="forms-sample">
								@csrf
								<div class="more-data-data">

									@include('components.message')

									<h4 class="card-title mb-3">Tambah Wilayah</h4>
									<div class="row">
										<div class="col-md-4 col-sm-12 mb-3">
											<img id="avatar-preview" src="{{ asset('dist/purple/assets/images/default-image.png') }}" style="width: 100%">
											<button id="avatar-btn" type="button" class="btn btn-primary btn-block">Upload gambar</button>
											<input name="foto" id="avatar-file" type="file" name="" style="display: none">
										</div>
										<div class="col-md-8 col-sm-12">
											<div class="form-group">
												<label>Nama Wilayah</label>
												<input name="nama" type="text" class="form-control" placeholder="Title" required>
											</div>
											<div class="form-group">
												<label>Youtube Link</label>
												<input name="youtube" type="text" class="form-control" placeholder="https://www.youtube.com/embed/id" required>
											</div>
											<div class="form-group">
												<label>Latitude, Longitude</label>
												<input name="latlang" type="text" class="form-control" placeholder="-1.634503, 103.548480" required>
											</div>
											<div class="form-group">
												<label>Deskripsi</label>
												<textarea name="deskripsi" placeholder="Deskripsi" required class="form-control" style="height: 100px"></textarea>
											</div>
											<div class="form-group">
												<label>Narasi</label>
												<input name="narasi" type="text" class="form-control" placeholder="Narasi wilayah" required>
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
