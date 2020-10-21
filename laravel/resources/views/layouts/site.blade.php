<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <title>Cifrando</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/all.css') }}" />
    @stack('head')
</head>

<body>
    
    @yield('content')

    @stack('linkscript')

    @stack('scripts')

</body>

</html>