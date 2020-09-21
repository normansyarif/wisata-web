@extends('layouts.user')

@section('title', 'Wisata Jambi')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">

						@include('components.message')

						<h4 class="card-title text-success">Daftar</h4>
						<div style="float: right; margin-bottom: 20px"><a href="{{ route('umkm.add') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Tambah</a></div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> Nama </th>
										<th> Wilayah </th>
										<th> Status </th>
										<th> Aksi </th>
									</tr>
								</thead>
								<tbody>

									@foreach($items as $i)
									<tr>
										<td>

											@if($i->foto != null)
											<img src="{{ asset('uploads/umkm/thumbs/' . $i->foto) }}" class="mr-2" alt="image" />
											@else
											<img src="{{ asset('dist/purple/assets/images/default-image.png') }}" class="mr-2" alt="image" />
											@endif

											{{ $i->nama }}
										</td>
										<td> {{ $i->wilayah->nama }} </td>

										@if($i->status == 'pending')
										<td><label class="badge badge-gradient-warning">In progress</label></td>
										<td>
											<a href="{{ route('umkm.edit', $i->id) }}" class="btn btn-success btn-sm">Edit</a>
											<a class="btn btn-danger btn-sm" href="{{ route('umkm.delete', $i->id) }}"
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus entry ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('umkm.delete', $i->id) }}">@csrf</form>
											</a>
										</td>

										@elseif($i->status == 'approved')
										<td><label class="badge badge-gradient-success">Approved</label></td>
										<td>
											<a href="{{ route('umkm.edit', $i->id) }}" class="btn btn-success btn-sm">Edit</a>
											<a class="btn btn-danger btn-sm" href="{{ route('umkm.delete', $i->id) }}"
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus entry ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('umkm.delete', $i->id) }}">@csrf</form>
											</a>
										</td>

										@else
										<td><label class="badge badge-gradient-danger">Rejected</label></td>
										<td>
											<button aria-data="{{ $i->alasan_tolak }}" data-toggle="modal" data-target="#reason-modal" type="button" class="btn btn-info btn-sm" onclick="
												event.preventDefault();
												let alasan = $(this).attr('aria-data');
												$('#modal-alasan').html(alasan);
											">Alasan Penolakan</button>
											<a class="btn btn-danger btn-sm" href="{{ route('umkm.delete', $i->id) }}"
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus entry ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('umkm.delete', $i->id) }}">@csrf</form>
											</a>
										</td>
										@endif
									</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
				</div>

				<p class="mt-4" style="font-size: .8em">NOTE: Entri yang diajukan perlu dilakukan verifikasi dan ditandai dengan status <label style="font-size: 10px" class="badge badge-gradient-warning">In progress</label><br>Tim kami mungkin akan menghubungi Anda untuk memvalidasi data yang telah diajukan.</p>

			</div>
		</div>

	</div>

	@include('components.user-footer')

</div>

@endsection

@section('scripts')

<script type="text/javascript">
  $(document).ready( function () {
    $('table').DataTable({
    	"order": [[ 3, "desc" ]]
    });
  } );
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
