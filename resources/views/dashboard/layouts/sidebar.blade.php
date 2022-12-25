<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/customers*') ? 'active' : '' }}" aria-current="page" href="/dashboard/customers">
                    <span data-feather="user-plus" class="align-text-bottom"></span>
                    Customer
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/suppliers*') ? 'active' : '' }}" aria-current="page" href="/dashboard/suppliers">
                    <span data-feather="shopping-bag" class="align-text-bottom"></span>
                    Supplier
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" aria-current="page" href="/dashboard/categories">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Bahan Baku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/sells*') ? 'active' : '' }}" href="/dashboard/sells/orders">
                    <!-- tanda bintang setelah post agar active tetap berjalan ketika alamat post ada tambahan diujungnya -->
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Penjualan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/bills*') ? 'active' : '' }}" href="/dashboard/bills">
                    <!-- tanda bintang setelah post agar active tetap berjalan ketika alamat post ada tambahan diujungnya -->
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Tagihan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/buys*') ? 'active' : '' }}" href="/dashboard/buys">
                    <!-- tanda bintang setelah post agar active tetap berjalan ketika alamat post ada tambahan diujungnya -->
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Pembelian
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/report*') ? 'active' : '' }}" href="/dashboard/report">
                    <!-- tanda bintang setelah post agar active tetap berjalan ketika alamat post ada tambahan diujungnya -->
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Laporan
                </a>
               
            </li>



        </ul>
    </div>
</nav>