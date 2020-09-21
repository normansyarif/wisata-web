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

							{{-- form dalam proses pending/reject/approved --}}
							@if($item)
							<form action="{{ route('guide.update', $item->id) }}" enctype="multipart/form-data" method="post" class="forms-sample">
								@csrf
								<div class="more-data-data">

									@include('components.message')

									@if($item->status == 'pending')
									<div class="alert alert-warning">Pengajuan sedang dalam proses verifikasi.</div>
									@elseif($item->status == 'approved')
									<div class="alert alert-success">Pengajuan Anda telah diterima.</div>
									@elseif($item->status == 'rejected')
									<div class="alert alert-danger">Pengajuan Anda ditolak.</div>
									@endif

									<h4 class="card-title mb-3">Data Tour Guide</h4>
									<div class="row">
										<div class="col-md-4 col-sm-12 mb-3">

											@if(Auth::user()->foto != null)
											<img id="avatar-preview" src="{{ url('uploads/profile/' . Auth::user()->foto ) }}" style="width: 100%">
											@else
											<img id="avatar-preview" src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" style="width: 100%">
											@endif
										</div>
										<div class="col-md-8 col-sm-12">
											<p style="font-size: .8em; color: #bbb">Data berikut beserta data profil dan kontak akan ditampilkan di aplikasi.</p>
											<div class="form-group">
												<label>Tarif</label>
												<input {{ ($item->status == 'rejected') ? 'disabled' : '' }} value="{{ $item->tarif }}" name="tarif" type="text" class="form-control" placeholder="Rp. 500.000 per hari" required>
											</div>
											<div class="form-group">
												<label>Deskripsi</label>
												<textarea {{ ($item->status == 'rejected') ? 'disabled' : '' }} class="form-control" required name="deskripsi" placeholder="Deskripsi" style="height: 100px">{{ $item->deskripsi }}</textarea>
											</div>
										</div>
									</div>
								</div>

								@if($item->status != 'rejected')
								<div class="more-data-next-btn">
									<div class="row">
										<div class="col-6">
											<button type="submit" class="btn btn-primary btn-block">Update</button>
										</div>
										<div class="col-6">
											<a href="{{ route('guide.delete', $item->id) }}" class="btn btn-danger btn-block" onclick="
											event.preventDefault();
											if(confirm('Anda yakin ingin berhenti?')) {
												$('#form-delete').submit();
											}
											">Batalkan
											</a>
										</div>
									</div>
								</div>
								@else
								<div class="more-data-next-btn">
									<div class="row">
										<div class="col-6">
											<button data="{{ $item->alasan_tolak }}" data-toggle="modal" data-target="#reason-modal" type="button" class="btn btn-primary btn-block" onclick="
												event.preventDefault();
												let alasan = $(this).attr('data');
												$('#modal-alasan').html(alasan);
											">Alasan Penolakan</button>
										</div>
										<div class="col-6">
											<a href="{{ route('guide.delete', $item->id) }}" class="btn btn-success btn-block" onclick="
											event.preventDefault();
											$('#form-delete').submit();
											">Hapus & Ajukan Kembali
											</a>
										</div>
									</div>
								</div>
								@endif

							</form>

							@else

							{{-- form jika belum diajukan --}}
							<form action="{{ route('guide.insert') }}" enctype="multipart/form-data" method="post" class="forms-sample">
								@csrf
								<div class="more-data-data">

									@include('components.message')

									<h4 class="card-title mb-3">Data Tour Guide</h4>
									<div class="row">
										<div class="col-md-4 col-sm-12 mb-3">

											@if(Auth::user()->foto != null)
											<img id="avatar-preview" src="{{ url('uploads/profile/' . Auth::user()->foto ) }}" style="width: 100%">
											@else
											<img id="avatar-preview" src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" style="width: 100%">
											@endif
										</div>
										<div class="col-md-8 col-sm-12">
											<p style="font-size: .8em; color: #bbb">Data berikut beserta data profil dan kontak akan ditampilkan di aplikasi.</p>
											<div class="form-group">
												<label>Tarif</label>
												<input name="tarif" type="text" class="form-control" placeholder="Rp. 500.000 per hari" required>
											</div>
											<div class="form-group">
												<label>Deskripsi</label>
												<textarea class="form-control" required name="deskripsi" placeholder="Deskripsi" style="height: 100px"></textarea>
											</div>
										</div>
									</div>
								</div>

								<div class="more-data-next-btn">
									<button type="submit" class="btn btn-primary btn-block">Ajukan</button>
								</div>

							</form>

							@endif

						</div>

					</div>
				</div>
			</div>
		</div>

	</div>

	@include('components.user-footer')

</div>

@if($item)
<form id="form-delete" method="post" action="{{ route('guide.delete', $item->id) }}">@csrf</form>
@endif

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


@section('modals')

<div class="modal fade" id="reason-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alasan penolakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
          <p id="modal-alasan"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>

    </div>
  </div>
</div>

@endsection


