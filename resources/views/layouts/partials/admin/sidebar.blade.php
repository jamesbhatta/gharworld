  <!-- Brand Logo -->
  <a href="{{ route('frontend.home') }}" class="brand-link" target="_blank">
      {{-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{ Auth::user()->gravatar }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
              <li class="nav-item">
                  <a href="{{ route('admin.dashboard') }}" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>Dashboard</p>
                  </a>
              </li>
              {{-- Properties --}}
              <li class="nav-item">
                  <a href="{{ route('properties.index') }}" class="nav-link">
                      <i class="nav-icon fa fa-list-ul"></i>
                      <p>
                          Properties
                      </p>
                  </a>
              </li>
              {{-- Local Contact --}}
              <li class="nav-item">
                  <a href="{{ route('local-contacts.index') }}" class="nav-link">
                      <i class="nav-icon fa fa-users"></i>
                      <p>
                          Local Contact
                      </p>
                  </a>
              </li>
              {{-- Features --}}
              <li class="nav-item">
                  <a href="{{ route('features.index') }}" class="nav-link">
                      <i class="nav-icon fa fa-medal"></i>
                      <p>Features</p>
                  </a>
              </li>
              {{-- Facilities --}}
              <li class="nav-item">
                  <a href="{{ route('facilities.index') }}" class="nav-link">
                      <i class="nav-icon fab fa-accessible-icon"></i>
                      <p>Facilities</p>
                  </a>
              </li>
              {{-- Professions --}}
              <li class="nav-item">
                  <a href="{{ route('professions.index') }}" class="nav-link">
                      <i class="nav-icon fa fa-briefcase"></i>
                      <p>Professions</p>
                  </a>
              </li>
              {{-- Cities --}}
              <li class="nav-item">
                  <a href="{{ route('cities.index') }}" class="nav-link">
                      <i class="nav-icon fa fa-map-marker-alt"></i>
                      <p>Cities</p>
                  </a>
              </li>
              {{-- contact --}}
              <li class="nav-item">
                  <a href="{{ route('contact.index') }}" class="nav-link">
                      <i class="nav-icon fa fa-rss"></i>
                      <p>Contact</p>
                  </a>
              </li>
              <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                          System
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      {{-- Logs --}}
                      <li class="nav-item">
                          <a href="{{ route('system.logs') }}" class="nav-link" target="_blank">
                              <i class="nav-icon fa fa-history"></i>
                              <p>Logs</p>
                          </a>
                      </li>
                      {{-- Settings --}}
                      <li class="nav-item">
                          <a href="../layout/top-nav-sidebar.html" class="nav-link">
                              <i class="fa fa-cogs nav-icon"></i>
                              <p>Settings</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="../layout/collapsed-sidebar.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Collapsed Sidebar</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="nav-icon fa fa-sign-in"></i>
                      <p>
                          Logout
                          <span class="badge badge-info right">2</span>
                      </p>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </a>
              </li>
              <li class="nav-header">EXAMPLES</li>
              <li class="nav-item">
                  <a href="../calendar.html" class="nav-link">
                      <i class="nav-icon far fa-calendar-alt"></i>
                      <p>
                          Calendar
                          <span class="badge badge-info right">2</span>
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="../gallery.html" class="nav-link">
                      <i class="nav-icon far fa-image"></i>
                      <p>
                          Gallery
                      </p>
                  </a>
              </li>
              <li class="nav-item has-treeview menu-open">
                  <a href="#" class="nav-link active">
                      <i class="nav-icon far fa-plus-square"></i>
                      <p>
                          Extras
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="../examples/login.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Login</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="../examples/blank.html" class="nav-link active">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Blank Page</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="../../starter.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Starter Page</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-header">MISCELLANEOUS</li>
              <li class="nav-item">
                  <a href="https://adminlte.io/docs/3.0" class="nav-link">
                      <i class="nav-icon fas fa-file"></i>
                      <p>Documentation</p>
                  </a>
              </li>
              <li class="nav-header">MULTI LEVEL EXAMPLE</li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Level 1</p>
                  </a>
              </li>
              <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                          Level 1
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Level 2</p>
                          </a>
                      </li>
                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>
                                  Level 2
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="#" class="nav-link">
                                      <i class="far fa-dot-circle nav-icon"></i>
                                      <p>Level 3</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="#" class="nav-link">
                                      <i class="far fa-dot-circle nav-icon"></i>
                                      <p>Level 3</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="#" class="nav-link">
                                      <i class="far fa-dot-circle nav-icon"></i>
                                      <p>Level 3</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Level 2</p>
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="nav-header">LABELS</li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon far fa-circle text-danger"></i>
                      <p class="text">Important</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon far fa-circle text-warning"></i>
                      <p>Warning</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon far fa-circle text-info"></i>
                      <p>Informational</p>
                  </a>
              </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
