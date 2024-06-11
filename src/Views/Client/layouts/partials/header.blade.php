<header class="navigation fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-white">
            <a class="navbar-brand order-1" href="{{ url('') }}">
                <img class="img-fluid" width="100px" src="{{ asset('assets/client/images/logo.png') }}"
                    alt="Reader | Hugo Personal Blog Template">
            </a>
            <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            homepage <i class="ti-angle-down ml-1"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ asset('assets/client/index-full.html') }}">Homepage Full
                                Width</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/index-full-left.html') }}">Homepage
                                Full With Left Sidebar</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/index-full-right.html') }}">Homepage
                                Full With Right Sidebar</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/index-list.html') }}">Homepage List
                                Style</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/index-list-left.html') }}">Homepage
                                List With Left Sidebar</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/index-list-right.html') }}">Homepage
                                List With Right Sidebar</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/index-grid.html') }}">Homepage Grid
                                Style</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/index-grid-left.html') }}">Homepage
                                Grid With Left Sidebar</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/index-grid-right.html') }}">Homepage
                                Grid With Right Sidebar</a>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            About <i class="ti-angle-down ml-1"></i>
                        </a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="{{ asset('assets/client/about-me.html') }}">About Me</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/about-us.html') }}">About Us</a>

                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('assets/client/contact.html') }}">Contact</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Pages <i class="ti-angle-down ml-1"></i>
                        </a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="{{ asset('assets/client/author.html') }}">Author</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/author-single.html') }}">Author
                                Single</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/advertise.html') }}">Advertise</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/post-details.html') }}">Post
                                Details</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/post-elements.html') }}">Post
                                Elements</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/tags.html') }}">Tags</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/search-result.html') }}">Search
                                Result</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/search-not-found.html') }}">Search
                                Not Found</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/privacy-policy.html') }}">Privacy
                                Policy</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/terms-conditions.html') }}">Terms
                                Conditions</a>

                            <a class="dropdown-item" href="{{ asset('assets/client/404.html') }}">404 Page</a>

                        </div>
                    </li>

                    <li class="nav-item">
                        @if (!isset($_SESSION['user']))
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        @endif

                        @if (isset($_SESSION['user']))
                            <a class="nav-link" href="{{ url('logout') }}">Logout</a>
                        @endif
                    </li>
                </ul>
            </div>

            <div class="order-2 order-lg-3 d-flex align-items-center">
                <select class="m-2 border-0 bg-transparent" id="select-language">
                    <option id="en" value="" selected>En</option>
                    <option id="fr" value="">Fr</option>
                </select>

                <!-- search -->
                <form class="search-bar">
                    <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                </form>

                <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                    data-target="#navigation">
                    <i class="ti-menu"></i>
                </button>
            </div>

        </nav>
    </div>
</header>
