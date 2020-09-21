@extends('layouts.user')

@section('title', 'Wisata Jambi | Pesan Masuk')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">

						@include('components.message')
						
						<h4 class="card-title text-success">Pesan Masuk</h4>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th> Nama Pengirim </th>
										<th> Email </th>
										<th> Judul </th>
										<th> Aksi </th>
									</tr>
								</thead>
								<tbody>

									@foreach($pesan as $p)
									<tr>
										<td>
											{{ $p->nama }}
										</td>
										<td>{{ $p->email }}</td>
										<td>{{ $p->judul }}</td>
										<td> 
											<button data-toggle="modal" data-target="#view-modal" class="btn btn-success btn-sm" onclick="
											event.preventDefault();
											$('#modal-nama').html('{{ $p->nama }}');
											$('#modal-pesan').html('{{ $p->pesan }}');
											$('#modal-email').attr('href', 'mailto:{{ $p->email }}?subject=[Balasan: {{ $p->judul }}] ');
											">Lihat</button> 
											<a class="btn btn-danger btn-sm" href="{{ route('admin.messages.delete', $p->id) }}" 
											onclick="event.preventDefault();
											if(confirm('Anda yakin ingin menghapus pesan ini?')) {
												$(this).find('form').submit();
											}
											">
											Hapus
											<form method="post" action="{{ route('admin.messages.delete', $p->id) }}">@csrf</form>
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

@section('modals')

<div class="modal fade" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-nama"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <p id="modal-pesan"></p>
        </div>
        <div class="modal-footer">
        	<a id="modal-email" href="#" class="btn btn-primary">Balas</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
  </div>
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


