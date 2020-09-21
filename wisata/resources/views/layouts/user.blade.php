<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="{{ asset('dist/purple/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/purple/assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{ asset('dist/purple/assets/css/style.css') }}"></head>
  <body>
    <div class="container-scroller">

      @include('components.user-nav')
      
      <div class="container-fluid page-body-wrapper">
        
        @if(Auth::user()->jenis_usaha == 'admin')
          @include('components.admin-sidebar')
        @elseif(Auth::user()->jenis_usaha == 'homestay')
          @include('components.homestay-sidebar')
        @elseif(Auth::user()->jenis_usaha == 'souvenir')
          @include('components.souvenir-sidebar')
        @elseif(Auth::user()->jenis_usaha == 'guide')
          @include('components.guide-sidebar')
        @elseif(Auth::user()->jenis_usaha == 'art')
          @include('components.art-sidebar')
          @elseif(Auth::user()->jenis_usaha == 'rm')
          @include('components.rm-sidebar')
          @elseif(Auth::user()->jenis_usaha == 'tani')
          @include('components.tani-sidebar')
          @elseif(Auth::user()->jenis_usaha == 'umkm')
          @include('components.umkm-sidebar')
          @elseif(Auth::user()->jenis_usaha == 'kendaraan')
          @include('components.kendaraan-sidebar')
        @endif

        @yield('content')
        
      </div>
    </div>

    @yield('modals')


    <script src="{{ asset('dist/purple/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('dist/purple/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('dist/purple/assets/js/misc.js') }}"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    @yield('scripts')

  </body>
  </html>
