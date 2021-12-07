<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
                    <span data-feather="home"></span>
                    Dasbor
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/transaction">
                    <span data-feather="shopping-cart"></span>
                    Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/goods*') ? 'active' : '' }}" href="/dashboard/goods">
                    <span data-feather="file-text"></span>
                    Data Barang
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/transactions*') ? 'active' : '' }}" href="/dashboard/transactions">
                    <span data-feather="file-text"></span>
                    Data Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/debts*') ? 'active' : '' }}" href="/dashboard/debts">
                    <span data-feather="file-text"></span>
                    Data Hutang
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/customers*') ? 'active' : '' }}" href="/dashboard/customers">
                    <span data-feather="file-text"></span>
                    Data Customer
                </a>
            </li>
            
        </ul>
    </div>
</nav>
