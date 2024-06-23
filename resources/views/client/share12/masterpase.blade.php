<!doctype html>
<html class="no-js" lang="en">

<head>
   @include('client.share12.css')
</head>

<body>

<div class="main-wrapper">

   @include('client.share12.header')

  @include('client.share12.slide')

  <main>

    @yield('noi_dung')

 </main>

   @include('client.share12.footer')



</div>

@include('client.share12.js')
 @yield('js')

</body>

</html>
