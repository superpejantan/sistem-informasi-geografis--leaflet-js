  <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="../../foto/official/{{ Auth::user()->picture_path }}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ Auth::user()->name }}</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Administrator</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/penyuluh')}}">Pegawai BPP</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/desa')}}">Daftar Desa</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/hasil/pertanian')}}">
                <span class="menu-title">Hasil Pertanian
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/bendungan/')}}">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Bendungan Air
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/kelompok/tani')}}">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Kelompok Tani
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/pasar/')}}">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Pasar
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/kegiatan/')}}">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">Kegiatan Pertanian</span>
              </a>
            </li>
          </ul>
        </nav>