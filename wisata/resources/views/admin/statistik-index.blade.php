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

						<h4 class="card-title text-success">Statistik Berdasar Wilayah</h4>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> Nama Wilayah </th>
									</tr>
								</thead>
								<tbody>

									@foreach($wilayah as $w)
									<tr>
										<td>
                      <a href="{{ route('admin.statistikView', $w['id']) }}">
  											<img src="{{ asset('uploads/wilayah/thumbs/' . $w->foto) }}" class="mr-2" alt="image" />

  											{{ $w->nama }}
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
