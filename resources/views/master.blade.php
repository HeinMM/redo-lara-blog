<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>
<body>

        <section class="my-3">
            @yield('content')
        </section>

        <script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>
