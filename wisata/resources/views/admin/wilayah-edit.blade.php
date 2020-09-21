@extends('layouts.user')

@section('title', 'Wisata Jambi | Edit Wilayah')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-8 offset-md-2 col-sm-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<div class="more-data">

							<form action="{{ route('admin.wilayah.update', $wilayah->id) }}" enctype="multipart/form-data" method="post" class="forms-sample">
								@csrf
								<div class="more-data-data">

									@include('components.message')

									<h4 class="card-title mb-3">Edit Wilayah</h4>
									<div class="row">
										<div class="col-md-4 col-sm-12 mb-3">
											<img id="avatar-preview" src="{{ url('uploads/wilayah/' . $wilayah->foto) }}" style="width: 100%">
											<button id="avatar-btn" type="button" class="btn btn-primary btn-block">Ganti gambar</button>
											<input name="foto" id="avatar-file" type="file" name="" style="display: none">
										</div>
										<div class="col-md-8 col-sm-12">
											<div class="form-group">
												<label>Nama</label>
												<input value="{{ $wilayah->nama }}" name="nama" type="text" class="form-control" placeholder="Title" required>
											</div>
											<div class="form-group">
												<label>Youtube Link</label>
												<textarea name="youtube" placeholder="https://www.youtube.com/embed/id" required class="form-control" style="height: 100px">{{ $wilayah->youtube }}</textarea>
											</div>
											<div class="form-group">
												<label>Latitude, Longitude</label>
												<input value="{{ $wilayah->latlang }}" name="latlang" type="text" class="form-control" placeholder="-1.634503, 103.548480" required>
											</div>
											<div class="form-group">
												<label>Deskripsi</label>
												<textarea name="deskripsi" placeholder="Deskripsi" required class="form-control" style="height: 100px">{{ $wilayah->deskripsi }}</textarea>
											</div>
											<div class="form-group">
												<label>Narasi</label>
												<textarea name="narasi" placeholder="Narasi Wilayah" required class="form-control" style="height: 100px">{{ $wilayah->narasi }}</textarea>
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
