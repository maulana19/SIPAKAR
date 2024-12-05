  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
          <img src="{{ asset('Assets/dist/img/avatar.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .7">
          <span class="brand-text font-weight-light">| SIPAKAR</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  @if (Auth::user()->role != 'Admin')
                      <li class="nav-item">
                          <a href="/home" class="nav-link">
                              <i class="nav-icon fa fa-home"></i>
                              <p>
                                  Dashboard
                              </p>
                          </a>
                      </li>
                  @elseif (Auth::user()->role == 'Admin')
                      <li class="nav-item">
                          <a href="/" class="nav-link @if (Request::is('/') || Request::is('detail-laporan/*')) active @endif">
                              <i class="nav-icon fa fa-home"></i>
                              <p>
                                  Dashboard
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/batch-list" class="nav-link @if (Request::is('batch-list') || Request::is('batch/detail/*') || Request::is('batch/edit/*') || Request::is('batch/pembagian-area/*')) active @endif">
                              <i class="nav-icon far fa-list-alt"></i>
                              <p>
                                  Batch Produksi
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/batch/add" class="nav-link @if (Request::is('batch/add')) active @endif">
                              <i class="nav-icon far fa-plus-square"></i>
                              <p>
                                  Tambah Batch Baru
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/items" class="nav-link @if (Request::is('items') || Request::is('items/edit/*') || Request::is('items/detail/*')) active @endif">
                              <i class="nav-icon fa fa-cubes"></i>
                              <p>
                                  Item
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/items/add" class="nav-link @if (Request::is('items/add')) active @endif">
                              <i class="nav-icon fa fa-plus-circle"></i>
                              <p>
                                  Tambah Item Baru
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/users" class="nav-link @if (Request::is('users') ||
                                  Request::is('users/add') ||
                                  Request::is('users/edit/*') ||
                                  Request::is('users/change-password/*')) active @endif">
                              <i class="nav-icon far fa-user"></i>
                              <p>
                                  Akun
                              </p>
                          </a>
                      </li>
                  @endif
                  <li class="nav-item mt-4">
                    <a href="/logout" class="btn btn-danger btn-block"><center><b>Keluar</b></center></a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
