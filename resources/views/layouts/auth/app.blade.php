<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PadiCare - {{ $title }}</title>

    @include('layouts.auth.style')

</head>

<body class="my-login-page">

    @yield('content')

    @include('layouts.auth.script')

</body>

</html>
