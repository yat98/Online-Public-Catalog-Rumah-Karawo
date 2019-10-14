<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Open Catalog Rumah Karawo {{ !empty($halaman) ? '| '.ucwords($halaman) : '' }}</title>
    <!-- CSS -->
    @yield('css')
</head>

<body {{ isset($cari) ? !empty($cari) ? 'class=search-wrapper-on':null : null }}>
    @yield('main')
    @yield('footer')

    <!-- JAVASCRIPT -->
    @yield('javascript')
    @yield('javascript-internal')
</body>

</html>