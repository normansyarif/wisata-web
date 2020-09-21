@extends('layouts.user')

@section('title', 'Wisata Jambi | Manage Users')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">

						@include('components.message')
						
						<h4 class="card-title text-success">Daftar Pengguna</h4>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> Nama </th>
										<th> Jenis Usaha </th>
										<th> Wilayah </th>
										<th> Aksi </th>
									</tr>
								</thead>
								<tbody>

									@foreach($users as $u)
									@if($u->jenis_usaha != 'admin' && $u->wilayah)
									<tr>
										<td>
											
											@if($u->foto != null)
											<img src="{{ url('uploads/profile/thumbs/' . $u->foto) }}" class="mr-2" alt="image" />
											@else
											<img src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" class="mr-2" alt="image" />
											@endif

											{{ $u->name }}
										</td>
										<td>
											@if($u->jenis_usaha == 'homestay')
											Pemilik Homestay
											@elseif($u->jenis_usaha == 'guide')
											Tour Guide
											@elseif($u->jenis_usaha == 'art')
											Pengelola Kelompok Seni
											@elseif($u->jenis_usaha == 'souvenir')
											Pedagang Souvenir
											@else
											(Belum terdaftar)
											@endif
										</td>
										
										<td>{{ $u->wilayah->nama }}</td>

										<td> 
											<a href="{{ route('admin.users.view', $u->id) }}" class="btn btn-success btn-sm">Lihat</a> 
											<a class="btn btn-danger btn-sm" href="{{ route('admin.users.delete', $u->id) }}" 
											onclick="event.preventDefault();
											if(confirm('Menghapus pengguna juga akan menghapus semua entry yang pernah dibuat oleh pengguna yang bersangkutan. Lanjutkan?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.users.delete', $u->id) }}">@csrf</form>
											</a>
										</td>
									</tr>
									@endif
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


