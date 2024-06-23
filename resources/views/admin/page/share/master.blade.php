<!doctype html>
<html lang="en">

<head>
    @include('admin.page.share.css')
</head>

<body>
    <div class="wrapper">
        <div class="header-wrapper">
            @include('admin.page.share.header')
            @include('admin.page.share.menu')
        </div>
        <div class="page-wrapper">
            <div class="page-content">
                @yield('noi_dung')
            </div>
        </div>
        <div class="overlay toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        @include('admin.page.share.footer')
    </div>
    @include('admin.page.share.color')
    @include('admin.page.share.js')
    @yield('js')
</body>

</html>
