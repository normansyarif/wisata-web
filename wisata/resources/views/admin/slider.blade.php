@extends('layouts.user')

@section('title', 'Wisata Jambi | Manage Sliders')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">

						@include('components.message')
						
						<h4 class="card-title text-success">Daftar Slider</h4>
						<div style="float: right; margin-bottom: 20px"><a href="{{ route('admin.slider.add') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Tambah</a></div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> Title </th>
										<th> Subtitle </th>
										<th> Aksi </th>
									</tr>
								</thead>
								<tbody>

									@foreach($slider as $s)
									<tr>
										<td>
											
											<img src="{{ asset('uploads/slider/' . $s->foto) }}" class="mr-2" alt="image" />

											{{ $s->title }}
										</td>
										<td> {{ $s->subtitle }} </td>
										<td> 
											<a href="{{ route('admin.slider.edit', $s->id) }}" class="btn btn-success btn-sm">Edit</a> 
											<a class="btn btn-danger btn-sm" href="{{ route('admin.slider.delete', $s->id) }}" 
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus slider ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.slider.delete', $s->id) }}">@csrf</form>
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


