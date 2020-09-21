@extends('layouts.user')

@section('title', 'Wisata Jambi | View User')

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
                <h4 class="card-title mb-3">Profil Pengguna</h4>
                <div class="row">
                  <div class="col-md-4 col-sm-12 mb-3">
                   <a target="__blank" href="{{ url('uploads/profile/' . $user->foto) }}">
                      <img id="avatar-preview" src="{{ url('uploads/profile/' . $user->foto) }}" style="width: 100%">
                    </a>
                  </div>
                  <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <p class="data-text">{{ $user->name }}</p>
                    </div>
                    <div class="form-group">
                      <label>Jenis Usaha</label>
                      <p class="data-text">
                        
                        @if($user->jenis_usaha == 'homestay')
                        Pemilik Homestay
                        @elseif($user->jenis_usaha == 'guide')
                        Tour Guide
                        @elseif($user->jenis_usaha == 'art')
                        Pengelola Kelompok Seni
                        @elseif($user->jenis_usaha == 'souvenir')
                        Pedagang Souvenir
                        @else
                        (Belum terdaftar)
                        @endif
                      
                      </p>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <p class="data-text"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                    </div>
                    <div class="form-group">
                      <label>Telp/HP</label>
                      <p class="data-text">+62{{ $user->hp }}</p>
                    </div>
                    <div class="form-group">
                      <label>WhatsApp</label>
                      <p class="data-text"><a target="__blank" href="http://wa.me/62{{ $user->wa }}">+62{{ $user->wa }}</a></p>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <p class="data-text">{{ $user->alamat }}</p>
                    </div>
                    <div class="form-group">
                      <label>Wilayah</label>
                      <p class="data-text">{{ $user->wilayah->nama }}</p>
                    </div>

                    @if($user->plus_code != null)
                    <div class="form-group">
                      <p><a target="__blank" href="https://www.google.com/maps/search/{{ urlencode($user->plus_code) }}">Lihat di Google Maps</a></p>
                    </div>
                    @endif

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  @include('components.user-footer')

</div>

@endsection
