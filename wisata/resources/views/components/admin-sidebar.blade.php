<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="{{ route('profile') }}" class="nav-link">

        @include('components.avatar')

        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
          <span class="text-secondary text-small">Administrator</span>
        </div>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Pengajuan</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-check-bold menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.progress') }}">Dalam proses</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.approved') }}">Disetujui</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.rejected') }}">Ditolak</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.wilayah') }}">
        <span class="menu-title">Kelola Wilayah</span>
        <i class="mdi mdi-map menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.bumdes') }}">
        <span class="menu-title">Kelola Bumdes</span>
        <i class="mdi mdi-map menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.gov') }}">
        <span class="menu-title">Kelola Pemerintah</span>
        <i class="mdi mdi-map menu-icon"></i>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.destinasi') }}">
        <span class="menu-title">Kelola Destinasi</span>
        <i class="mdi mdi-map-marker menu-icon"></i>
      </a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.event') }}">
        <span class="menu-title">Kelola Event</span>
        <i class="mdi mdi-format-list-checks menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.messages') }}">

        @if(Session::get('pesan_count') > 0)
        <span class="menu-title">Pesan Masuk <span class="badge badge-pill badge-primary">{{ Session::get('pesan_count') }}</span></span>
        @else
        <span class="menu-title">Pesan Masuk</span>
        @endif

        <i class="mdi mdi-email menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.users') }}">
        <span class="menu-title">Kelola Pengguna</span>
        <i class="mdi mdi-account-group menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.slider') }}">
        <span class="menu-title">Kelola Slider</span>
        <i class="mdi mdi-image menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.statistik') }}">
        <span class="menu-title">Statistik</span>
        <i class="mdi mdi-chart-bar menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('profile') }}">
        <span class="menu-title">Pengaturan Profil</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>

  </ul>
</nav>
