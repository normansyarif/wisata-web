@extends('layouts.guest')

@section('title', 'Wisata Jambi')

@section('content')

<div class="hero-wrap js-fullheight">
    <div class="home-slider owl-carousel js-fullheight">

        @if(count($slider) > 0)

        @foreach($slider as $s)

        <div class="slider-item js-fullheight" style="background-image:url({{ url('uploads/slider/' . $s->foto) }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center">
                    <div class="col-md-7 ftco-animate">
                        <div class="text w-100">
                            <h2 style="color: {{ $s->warna }}">{{ $s->title }}</h2>
                            <h1 class="mb-4" style="color: {{ $s->warna }}">{{ $s->subtitle }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        @else

        <div class="slider-item js-fullheight" style="background-image:url({{ asset('dist/healthcoach/images/slider.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center">
                    <div class="col-md-7 ftco-animate">
                        <div class="text w-100">
                            <h2 style="color: #fff">SLIDER TIDAK TERSEDIA</h2>
                            <h1 class="mb-4" style="color: white">Anda dapat mengatur slider pada dashboard admin</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight" style="background-image:url({{ asset('dist/healthcoach/images/slider.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center">
                    <div class="col-md-7 ftco-animate">
                        <div class="text w-100">
                            <h2 style="color: #fff">SLIDER TIDAK TERSEDIA</h2>
                            <h1 class="mb-4" style="color: white">Anda dapat mengatur slider pada dashboard admin</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif

        

    </div>
</div>

<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url({{ asset('dist/healthcoach/images/destinasi.jpg') }});"></div>
                    <div class="media-body p-2 mt-3">
                        <h3 class="heading">Destinasi</h3>
                        <p>Informasi mengenai destinasi-destinasi wisata yang ada di Jambi.</p>
                    </div>
                </div>      
            </div>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url({{ asset('dist/healthcoach/images/homestay.jpg') }});"></div>
                    <div class="media-body p-2 mt-3">
                        <h3 class="heading">Homestay</h3>
                        <p>Temukan tempat menginap yang sesuai dengan kebutuhan Anda.</p>
                    </div>
                </div>    
            </div>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url({{ asset('dist/healthcoach/images/souvenir.jpg') }});"></div>
                    <div class="media-body p-2 mt-3">
                        <h3 class="heading">Souvenir</h3>
                        <p>Dapatkan berbagai macam souvenir menarik yang dapat ditemukan di Jambi.</p>
                    </div>
                </div>      
            </div>

        </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url({{ asset('dist/healthcoach/images/guide.jpg') }});"></div>
                    <div class="media-body p-2 mt-3">
                        <h3 class="heading">Tour Guide</h3>
                        <p>Temukan tour guide yang dapat memandu Anda selama perjalanan.</p>
                    </div>
                </div>      
            </div>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url({{ asset('dist/healthcoach/images/seni.jpg') }});"></div>
                    <div class="media-body p-2 mt-3">
                        <h3 class="heading">Kelompok Seni</h3>
                        <p>Informasi mengenai berbagai macam kelompok seni yang tersebar di seluruh Jambi.</p>
                    </div>
                </div>    
            </div>
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                    <div class="img" style="background-image: url({{ asset('dist/healthcoach/images/event.jpg') }});"></div>
                    <div class="media-body p-2 mt-3">
                        <h3 class="heading">Event</h3>
                        <p>Kunjungi event-event seru yang sedang dan akan berlangsung.</p>
                    </div>
                </div>      
            </div>
        </div>

    </div>

</section>

<section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url({{ asset('dist/healthcoach/images/mockup.jpg') }});">
            </div>
            <div class="col-md-7 wrap-about py-4 py-md-5 ftco-animate">
                <div class="heading-section mb-5">
                    <div class="pl-md-5">
                        <h2 class="mb-2">Download aplikasi sekarang!</h2>
                    </div>
                </div>
                <div class="pl-md-5" style="height: 400px">
                    <p>Lengkapi perjalanan Anda dan dapatkan informasi mengenai destinasi wisata, homestay, event, tour guide, dan souvenir di sekitar wilayah wisata Jambi dengan aplikasi <span style="font-weight: bold">Wisata Jambi</span>.</p>
                    <a href="{{ asset('wisata.apk') }}"><img style="width: 50%;margin-top: 30px" src="{{ asset('dist/healthcoach/images/play.png') }}"></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">
            <div class="col-md-12 d-flex align-items-stretch">
                <div class="consultation w-100 text-center px-4 px-md-5">
                    <h3 class="mb-4">Anda pemilik usaha di wilayah Jambi? Daftarkan diri Anda sekarang!</h3>
                    <a href="{{ route('register') }}"><button class="btn btn-white py-2 px-4">Daftar</button></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
