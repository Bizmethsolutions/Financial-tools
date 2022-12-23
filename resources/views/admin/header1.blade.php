<nav class="navbar fullwith">
    <a href="#" class="sidebar-toggler">
      <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <img src="{{ asset('images/logo.png') }}" style="width:120px;height:30px;margin-top:15px;">
      <ul class="navbar-nav">
        <li class="nav-item dropdown nav-profile">
          <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile">
          </a>
          <div class="dropdown-menu" aria-labelledby="profileDropdown">
            <div class="dropdown-header d-flex flex-column align-items-center">
              <div class="figure mb-3">
                <img src="{{ url('https://via.placeholder.com/80x80') }}" alt="">
              </div>
              <div class="info text-center">
                <p class="name font-weight-bold mb-0">{{ Session::get('fname'); }} {{ Session::get('lname'); }}</p>
                <p class="email text-muted mb-3">{{ Session::get('email'); }}</p>
              </div>
            </div>
            <div class="dropdown-body">
              <ul class="profile-nav p-0 pt-3">
                <li class="nav-item">
                  <a href="{{ url('/general/profile') }}" class="nav-link">
                    <i data-feather="user"></i>
                    <span>Profile</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="javascript:;" class="nav-link">
                    <i data-feather="edit"></i>
                    <span>Edit Profile</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/logout')}}" class="nav-link">
                    <i data-feather="log-out"></i>
                    <span>Log Out</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <style>
      .fullwith{
          width:100% !important;
          left:0px !important;
          top: 0px;

      }
      </style>