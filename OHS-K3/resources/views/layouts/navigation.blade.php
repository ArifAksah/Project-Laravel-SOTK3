<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="{{route('dashboard')}}">
              <img src="assets/images/oh.png" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{route('dashboard')}}">
              <img src="assets/images/oh.png" alt="logo" />
            </a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1>
              <h3 class="welcome-sub-text">Your performance summary mmm week </h3>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image">
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image">
                        <p class="mb-1 mt-3 fw-semibold" value="{{ auth()->user()->username }}">{{ auth()->user()->username }}</p>
                        <p class="fw-light text-muted mb-0">{{ auth()->user()->email }}</p>
                    </div>
                    <a class="dropdown-item" href="#"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category"></li>
            @if(auth()->user()->is_approved == 1)
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                      <i class="menu-icon mdi mdi-floor-plan"></i>
                      <span class="menu-title">Temuan</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> 
                              <a class="nav-link" href="{{ route('inspections.create') }}">Input Temuan</a>
                          </li>
                          <li class="nav-item"> 
                              <a class="nav-link" href="{{ route('inspections.index') }}">Daftar Temuan</a>
                          </li>
                          <li class="nav-item"> 
                              <a class="nav-link" href="{{ route('summary.index') }}">Rangkuman Temuan</a> 
                          </li>
                      </ul>
                  </div>
              </li>
          @endif
            @if(Auth::user()->role === 'admin')
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-admin" aria-expanded="false" aria-controls="ui-admin">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Admin</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-admin">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('admin_approvals.index') }}">Approval Tamu</a>
                  </li>
                  <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('karyawan.index') }}">Data karyawan</a>
                  </li>
                </ul>
              </div>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="docs/documentation.html">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Dokumentasi</span>
              </a>
            </li>
          </ul>
        </nav>
        <div class="main-panel">