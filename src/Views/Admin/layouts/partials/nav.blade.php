<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="index-2.html"><img src="{{ asset('assets/admin/img/logo.png') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        {{-- <li class="mm-active">
            <a class="has-arrow" href="{{ asset('admin') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
            <ul>
                <li><a class="active" href="{{ asset('admin/users') }}">User</a></li>
                <li><a href="index_2.html">Default</a></li>
                <li><a href="index_3.html">Dark Menu</a></li>
            </ul>
        </li> --}}

        <li class>
            <a href="{{ asset('admin') }}" aria-expanded="false">
                <div class="icon_menu">
                    {{-- <img src="{{ asset('assets/admin/img/menu-icon/5.svg') }}" alt> --}}
                    <img src="{{ asset('assets/admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
        </li>

        <li class>
            <a href="{{ asset('admin/users') }}" aria-expanded="false">
                <div class="icon_menu">
                  <img src="{{ asset('assets/admin/img/menu-icon/5.svg') }}" alt>
                </div>
                <span>User</span>
            </a>
        </li>

        <li class>
            <a href="{{ asset('admin/products') }}" aria-expanded="false">
                <div class="icon_menu">
                  <img src="{{ asset('assets/admin/img/menu-icon/5.svg') }}" alt>
                </div>
                <span>Product</span>
            </a>
        </li>

        <li class>
            <a href="{{ asset('admin/categories') }}" aria-expanded="false">
                <div class="icon_menu">
                  <img src="{{ asset('assets/admin/img/menu-icon/5.svg') }}" alt>
                </div>
                <span>Category</span>
            </a>
        </li>

    </ul>
</nav>