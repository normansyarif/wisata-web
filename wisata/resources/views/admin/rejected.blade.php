@extends('layouts.user')

@section('title', 'Wisata Jambi | Rejected')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">

						@include('components.message')
						
						<h4 class="card-title text-danger">Pengajuan Ditolak</h4>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> Pengaju </th>
										<th> Jenis Usaha </th>
										<th> Tanggal Pengajuan </th>
										<th> Aksi </th>
									</tr>
								</thead>
								<tbody>

									@foreach($homestay as $h)
									<tr>
										<td>
											
											@if($h->user->foto != null)
											<img src="{{ asset('uploads/profile/thumbs/' . $h->user->foto) }}" class="mr-2" alt="image" />
											@else
											<img src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" class="mr-2" alt="image" />
											@endif

											{{ $h->user->name }}
										</td>
										<td> Homestay </td>
										<td> {{ date('Y-m-d H:i', strtotime($h->created_at)) }} </td>
										<td> 
											<a href="{{ route('admin.homestay', $h->id) }}" class="btn btn-info btn-sm">Lihat</a> 
											<a class="btn btn-danger btn-sm" href="{{ route('admin.homestay.delete', $h->id) }}" 
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus entry ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.homestay.delete', $h->id) }}">@csrf</form>
											</a>
										</td>
									</tr>
									@endforeach

									@foreach($souvenir as $s)
									<tr>
										<td>
											
											@if($s->user->foto != null)
											<img src="{{ asset('uploads/profile/thumbs/' . $s->user->foto) }}" class="mr-2" alt="image" />
											@else
											<img src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" class="mr-2" alt="image" />
											@endif

											{{ $s->user->name }}
										</td>
										<td> Souvenir </td>
										<td> {{ date('Y-m-d H:i', strtotime($s->created_at)) }} </td>
										<td> 
											<a href="{{ route('admin.souvenir', $s->id) }}" class="btn btn-info btn-sm">Lihat</a> 
											<a class="btn btn-danger btn-sm" href="{{ route('admin.souvenir.delete', $s->id) }}" 
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus entry ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.souvenir.delete', $s->id) }}">@csrf</form>
											</a>
										</td>
									</tr>
									@endforeach

									@foreach($guide as $g)
									<tr>
										<td>
											
											@if($g->user->foto != null)
											<img src="{{ asset('uploads/profile/thumbs/' . $g->user->foto) }}" class="mr-2" alt="image" />
											@else
											<img src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" class="mr-2" alt="image" />
											@endif

											{{ $g->user->name }}
										</td>
										<td> Tour Guide </td>
										<td> {{ date('Y-m-d H:i', strtotime($g->created_at)) }} </td>
										<td> 
											<a href="{{ route('admin.guide', $g->id) }}" class="btn btn-info btn-sm">Lihat</a> 
											<a class="btn btn-danger btn-sm" href="{{ route('admin.guide.delete', $g->id) }}" 
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus entry ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.guide.delete', $g->id) }}">@csrf</form>
											</a>
										</td>
									</tr>
									@endforeach

									@foreach($art as $a)
									<tr>
										<td>
											
											@if($a->user->foto != null)
											<img src="{{ asset('uploads/profile/thumbs/' . $a->user->foto) }}" class="mr-2" alt="image" />
											@else
											<img src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" class="mr-2" alt="image" />
											@endif

											{{ $a->user->name }}
										</td>
										<td> Kelompok Seni </td>
										<td> {{ date('Y-m-d H:i', strtotime($a->created_at)) }} </td>
										<td> 
											<a href="{{ route('admin.art', $a->id) }}" class="btn btn-info btn-sm">Lihat</a> 
											<a class="btn btn-danger btn-sm" href="{{ route('admin.art.delete', $a->id) }}" 
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus entry ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.art.delete', $a->id) }}">@csrf</form>
											</a>
										</td>
									</tr>
									@endforeach



									@foreach($rm as $g)
									<tr>
										<td>
											
											@if($g->user->foto != null)
											<img src="{{ asset('uploads/profile/thumbs/' . $g->user->foto) }}" class="mr-2" alt="image" />
											@else
											<img src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" class="mr-2" alt="image" />
											@endif

											{{ $g->user->name }}
										</td>
										<td> Rumah Makan </td>
										<td> {{ date('Y-m-d H:i', strtotime($g->created_at)) }} </td>
										<td> 
											<a href="{{ route('admin.rm', $g->id) }}" class="btn btn-info btn-sm">Lihat</a> 
											<a class="btn btn-danger btn-sm" href="{{ route('admin.rm.delete', $g->id) }}" 
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus entry ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.rm.delete', $g->id) }}">@csrf</form>
											</a>
										</td>
									</tr>
									@endforeach

									@foreach($tani as $g)
									<tr>
										<td>
											
											@if($g->user->foto != null)
											<img src="{{ asset('uploads/profile/thumbs/' . $g->user->foto) }}" class="mr-2" alt="image" />
											@else
											<img src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" class="mr-2" alt="image" />
											@endif

											{{ $g->user->name }}
										</td>
										<td> Produk Tani </td>
										<td> {{ date('Y-m-d H:i', strtotime($g->created_at)) }} </td>
										<td> 
											<a href="{{ route('admin.tani', $g->id) }}" class="btn btn-info btn-sm">Lihat</a> 
											<a class="btn btn-danger btn-sm" href="{{ route('admin.tani.delete', $g->id) }}" 
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus entry ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.tani.delete', $g->id) }}">@csrf</form>
											</a>
										</td>
									</tr>
									@endforeach

									@foreach($umkm as $g)
									<tr>
										<td>
											
											@if($g->user->foto != null)
											<img src="{{ asset('uploads/profile/thumbs/' . $g->user->foto) }}" class="mr-2" alt="image" />
											@else
											<img src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" class="mr-2" alt="image" />
											@endif

											{{ $g->user->name }}
										</td>
										<td> UMKM </td>
										<td> {{ date('Y-m-d H:i', strtotime($g->created_at)) }} </td>
										<td> 
											<a href="{{ route('admin.umkm', $g->id) }}" class="btn btn-info btn-sm">Lihat</a> 
											<a class="btn btn-danger btn-sm" href="{{ route('admin.umkm.delete', $g->id) }}" 
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus entry ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.umkm.delete', $g->id) }}">@csrf</form>
											</a>
										</td>
									</tr>
									@endforeach

									@foreach($kendaraan as $g)
									<tr>
										<td>
											
											@if($g->user->foto != null)
											<img src="{{ asset('uploads/profile/thumbs/' . $g->user->foto) }}" class="mr-2" alt="image" />
											@else
											<img src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" class="mr-2" alt="image" />
											@endif

											{{ $g->user->name }}
										</td>
										<td> Kendaraan Sewa </td>
										<td> {{ date('Y-m-d H:i', strtotime($g->created_at)) }} </td>
										<td> 
											<a href="{{ route('admin.kendaraan', $g->id) }}" class="btn btn-info btn-sm">Lihat</a> 
											<a class="btn btn-danger btn-sm" href="{{ route('admin.kendaraan.delete', $g->id) }}" 
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus entry ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.kendaraan.delete', $g->id) }}">@csrf</form>
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


