<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Jual Beli <sup>Mobil</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen
    </div>


    <!-- Nav Item - Kategori -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}"
            href="{{ route('categories.index') }}">
            <i class="fas fa-fw fa-th-list"></i> <!-- Ikon untuk Kategori -->
            <span>Kategori</span>
        </a>
    </li>

    <!-- Nav Item - Produk -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}"
            href="{{ route('products.index') }}">
            <i class="fas fa-fw fa-box"></i> <!-- Ikon untuk Produk -->
            <span>Produk</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <!-- Nav Item - Costumer -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('customers.index') ? 'active' : '' }}"
            href="{{ route('customers.index') }}">
            <i class="fas fa-fw fa-users"></i> <!-- Ikon untuk Costumer -->
            <span>Costumer</span>
        </a>
    </li>
    <!-- Nav Item - Transaksi -->
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('transactions.index') ? 'active' : '' }}"
            href="{{ route('transactions.index') }}">
            <i class="fas fa-fw fa-money-bill-wave"></i> <!-- Ikon untuk Transaksi -->
            <span>Transaksi</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
