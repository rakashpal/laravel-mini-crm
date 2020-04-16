<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{url('admin/dashboard')}}">
       {{-- <img src="{{asset('images/logo_2.png')}}" alt="logo" /> --}}
        <h2 style="color:#f9d100">Mini-Crm</h2>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{url('admin/dashboard')}}">
         {{-- <img src="{{asset('images/logo_1.png')}}" alt="logo" /> --}}
       <h2 style="color:#f9d100">MC</h2>
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="{{url('admin/logout')}}" style="transform: rotate(180deg)">
              <i class="icon-logout" ></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>