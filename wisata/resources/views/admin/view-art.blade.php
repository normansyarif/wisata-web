@extends('layouts.user')

@section('title', 'Wisata Jambi | Kelompok Seni')

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
                    <a target="__blank" href="{{ url('uploads/art/' . $art->foto) }}">
                      <img id="avatar-preview" src="{{ url('uploads/art/' . $art->foto) }}" style="width: 100%">
                    </a>
                  </div>
                  <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                      <label>Nama Kelompok Seni</label>
                      <p class="data-text">{{ $art->nama }}</p>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kesenian</label>
                      <p class="data-text">{{ $art->jenis_kesenian }}</p>
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <p class="data-text">
                        
                        @if($art->deskripsi != null)
                        {{ $art->deskripsi }}
                        @else
                        Tidak ada deskripsi
                        @endif

                      </p>
                    </div>
                    
                    <div class="form-group">
                      <label>Alamat</label>
                      <p class="data-text">{{ $art->alamat }}</p>
                    </div>
                    <div class="form-group">
                      <label>Wilayah</label>
                      <p class="data-text">{{ $art->wilayah->nama }}</p>
                    </div>

                    @if($art->plus_code != null)
                    <div class="form-group">
                      <p><a target="__blank" href="https://www.google.com/maps/search/{{ urlencode($art->plus_code) }}">Lihat di Google Maps</a></p>
                    </div>
                    @endif

                    @if($art->alasan_tolak != null)
                    <div class="form-group text-danger">
                      <label>Alasan Penolakan</label>
                      <p class="data-text">{{ $art->alasan_tolak }}</p>
                    </div>
                    @endif

                  </div>
                </div>
              </div>

              <div class="more-data-data">
                <h4 class="card-title mb-3">Profil Pengaju</h4>
                <div class="row">
                  <div class="col-md-4 col-sm-12 mb-3">
                   <a target="__blank" href="{{ url('uploads/profile/' . $art->user->foto) }}">
                      <img id="avatar-preview" src="{{ url('uploads/profile/' . $art->user->foto) }}" style="width: 100%">
                    </a>
                  </div>
                  <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <p class="data-text">{{ $art->user->name }}</p>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <p class="data-text"><a href="mailto:{{ $art->user->email }}">{{ $art->user->email }}</a></p>
                    </div>
                    <div class="form-group">
                      <label>Telp/HP</label>
                      <p class="data-text">+62{{ $art->user->hp }}</p>
                    </div>
                    <div class="form-group">
                      <label>WhatsApp</label>
                      <p class="data-text"><a target="__blank" href="http://wa.me/62{{ $art->user->wa }}">+62{{ $art->user->wa }}</a></p>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <p class="data-text">{{ $art->user->alamat }}</p>
                    </div>
                    <div class="form-group">
                      <label>Wilayah</label>
                      <p class="data-text">{{ $art->user->wilayah->nama }}</p>
                    </div>

                    @if($art->user->plus_code != null)
                    <div class="form-group">
                      <p><a target="__blank" href="https://www.google.com/maps/search/{{ urlencode($art->user->plus_code) }}">Lihat di Google Maps</a></p>
                    </div>
                    @endif

                  </div>
                </div>
              </div>

              @if($art->status == 'pending')

                <div class="more-data-next-btn row">
                  <div class="col-md-6 col-sm-12">
                    <button type="button" class="btn btn-success btn-block"
                      onclick="
                      event.preventDefault();
                      $(this).find('form').submit();
                      " 
                    >
                      <form method="post" action="{{ route('admin.art.accept', $art->id) }}">
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

      <form method="post" action="{{ route('admin.art.reject', $art->id) }}">
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
