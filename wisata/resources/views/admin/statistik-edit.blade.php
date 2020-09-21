@extends('layouts.user')

@section('title', 'Wisata Jambi | Edit Statistik')

@section('content')

<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-8 offset-md-2 col-sm-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<div class="more-data">

							<form action="{{ route('admin.statistik.update', $statistik->id) }}" method="post" class="forms-sample">
								@csrf
								<div class="more-data-data">

									@include('components.message')

									<h4 class="card-title mb-3">Edit Statistik</h4>
									<div class="row">
										<div class="col-md-8 col-sm-12">

											<div class="form-group">
												<label>Wilayah</label>
												<select class="form-control" name="wilayah" required>
													@foreach($wilayah as $w)
													<option {{ ($statistik->id_wilayah == $w->id) ? 'selected' : '' }} value="{{ $w->id }}">{{ $w->nama }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label>Periode</label>
												<input name="label" type="month" class="form-control" placeholder="01/2020" value="{{$statistik->label}}" required>
											</div>
											<div class="form-group">
												<label>Total Pengunjung</label>
												<input name="value" type="number" min="0" class="form-control" placeholder="0" value="{{$statistik->value}}" required>
											</div>

										</div>
									</div>
								</div>

								<div class="more-data-next-btn">
									<button type="submit" class="btn btn-primary btn-block">Simpan</button>
								</div>

							</form>

						</div>

					</div>
				</div>
			</div>
		</div>

	</div>

	@include('components.user-footer')

</div>

@endsection
