@extends('layouts.user')

@section('title', 'Wisata Jambi | Manage Wilayah')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">

						@include('components.message')
						
						<h4 class="card-title text-success">Daftar Wilayah</h4>
						<div style="float: right; margin-bottom: 20px"><a href="{{ route('admin.wilayah.add') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Tambah</a></div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> Nama Wilayah </th>
										<th> Aksi </th>
									</tr>
								</thead>
								<tbody>

									@foreach($wilayah as $w)
									<tr>
										<td>
											
											<img src="{{ asset('uploads/wilayah/thumbs/' . $w->foto) }}" class="mr-2" alt="image" />

											{{ $w->nama }}
										</td>
										<td> 
											<a href="{{ route('admin.wilayah.edit', $w->id) }}" class="btn btn-success btn-sm">Edit</a> 
											<a class="btn btn-danger btn-sm" href="{{ route('admin.wilayah.delete', $w->id) }}" 
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus wilayah ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.wilayah.delete', $w->id) }}">@csrf</form>
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


