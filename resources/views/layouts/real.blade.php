<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>

    <!-- start Top Bar -->
    <section id="topbar" class="topbar d-flex align-items-center">
        @include('includes.topbar')
    </section>
    <!-- End Top Bar -->

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        @include('includes.header')
    </header>
    <!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        @include('includes.footer')
    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

</body>

</html>