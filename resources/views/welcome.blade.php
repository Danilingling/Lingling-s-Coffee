<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lingling's Coffee</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Kadwa:wght@400;700&display=swap" rel="stylesheet">

    </head>
    <body>

    <div class="container">
        <div class="frame">
            <h2>Lingling's Coffee</h2>
            <div class="coffee-icon" onclick="irAInicio()"></div>
            <h2>Explora nuestro menú y disfruta de las mejores bebidas.</h2>
        </div>
    </div>

    <script>
        function irAInicio() {
            window.location.href = "{{ route('inicio') }}";
        }
    </script>
    </body>
</html>
