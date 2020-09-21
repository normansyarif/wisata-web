@extends('layouts.user')

@section('title', 'Wisata Jambi | Homestay')

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
                    <a target="__blank" href="{{ url('uploads/homestay/' . $homestay->foto) }}">
                      <img id="avatar-preview" src="{{ url('uploads/homestay/' . $homestay->foto) }}" style="width: 100%">
                    </a>
                  </div>
                  <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                      <label>Nama Homestay</label>
                      <p class="data-text">{{ $homestay->nama }}</p>
                    </div>
                    <div class="form-group">
                      <label>Kisarah Harga</label>
                      <p class="data-text">{{ $homestay->kisaran_harga }}</p>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Kamar Tersedia</label>
                      <p class="data-text">{{ $homestay->kamar_tersedia }}</p>
                    </div>
                    <div class="form-group">
                      <label>Fasilitas</label>
                      <p class="data-text">{{ $homestay->fasilitas }}</p>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <p class="data-text">{{ $homestay->alamat }}</p>
                    </div>
                    <div class="form-group">
                      <label>Wilayah</label>
                      <p class="data-text">{{ $homestay->wilayah->nama }}</p>
                    </div>

                    @if($homestay->plus_code != null)
                    <div class="form-group">
                      <p><a target="__blank" href="https://www.google.com/maps/search/{{ urlencode($homestay->plus_code) }}">Lihat di Google Maps</a></p>
                    </div>
                    @endif

                    @if($homestay->alasan_tolak != null)
                    <div class="form-group text-danger">
                      <label>Alasan Penolakan</label>
                      <p class="data-text">{{ $homestay->alasan_tolak }}</p>
                    </div>
                    @endif

                  </div>
                </div>
              </div>

              <div class="more-data-data">
                <h4 class="card-title mb-3">Profil Pengaju</h4>
                <div class="row">
                  <div class="col-md-4 col-sm-12 mb-3">
                   <a target="__blank" href="{{ url('uploads/profile/' . $homestay->user->foto) }}">
                      <img id="avatar-preview" src="{{ url('uploads/profile/' . $homestay->user->foto) }}" style="width: 100%">
                    </a>
                  </div>
                  <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <p class="data-text">{{ $homestay->user->name }}</p>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <p class="data-text"><a href="mailto:{{ $homestay->user->email }}">{{ $homestay->user->email }}</a></p>
                    </div>
                    <div class="form-group">
                      <label>Telp/HP</label>
                      <p class="data-text">+62{{ $homestay->user->hp }}</p>
                    </div>
                    <div class="form-group">
                      <label>WhatsApp</label>
                      <p class="data-text"><a target="__blank" href="http://wa.me/62{{ $homestay->user->wa }}">+62{{ $homestay->user->wa }}</a></p>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <p class="data-text">{{ $homestay->user->alamat }}</p>
                    </div>
                    <div class="form-group">
                      <label>Wilayah</label>
                      <p class="data-text">{{ $homestay->user->wilayah->nama }}</p>
                    </div>

                    @if($homestay->user->plus_code != null)
                    <div class="form-group">
                      <p><a target="__blank" href="https://www.google.com/maps/search/{{ urlencode($homestay->user->plus_code) }}">Lihat di Google Maps</a></p>
                    </div>
                    @endif

                  </div>
                </div>
              </div>

              @if($homestay->status == 'pending')

                <div class="more-data-next-btn row">
                  <div class="col-md-6 col-sm-12">
                    <button type="button" class="btn btn-success btn-block"
                      onclick="
                      event.preventDefault();
                      $(this).find('form').submit();
                      " 
                    >
                      <form method="post" action="{{ route('admin.homestay.accept', $homestay->id) }}">
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

      <form method="post" action="{{ route('admin.homestay.reject', $homestay->id) }}">
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
