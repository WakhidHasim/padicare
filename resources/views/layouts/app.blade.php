<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PadiCare - {{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('admin/img/favicon.ico') }}" rel="icon">

    @include('layouts.style')
</head>

<body>

    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

    @include('layouts.script')

</body>

</html>
