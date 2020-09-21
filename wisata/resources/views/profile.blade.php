@extends('layouts.user')

@section('title', 'Wisata Jambi | Profil')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-sm-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<div class="more-data">

							<form action="{{ route('profile.update') }}" enctype="multipart/form-data" method="post" class="forms-sample">
								@csrf
								<div class="more-data-data">

									@include('components.message')

									<h4 class="card-title mb-3">Pengaturan Profil</h4>
									<div class="row">
										<div class="col-md-4 col-sm-12 mb-3">

											@if(Auth::user()->foto != null)
											<img id="avatar-preview" src="{{ url('uploads/profile/' . Auth::user()->foto ) }}" style="width: 100%">
											@else
											<img id="avatar-preview" src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" style="width: 100%">
											@endif

											<button id="avatar-btn" type="button" class="btn btn-primary btn-block">Ganti foto</button>
											<input name="foto" id="avatar-file" type="file" name="" style="display: none">
										</div>
										<div class="col-md-8 col-sm-12">
											<div class="form-group">
												<label>No Telp</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">+62</span>
													</div>
													<input value="{{ Auth::user()->hp }}" name="hp" type="number" class="form-control" placeholder="81234567890" aria-label="HP" aria-describedby="basic-addon1" required>
												</div>
											</div>
											<div class="form-group">
												<label>No WhatsApp</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">+62</span>
													</div>
													<input value="{{ Auth::user()->wa }}" name="wa" type="number" class="form-control" placeholder="81234567890" aria-label="WhatsApp" aria-describedby="basic-addon1" required>
												</div>
											</div>
											<div class="form-group">
												<label>Alamat</label>
												<input value="{{ Auth::user()->alamat }}" name="alamat" type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat" required>
											</div>
											<div class="form-group">
												<label>Wilayah</label>
												<select name="wilayah" class="form-control" required>
													
													@foreach($wilayah as $w)
													<option {{ (Auth::user()->id_wilayah == $w->id) ? 'selected' : '' }} value="{{ $w->id }}">{{ $w->nama }}</option>
													@endforeach
													
												</select>
											</div>
											<div class="form-group">
												<label>Plus Code (opsional)</label>
												<input value="{{ Auth::user()->plus_code }}" name="plus-code" type="text" class="form-control" placeholder="9J95+Q4 Jambi, Jambi City, Jambi, Indonesia">
												<p style="font-size: .7em">Plus code membantu wisatawan menemukan lokasi Anda. <a target="__blank" href="{{ route('plus-code') }}">Pelajari cara menemukan plus code.</a></p>
											</div>
											<div class="form-group">
												<button type="button" data-toggle="modal" data-target="#pass-modal" class="btn btn-info btn-sm">Ubah password</button>
											</div>
										</div>
									</div>
								</div>

								<div class="more-data-next-btn">
									<button type="submit" class="btn btn-primary btn-block">Selanjutnya</button>
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


@section('modals')

<div class="modal fade" id="pass-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="{{ route('profile.pass.update') }}">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label>Password Lama</label>
						<input name="old-pass" type="password" class="form-control" placeholder="Password lama" required>
					</div>
					<div class="form-group">
						<label>Password Baru</label>
						<input name="new-pass" type="password" class="form-control" placeholder="Password baru" required>
					</div>
					<div class="form-group">
						<label>Ulangi Password</label>
						<input name="confirm-pass" type="password" class="form-control" placeholder="Ulangi password" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Ubah</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</form>
		</div>
	</div>
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
