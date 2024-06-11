<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

  
    @include('layouts.partials.head')

</head>

<body>
    <!-- navigation -->
    @include('layouts.partials.header')
    <!-- /navigation -->
    @include('layouts.partials.topbar')


    <section class="section-sm">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 rounded-0 text-center shadow-none overflow-hidden">
                        <a href="#!">
                            <span class="badge badge-primary">NEW</span>
                            <img src="images/shop/01.jpg" alt="" class="card-img-top rounded-0">
                            <div class="card-body">
                                <h4 class="text-uppercase mb-3">smart watch</h4>
                                <p class="h4 text-muted font-weight-light mb-3">Lip Gloss</p>
                                <p class="h4">$25.00</p>
                            </div>
                        </a>
                    </div>
                </div> --}}

                @yield('content')

            </div>
        </div>
    </section>

    @include('layouts.partials.footer')


    <!-- JS Plugins -->
    @include('layouts.partials.script')
</body>

</html>
