
<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <div class="nav-link">
                <div class="profile-image">
                  <img src="{{asset('admin/images/dummy-image.jpg')}}" alt="image" />
                  <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
                </div>
                <div class="profile-name">
                  <p class="name">
                  @yield('user_name')
                  </p>
                  <p class="designation">
                 Admin
                  </p>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/dashboard')}}">
                <i class="icon-rocket menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                 <!--<span class="badge badge-success">New</span> -->
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('companies.index')}}">
                <i class="icon-user menu-icon"></i>
                <span class="menu-title">Companies</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('employees.index')}}">
                <i class="icon-user menu-icon"></i>
                <span class="menu-title">Employees</span>
              </a>
            </li>
           
          </ul>
        </nav>
        <!-- partial -->