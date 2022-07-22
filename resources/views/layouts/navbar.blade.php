            <div id="app">
                <div class="main-wrapper">
                    <div class="navbar-bg"></div>
                    <nav class="navbar navbar-expand-lg main-navbar">
                        <form class="form-inline mr-auto">
                            <ul class="navbar-nav mr-3">
                                <li>
                                    <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                                </li>
                            </ul>
                        </form>
                        <ul class="navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1" />
                                    <div class="d-sm-none d-lg-inline-block">
                                        Hi, {{ auth()->user()->name}}
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-title">Logged in 5 min ago</div>
                                    <a href="features-profile.html" class="dropdown-item has-icon">
                                        <i class="far fa-user"></i> Profile
                                    </a>
                                    <a href="features-activities.html" class="dropdown-item has-icon">
                                        <i class="fas fa-bolt"></i> Activities
                                    </a>
                                    <a href="features-settings.html" class="dropdown-item has-icon">
                                        <i class="fas fa-cog"></i> Settings
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <div class="main-sidebar">
                        <aside id="sidebar-wrapper">
                            <div class="sidebar-brand">
                                <a href="#">Elixir</a>
                            </div>
                            <div class="sidebar-brand sidebar-brand-sm">
                                <a href="#">ELX</a>
                            </div>
                            <ul class="sidebar-menu">
                                <li class="menu-header">Dashboard</li>
                                <li class="{{ Request::is('dashboard') ? 'nav-item active' : '' }}">
                                    <a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i>
                                        <span>Dashboard</span></a>
                                </li>
                                
                                <li class="menu-header">User</li>
                                <li class="{{Request::is('user') ? 'nav-item active' : ''}}">
                                    <a href="/user" class="nav-link">
                                    <i class="fas fa-user"></i><span>List User</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('user/create') ? 'nav-item active' : '' }}">
                                    <a class="nav-link" href="/user/create"><i class="far fa-file-alt"></i>
                                        <span>Form Tambah User</span></a>
                                </li>

                                <li class="menu-header">Pickup</li>
                                <li class="{{ Request::is('pickup/create') ? 'nav-item active' : '' }}">
                                    <a class="nav-link" href="/pickup/create"><i class="far fa-file-alt"></i>
                                        <span>Form Pickup</span></a>
                                </li>
                                @if(auth()->user()->level == 'admin')
                                <li class="{{ Request::is('pickup') ? 'nav-item active' : '' }}">
                                    <a href="/pickup" class="nav-link"><i class="fas fa-th-list"></i><span>Riwayat pickup harian</span></a>
                                </li>

                                <li class="{{ Request::is('/pickup/listpickup') ? 'nav-item active' : '' }}">
                                    <a class="nav-link" href="/pickup/listpickup"><i class="fas fa-th-list"></i>
                                        <span>Riwayat pickup </span></a>
                                </li>
                                <li class="menu-header">Customer</li>
                                <li class="{{ Request::is('/customer/create') ? 'nav-item active' : '' }}">
                                    <a class="nav-link" href="/customer/create"><i class="far fa-file-alt"></i>
                                        <span>Tambah Customer</span></a>
                                </li>
                                <li class="{{ Request::is('customer') ? 'nav-item active' : '' }}">
                                    <a class="nav-link" href="/customer"><i class="fas fa-th-list"></i>
                                        <span>Data Customer</span></a>
                                </li>
                                @endif
                                <li class="menu-header">Return paket</li>
                                <li class="{{ Request::is('retur') ? 'nav-item active' : '' }}">
                                    <a class="nav-link" href="#"><i class="far fa-file-alt"></i>
                                        <span>Form Retur</span></a>
                                </li>
                                <li class="{{ Request::is('retur') ? 'nav-item active' : '' }}">
                                    <a class="nav-link" href="#"><i class="fas fa-th-list"></i>
                                        <span>Riwayat return paket</span></a>
                                </li>
                                <li class="menu-header">Form PK</li>
                                <li class="{{ Request::is('/retur') ? 'nav-item active' : '' }}">
                                    <a class="nav-link" href="#"><i class="far fa-file-alt"></i>
                                        <span>Form Penolakan PK</span></a>
                                </li>
                                <li class="{{ Request::is('/retur') ? 'nav-item active' : '' }}">
                                    <a class="nav-link" href="#"><i class="fas fa-th-list"></i>
                                        <span>Riwayat penolakan PK </span></a>
                                </li>
                            </ul>
                        </aside>
                    </div>
