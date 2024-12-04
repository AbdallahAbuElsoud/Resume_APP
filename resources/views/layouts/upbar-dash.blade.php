<div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <div class="navbar-toggler text-muted mt-2 p-0 mr-3">
          <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
            <i class="fe fe-menu navbar-toggler-icon"  style="width: 20px; font-size: 20px; "></i>
          </button>
        </div>

        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" id="modeSwitcher" data-mode="light">
              <i class="fe fe-sun fe-16"  style="width: 20px; font-size: 20px; "></i>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link text-muted my-2"  data-toggle="modal" data-target=".modal-shortcut">
              <span class="fe fe-grid fe-16"  style="width: 20px; font-size: 20px; "></span>
            </a>
          </li>
          <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2"  data-toggle="modal" data-target=".modal-notif">
              <span class="fe fe-bell fe-16"  style="width: 20px; font-size: 20px; "></span>
              <span class="dot dot-md bg-success"></span>
            </a>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
              <i class="fa-sharp fa-solid fa-user" style="width: 20px; font-size: 20px; margin: 10px;"></i>{{ Auth::user()->name }}                  
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/profile">Profile</a>
              <a class="dropdown-item" href="/logout" style="color:red;">lOGOUT  </a>
              
            </div>
          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>