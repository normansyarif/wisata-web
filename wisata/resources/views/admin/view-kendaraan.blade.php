@extends('layouts.user')

@section('title', 'Wisata Jambi')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-10 offset-md-1 col-sm-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="more-data">

              @include('components.message')

              <div class="more-data-data">
                <h4 class="card-title mb-3">Data Item</h4>
                <div class="row">
                  <div class="col-md-4 col-sm-12 mb-3">
                    <a target="__blank" href="{{ url('uploads/kendaraan/' . $data->foto) }}">
                      <img id="avatar-preview" src="{{ url('uploads/kendaraan/' . $data->foto) }}" style="width: 100%">
                    </a>
                  </div>
                  <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <p class="data-text">{{ $data->nama }}</p>
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <p class="data-text">

                        @if($data->deskripsi != null)
                        {{ $data->deskripsi }}
                        @else
                        Tidak ada deskripsi
                        @endif

                      </p>
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <p class="data-text">{{ $data->alamat }}</p>
                    </div>
                    <div class="form-group">
                      <label>Wilayah</label>
                      <p class="data-text">{{ $data->wilayah->nama }}</p>
                    </div>

                    @if($data->plus_code != null)
                    <div class="form-group">
                      <p><a target="__blank" href="https://www.google.com/maps/search/{{ urlencode($data->plus_code) }}">Lihat di Google Maps</a></p>
                    </div>
                    @endif

                    @if($data->alasan_tolak != null)
                    <div class="form-group text-danger">
                      <label>Alasan Penolakan</label>
                      <p class="data-text">{{ $data->alasan_tolak }}</p>
                    </div>
                    @endif

                  </div>
                </div>
              </div>

              <div class="more-data-data">
                <h4 class="card-title mb-3">Profil Pengaju</h4>
                <div class="row">
                  <div class="col-md-4 col-sm-12 mb-3">
                   <a target="__blank" href="{{ url('uploads/profile/' . $data->user->foto) }}">
                      <img id="avatar-preview" src="{{ url('uploads/profile/' . $data->user->foto) }}" style="width: 100%">
                    </a>
                  </div>
                  <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <p class="data-text">{{ $data->user->name }}</p>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <p class="data-text"><a href="mailto:{{ $data->user->email }}">{{ $data->user->email }}</a></p>
                    </div>
                    <div class="form-group">
                      <label>Telp/HP</label>
                      <p class="data-text">+62{{ $data->user->hp }}</p>
                    </div>
                    <div class="form-group">
                      <label>WhatsApp</label>
                      <p class="data-text"><a target="__blank" href="http://wa.me/62{{ $data->user->wa }}">+62{{ $data->user->wa }}</a></p>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <p class="data-text">{{ $data->user->alamat }}</p>
                    </div>
                    <div class="form-group">
                      <label>Wilayah</label>
                      <p class="data-text">{{ $data->user->wilayah->nama }}</p>
                    </div>

                    @if($data->user->plus_code != null)
                    <div class="form-group">
                      <p><a target="__blank" href="https://www.google.com/maps/search/{{ urlencode($data->user->plus_code) }}">Lihat di Google Maps</a></p>
                    </div>
                    @endif

                  </div>
                </div>
              </div>

              @if($data->status == 'pending')

                <div class="more-data-next-btn row">
                  <div class="col-md-6 col-sm-12">
                    <button type="button" class="btn btn-success btn-block"
                      onclick="
                      event.preventDefault();
                      $(this).find('form').submit();
                      "
                    >
                      <form method="post" action="{{ route('admin.kendaraan.accept', $data->id) }}">
                        @csrf
                      </form>
                      Terima
                    </button>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <button  data-toggle="modal" data-target="#reason-modal" type="button" class="btn btn-danger btn-block">Tolak</button>
                  </div>
                </div>

              @endif

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

<div class="modal fade" id="reason-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alasan penolakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" action="{{ route('admin.kendaraan.reject', $data->id) }}">
        @csrf
        <div class="modal-body">
          <textarea name="alasan" style="height: 100px" class="form-control" required></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>

      </form>

    </div>
  </div>
</div>

@endsection
