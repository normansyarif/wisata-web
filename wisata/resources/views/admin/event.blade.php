@extends('layouts.user')

@section('title', 'Wisata Jambi | Manage Events')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">

						@include('components.message')

						<h4 class="card-title text-success">Daftar Event</h4>
						<div style="float: right; margin-bottom: 20px"><a href="{{ route('admin.event.add') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Tambah</a></div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> Nama Event </th>
										<th> Wilayah </th>
										<th> Waktu Mulai </th>
										<th> Waktu Berakhir </th>
										<th> Status </th>
										<th> Aksi </th>
									</tr>
								</thead>
								<tbody>


									@foreach($event as $e)
									<tr>
										<td>

											<img src="{{ asset('uploads/event/thumbs/' . $e->foto) }}" class="mr-2" alt="image" />

											{{ $e->nama }}
										</td>
										<td>{{ $e->wilayah->nama }}</td>
										<td>{{ date('Y-m-d H:i', $e->start) }}</td>
										<td>{{ date('Y-m-d H:i', $e->end) }}</td>

										@if(time() > $e->start && time() < $e->end)
										<td><label class="badge badge-gradient-success">Sedang berlangsung</label></td>
										@elseif(time() > $e->end)
										<td><label class="badge badge-gradient-danger">Telah berakhir</label></td>
										@else
										<td><label class="badge badge-gradient-info">Akan datang</label></td>
										@endif

										<td>
											<a href="{{ route('admin.event.edit', $e->id) }}" class="btn btn-success btn-sm">Edit</a>
											<a class="btn btn-danger btn-sm" href="{{ route('admin.event.delete', $e->id) }}"
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus event ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.event.delete', $e->id) }}">@csrf</form>
											</a>
										</td>
									</tr>
									@endforeach

								</tbody>
							</table>
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
  $(document).ready( function () {
    $('table').DataTable({
    	"order": [[ 2, "desc" ]]
    });
  } );
</script>

@endsection
