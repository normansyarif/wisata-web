@extends('layouts.user-nosidebar')

@section('title', 'Wisata Jambi | Lengkapi Data')

@section('content')

<div class="main-panel" style="width: 100%">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-8 offset-md-2 col-sm-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<div class="more-data">

							<form action="{{ route('complete-data.post') }}" enctype="multipart/form-data" method="post" class="forms-sample">
								@csrf
								<div class="more-data-data">

									@include('components.message')

									<h4 class="card-title mb-3">Lengkapi Data Diri Anda</h4>
									<div class="row">
										<div class="col-md-4 col-sm-12 mb-3">
											<img id="avatar-preview" src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" style="width: 100%">
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
													<input name="hp" type="number" class="form-control" placeholder="81234567890" aria-label="HP" aria-describedby="basic-addon1" required>
												</div>
											</div>
											<div class="form-group">
												<label>No WhatsApp</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">+62</span>
													</div>
													<input name="wa" type="number" class="form-control" placeholder="81234567890" aria-label="WhatsApp" aria-describedby="basic-addon1" required>
												</div>
											</div>
											<div class="form-group">
												<label>Alamat</label>
												<input name="alamat" type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat" required>
											</div>
											<div class="form-group">
												<label>Wilayah</label>
												<select name="wilayah" class="form-control" required>
													
													@foreach($wilayah as $w)
													<option value="{{ $w->id }}">{{ $w->nama }}</option>
													@endforeach
													
												</select>
											</div>
											<div class="form-group">
												<label>Plus Code (opsional)</label>
												<input name="plus-code" type="text" class="form-control" placeholder="9J95+Q4 Jambi, Jambi City, Jambi, Indonesia">
												<p style="font-size: .7em">Plus code membantu wisatawan menemukan lokasi Anda. <a target="__blank" href="{{ route('plus-code') }}">Pelajari cara menemukan plus code.</a></p>
											</div>
											<input name="jenis-usaha" id="jenis-usaha" type="hidden" >
										</div>
									</div>
								</div>

								<div class="more-data-usaha">
									<h4 class="card-title mb-3">Pilih Jenis Usaha</h4>
									<div class="row">
										<div class="col-md-3 col-sm-12 mb-3">
											<div class="select-usaha" aria-data="homestay">
												<img src="{{ asset('dist/purple/assets/images/homestay.jpg') }}">
												<p>Homestay</p>
											</div>
										</div>
										<div class="col-md-3 col-sm-12 mb-3">
											<div class="select-usaha" aria-data="souvenir">
												<img src="{{ asset('dist/purple/assets/images/souvenir.jpg') }}">
												<p>Souvenir</p>
											</div>
										</div>
										<div class="col-md-3 col-sm-12 mb-3">
											<div class="select-usaha" aria-data="guide">
												<img src="{{ asset('dist/purple/assets/images/guide.jpg') }}">
												<p>Tour Guide</p>
											</div>
										</div>
										<div class="col-md-3 col-sm-12 mb-3">
											<div class="select-usaha" aria-data="art">
												<img src="{{ asset('dist/purple/assets/images/seni.jpg') }}">
												<p>Kelompok Seni</p>
											</div>
										</div>
										
										
										<div class="col-md-3 col-sm-12 mb-3">
											<div class="select-usaha" aria-data="rm">
												<img src="{{ asset('dist/purple/assets/images/homestay.jpg') }}">
												<p>Rumah Makan</p>
											</div>
										</div>
										<div class="col-md-3 col-sm-12 mb-3">
											<div class="select-usaha" aria-data="tani">
												<img src="{{ asset('dist/purple/assets/images/souvenir.jpg') }}">
												<p>Produk Tani</p>
											</div>
										</div>
										<div class="col-md-3 col-sm-12 mb-3">
											<div class="select-usaha" aria-data="umkm">
												<img src="{{ asset('dist/purple/assets/images/guide.jpg') }}">
												<p>UMKM</p>
											</div>
										</div>
										<div class="col-md-3 col-sm-12 mb-3">
											<div class="select-usaha" aria-data="kendaraan">
												<img src="{{ asset('dist/purple/assets/images/seni.jpg') }}">
												<p>Kendaraan Sewa</p>
											</div>
										</div>
									</div>
								</div>

								<div class="more-data-next-btn">
									<button type="submit" class="btn btn-primary btn-block">Selanjutnya ></button>
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
	$('.select-usaha').click(function() {
		let jenis = $(this).attr('aria-data');
		$('#jenis-usaha').val(jenis);
		$('.select-usaha').removeClass('usaha-selected');
		$(this).addClass('usaha-selected');
	});

	$('form').on('submit', function () {
		if($('#jenis-usaha').val() == ""){
			alert('Mohon pilih jenis usaha terlebih dahulu');
			return false;
		} else {
			if($('#avatar-file').val() == "") {
				alert('Mohon pilih foto profil anda');
				return false;
			}
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
