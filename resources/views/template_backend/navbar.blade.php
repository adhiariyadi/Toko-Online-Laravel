<div class="header-top-area">
  <div class="fixed-header-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-1 col-md-6 col-sm-6 col-xs-8">
          <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <div class="col-lg-11 col-md-6 col-sm-6 col-xs-4">
          <div class="header-right-info">
            <ul class="nav navbar-nav mai-top-nav header-right-menu">
              <li class="nav-item">
                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                  <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                  <span class="admin-name">{{ Auth::user()->name }}</span>
                  <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                </a>
                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                  <li><a href="{{ route('profil', Auth::user()->id) }}"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>My Profile</a></li>
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="adminpro-icon adminpro-locked author-log-ic"></span>{{ __('Logout') }}</a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
