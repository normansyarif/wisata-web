@extends('layouts.guest')

@section('title', 'Wisata Jambi | Verifikasi Email')

@section('content')
<section class="ftco-section bg-light" style="padding: 4em 0">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Mohon periksa email anda untuk melanjutkan.') }}
                        </div>
                    @endif

                    {{ __('Link verifikasi telah kami kirimkan ke email anda.') }}
                    {{ __('Jika anda belum menerima email, mohon periksa folder spam atau ') }} <a href="{{ route('verification.resend') }}">{{ __('klik disini untuk mencoba lagi') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
