@extends('layouts.user-nosidebar')

@section('title', 'Wisata Jambi | Cara menemukan plus code')

@section('content')

<div class="main-panel" style="width: 100%">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-10 offset-md-1 col-sm-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="more-data tutorial">

              <div class="more-data-data">
                <h4 class="card-title mb-3">Plus Code</h4>
                <div class="row">

                  <div class="col-md-12 col-sm-12">
                    <p>Kode plus berfungsi seperti alamat. Saat sebuah alamat tidak tersedia, Anda dapat menggunakan kode plus untuk menemukan atau membagikan tempat di Google Maps, seperti rumah atau bisnis Anda.</p>
                    <p>Sebuah kode plus berisi:</p>
                    <ul>
                      <li>6 atau 7 huruf dan angka</li>
                      <li>Kota</li>
                    </ul>
                    <p>Berikut contoh kode plus: <code style="color: #188038">9J95+Q4 Jambi, Jambi City, Jambi, Indonesia</code>.</p>
                  </div>

                </div>
              </div>

              <div class="more-data-data">
                <h4 class="card-title mb-3">Cara menemukan plus code di komputer</h4>
                <div class="row">

                  <div class="col-md-12 col-sm-12">
                    <ul>
                      <li><p>Buka <a target="__blank" href="https://www.google.com/maps">Google Maps</a>.</p></li>
                      <li>
                        <p>Lakukan pencarian dengan memasukkan alamat di kolom cari.</p>
                        <img src="{{ asset('dist/purple/assets/images/search.png') }}">
                      </li>
                      <li>
                        <p>Klik lokasi anda pada peta untuk menjatuhkan pin.</p>
                        <img src="{{ asset('dist/purple/assets/images/pin.png') }}">
                      </li>
                      <li>
                        <p>Di bagian bawah, pada kotak info, klik koordinat angka.</p>
                        <img src="{{ asset('dist/purple/assets/images/info-box.png') }}">
                      </li> 
                      <li>
                        <p>Di sebelah kiri, Anda akan melihat kode plus dan info selengkapnya tentang tempat tersebut.</p>
                        <img src="{{ asset('dist/purple/assets/images/code.png') }}">
                      </li>
                    </ul>
                  </div>

                </div>
              </div>

              <div class="more-data-data">
                <h4 class="card-title mb-3">Cara menemukan plus code di perangkat Android</h4>
                <div class="row">

                  <div class="col-md-12 col-sm-12">
                    <ul>
                      <li>
                        <p>Di ponsel atau tablet Android Anda, buka <a target="__blank" href="https://www.google.com/maps">web seluler Google Maps</a> atau <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.maps&hl=en">aplikasi Google Maps</a>.</p>
                      </li>
                      <li>
                        <p>Lakukan pencarian dengan memasukkan alamat di kolom cari.</p>
                        <img src="{{ asset('dist/purple/assets/images/hp_search.png') }}">
                      </li>
                      <li>
                        <p>Tap lama tempat untuk memasang pin di Google Maps.</p>
                        <img src="{{ asset('dist/purple/assets/images/hp_pin.png') }}">
                      </li>
                      <li>
                        <p>Di bagian bawah, tap alamat atau deskripsi.</p>
                        <img src="{{ asset('dist/purple/assets/images/hp_box.jpg') }}">
                      </li>
                      <li>
                        <p>Scroll ke bawah untuk menemukan plus code, seperti 8439VCW3V+PG.</p>
                        <img src="{{ asset('dist/purple/assets/images/hp_code.png') }}">
                      </li>
                    </ul>

                    <p style="margin-top: 50px">
                      Untuk informasi lebih lanjut, kunjungi laman <a target="__blank" href="https://support.google.com/maps/answer/7047426?co=GENIE.Platform%3DDesktop&hl=id&oco=0"> Google</a> dan <a target="__blank" href="https://plus.codes/howitworks">PlusCodes</a> mengenai Plus Code.
                    </p>
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
