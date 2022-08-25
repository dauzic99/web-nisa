<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    @include('landing.layouts.partials.head')

</head>

<body class="stretched">

    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper" class="clearfix">

        @include('landing.layouts.partials.navbar')

        @yield('slider')



        @yield('content')

        @include('landing.layouts.partials.footer')
    </div><!-- #wrapper end -->


    <!-- Go To Top
============================================= -->
    <div id="gotoTop" class="icon-line-arrow-up"></div>

    @include('landing.layouts.partials.scripts')

    @yield('modals')
</body>

</html>
