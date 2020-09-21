<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="{{ route('profile') }}" class="nav-link">
        
        @include('components.avatar')

        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
          <span class="text-secondary text-small">UMKM</span>
        </div>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{ route('umkm') }}">
        <span class="menu-title">Pengajuan</span>
        <i class="mdi mdi-check-bold menu-icon"></i>
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
