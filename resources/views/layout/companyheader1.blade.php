<nav class="navbar fullwith">
    <a href="#" class="sidebar-toggler">
      <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <a href="{{ url('/dashboard') }}"><img src="{{ asset('images/finsuite_logo.png') }}" style="width:13%;">
      <ul class="navbar-nav">
        <li class="nav-item dropdown nav-profile">
          <a class="nav-link dropdown-toggle" href="{{ url('/dashboard') }}" id="notification" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i data-feather="bell"></i>
            <div class="indicator">
              <div class="circle"></div>
            </div>
            <!-- <img src="{{ asset('images/notification.png') }}" alt="profile" style="width:20px;height: 20px;"> -->
          </a>
          <div class="dropdown-menu" aria-labelledby="notification">
          </div>
        </li>
        <li class="nav-item dropdown nav-profile">
          <a class="nav-link dropdown-toggle" href="{{ url('/dashboard') }}" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('images/question.png') }}" alt="profile" style="width:20px;height: 20px;">
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
                  <a href="{{ url('/profile') }}" class="nav-link">
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
        <li class="nav-item dropdown nav-profile">
          <a class="nav-link dropdown-toggle" href="{{ url('/settings') }}">
            <img src="{{ asset('images/setting.png') }}" alt="profile" style="width:20px;height: 20px;">
          </a>
        </li>
        <li class="nav-item dropdown nav-profile">
          <a class="nav-link dropdown-toggle" href="{{ url('/dashboard') }}" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('images/user.png') }}" alt="profile" style="width:20px;height: 20px;">
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
                  <a href="{{ url('/profile') }}" class="nav-link">
                    <img src="{{ asset('images/user_profile.png') }}" alt="profile" style="width:14px;height: 14px;border-radius: 0; ">
                    <span class="padding-left-10">Profile</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/user-list') }}" class="nav-link">
                    <img src="{{ asset('images/users.png') }}" alt="profile" style="width:14px;height: 14px;border-radius: 0;">
                    <span class="padding-left-10">Users</span>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="{{ url('company-list')}}" class="nav-link">
                    <img src="{{ asset('images/switch_company.png') }}" alt="profile" style="width:14px;height: 14px;border-radius: 0;">
                    <span class="padding-left-10">Switch Company</span>
                  </a>
                </li> 
                <li class="nav-item">
                  <a href="{{ url('/logout')}}" class="nav-link">
                    <img src="{{ asset('images/logout.png') }}" alt="profile" style="width:14px;height: 14px;border-radius: 0;">
                    <span class="padding-left-10">Log Out</span>
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