@extends('layouts.user')

@section('title', 'Wisata Jambi | Tambah Homestay')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-10 offset-md-1 col-sm-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="more-data">

              @include('components.message')

              <form method="post" action="{{ route('homestay.insert') }}" enctype="multipart/form-data">
                @csrf
                <div class="more-data-data">
                  <h4 class="card-title mb-3">Data Homestay</h4>
                  <div class="row">
                    <div class="col-md-4 col-sm-12 mb-3">
                      <img id="avatar-preview" src="{{ asset('dist/purple/assets/images/default-image.png') }}" style="width: 100%">
                      <button id="avatar-btn" type="button" class="btn btn-primary btn-block">Upload gambar</button>
                      <input name="foto" id="avatar-file" type="file" name="" style="display: none">
                    </div>
                    <div class="col-md-8 col-sm-12">
                      <div class="form-group">
                        <label>Nama Homestay</label>
                        <input name="nama" type="text" class="form-control" placeholder="Nama Homestay" required>
                      </div>
                      <div class="form-group">
                        <label>Kamar Tersedia</label>
                        <input name="kamar-tersedia" type="number" class="form-control" placeholder="Jumlah Kamar Tersedia" required>
                      </div>
                      <div class="form-group">
                        <label>Kisaran Harga</label>
                        <input name="kisaran-harga" type="text" class="form-control" placeholder="Rp. 300.000 - Rp. 500.000" required>
                      </div>

                      <div class="form-group">
                        <label>Alamat</label>
                        <input id="alamat" name="alamat" type="text" class="form-control" placeholder="Alamat" required>
                        <p id="set-default" alamat="{{ Auth::user()->alamat }}" plus-code="{{ Auth::user()->plus_code }}" wilayah="{{ Auth::user()->id_wilayah }}" style="font-size: .7em"><a href="javascript:void(0)">Gunakan alamat profil</a></p>
                      </div>

											<div class="form-group">
												<label>Latitude, Longitude</label>
												<input name="latlng" type="text" class="form-control" placeholder="-1.634503, 103.548480" required>
											</div>
                      <div class="form-group">
                        <label>Wilayah</label>
                        <select id="wilayah" class="form-control" name="wilayah" required>
                          @foreach($wilayah as $w)
                          <option value="{{ $w->id }}">{{ $w->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Fasilitas</label>
                        <textarea class="form-control" name="fasilitas" style="height: 100px" placeholder="Fasilitas" required></textarea>
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

@section('scripts')

<script type="text/javascript">

  $('form').on('submit', function () {
    if($('#avatar-file').val() == "") {
      alert('Mohon pilih gambar');
      return false;
    }
    return true;
  });

  $('#avatar-file').change( function(event) {
    $("#avatar-preview").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
  });

  $('#avatar-btn').click(function() {
    $('#avatar-file').trigger('click');
  });

  $('#set-default').click(function() {
    $('#alamat').val($(this).attr('alamat'));
    $('#plus-code').val($(this).attr('plus-code'));
    $('#wilayah').val($(this).attr('wilayah'));
  });
</script>

@endsection
