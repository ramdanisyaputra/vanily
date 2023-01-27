<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <h4>
                    Vanilys Indo Patriot
                </h4>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="index.html">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">Dashboard 4</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="fas fa-chart-bar"></i>Charts</a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="fas fa-table"></i>Tables</a>
                </li>
                <li>
                    <a href="form.html">
                        <i class="far fa-check-square"></i>Forms</a>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                </li>
                <li>
                    <a href="map.html">
                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="forget-pass.html">Forget Password</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>UI Elements</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="button.html">Button</a>
                        </li>
                        <li>
                            <a href="badge.html">Badges</a>
                        </li>
                        <li>
                            <a href="tab.html">Tabs</a>
                        </li>
                        <li>
                            <a href="card.html">Cards</a>
                        </li>
                        <li>
                            <a href="alert.html">Alerts</a>
                        </li>
                        <li>
                            <a href="progress-bar.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="modal.html">Modals</a>
                        </li>
                        <li>
                            <a href="switch.html">Switchs</a>
                        </li>
                        <li>
                            <a href="grid.html">Grids</a>
                        </li>
                        <li>
                            <a href="fontawesome.html">Fontawesome Icon</a>
                        </li>
                        <li>
                            <a href="typo.html">Typography</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <h4>
            Vanilys Indo Patriot
        </h4>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{ request()->is('home*') ? 'active' : '' }}">
                    <a href="{{route('home')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                @if(auth()->user()->level == 'admin')
                <li class="{{ request()->is('admin*') ? 'active' : '' }} {{ request()->is('user*') ? 'active' : '' }} has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-users"></i>Users</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('admin.index')}}">Admin</a>
                        </li>
                        <li>
                            <a href="{{route('user.index')}}">User</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('client*') ? 'active' : '' }}">
                    <a href="{{route('client.index')}}">
                        <i class="fas fa-tags"></i>Client</a>
                </li>
                <li class="{{ request()->is('barang*') ? 'active' : '' }}">
                    <a href="{{route('barang.index')}}">
                        <i class="fas fa-th-list"></i>Barang</a>
                </li>
                <li class="{{ request()->is('akun*') ? 'active' : '' }}">
                    <a href="{{route('akun.index')}}">
                        <i class="fas fa-user"></i>Akun</a>
                </li>
                @endif
                <li class="{{ request()->is('rfq*') ? 'active' : '' }}">
                    <a href="{{route('rfq.index')}}">
                        <i class="fas fa-bullhorn"></i>RFQ</a>
                </li>
                <li class="{{ request()->is('qt*') ? 'active' : '' }}">
                    <a href="{{route('qt.index')}}">
                        <i class="fas fa-share"></i>QT</a>
                </li>
                <li class="{{ request()->is('po*') ? 'active' : '' }}">
                    <a href="{{route('po.index')}}">
                        <i class="fas fa-shopping-cart"></i>PO</a>
                </li>
                <li class="{{ request()->is('inv*') ? 'active' : '' }}">
                    <a href="{{route('inv.index')}}">
                        <i class="fas fa-paperclip"></i>INV</a>
                </li>
                <li class="{{ request()->is('payment*') ? 'active' : '' }}">
                    <a href="{{route('payment.index')}}">
                        <i class="fas fa-barcode"></i>Payment</a>
                </li>
                <li class="{{ request()->is('do*') ? 'active' : '' }}">
                    <a href="{{route('do.index')}}">
                        <i class="fas fa-ship"></i>DO</a>
                </li>
                <li class="{{ request()->is('jurnal*') ? 'active' : '' }}">
                    <a href="{{route('jurnal.index')}}">
                        <i class="fas fa-columns"></i>Jurnal</a>
                </li>
                <li class="{{ request()->is('laporan*') ? 'active' : '' }}">
                    <a href="{{route('laporan.index')}}">
                        <i class="fas fa-folder-open"></i>Laporan</a>
                </li>
                <li class="{{ request()->is('report*') ? 'active' : '' }}">
                    <a href="{{route('report.index')}}">
                        <i class="fas fa-folder-open"></i>Laporan Jurnal</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>