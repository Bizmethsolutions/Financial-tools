<style type="text/css">
  .nav-item a:hover{
    color: #fff !important;
  }
</style>
<nav class="sidebar">
  <div class="sidebar-header">
    <a href="{{ url('company-dashboard') }}" class="sidebar-brand">
      <img src="{{ asset('images/finsuite_logo_white.png') }}" class="width-60">
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      {{-- <li class="nav-item nav-category">Main</li> --}}
      <li class="nav-item {{ active_class(['/']) }}">
        <a href="{{ url('/company-list') }}" class="nav-link">
          <i class="link-icon" data-feather="home"></i>
          <span class="link-title">Home</span>
        </a>
      </li>
      
      <li class="nav-item {{ active_class(['email/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#fa" role="button" aria-expanded="{{ is_active_route(['email/*']) }}" aria-controls="email">
          <i class="link-icon" data-feather="database"></i>
          <span class="link-title">Fixed Assets</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['email/*']) }}" id="fa">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('company-dashboard') }}" class="nav-link {{ active_class(['email/inbox']) }}">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('fixed-asset-register') }}">Fixed Asset Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('transactions') }}">New Transaction</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('settings') }}">Settings</a>
            </li>
            
          </ul>
        </div>
      </li>
      
      
      <li class="nav-item {{ active_class(['email/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#reports" role="button" aria-expanded="{{ is_active_route(['email/*']) }}" aria-controls="file">
          <i class="link-icon" data-feather="file"></i>
          <span class="link-title">Reports</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['email/*']) }}" id="reports">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/email/inbox') }}" class="nav-link {{ active_class(['email/inbox']) }}">Inbox</a>
            </li>
            
          </ul>
        </div>
      </li>
      
    </ul>
  </div>
</nav>
