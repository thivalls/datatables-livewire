<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatables com Livewire</title>

    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    @yield('content')

    @livewireScripts
</body>
</html>