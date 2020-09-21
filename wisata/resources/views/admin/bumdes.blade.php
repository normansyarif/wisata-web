@extends('layouts.user')

@section('title', 'Bumdes')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">

						@include('components.message')

						<h4 class="card-title text-success">Daftar Bumdes</h4>
						<div style="float: right; margin-bottom: 20px"><a href="{{ route('admin.bumdes.add') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Tambah</a></div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> Wilayah </th>
										<th> Lokasi </th>
										<th> Aksi </th>
									</tr>
								</thead>
								<tbody>

									@foreach($bumdes as $item)
									<tr>
										<td>
											{{ $item->wilayah->nama }}
										</td>
										<td>
											<a href="https://maps.google.com/?q={{ $item->latlng }}" target="_blank"> {{ $item->latlng }} </a>
										</td>
										<td>
											<a href="{{ route('admin.bumdes.edit', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
											<a class="btn btn-danger btn-sm" href="{{ route('admin.bumdes.delete', $item->id) }}"
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus bumdes ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.bumdes.delete', $item->id) }}">@csrf</form>
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
    	"order": [[ 0, "asc" ]]
    });
  } );
</script>

@endsection
