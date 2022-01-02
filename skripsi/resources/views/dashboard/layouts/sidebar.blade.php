<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
                    <span data-feather="home"></span>
                    DASHBOARD
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/transaction">
                    <span data-feather="shopping-cart"></span>
                    TRANSAKSI
                </a>
            </li>            
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/transactions*') ? 'active' : '' }}" href="/dashboard/transactions">
                    <span data-feather="file-text"></span>
                    DATA TRANSAKSI
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/debts*') ? 'active' : '' }}" href="/dashboard/debts">
                    <span data-feather="file-text"></span>
                    DATA UTANG
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/customers*') ? 'active' : '' }}" href="/dashboard/customers">
                    <span data-feather="file-text"></span>
                    DATA PELANGGAN
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/goods*') ? 'active' : '' }}" href="/dashboard/goods">
                    <span data-feather="file-text"></span>
                    DATA BARANG
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
                    <span data-feather="file-text"></span>
                    KATEGORI
                </a>
            </li>
            
        </ul>
    </div>
</nav>
