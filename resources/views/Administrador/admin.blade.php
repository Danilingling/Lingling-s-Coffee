<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administracion</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Kadwa:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>

<div class="container">
    <div class="frame">
        <h2>Inicio de Sesión</h2>
        <div class="login-box">
            <div class="login-container">
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div>
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit">Ingresar</button>
                </form>

                @if(session('error'))
                    <p>{{ session('error') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>


<style>


    h2 {
        font-size: 50px;
        margin-bottom: 20px;
    }

    .login-box {
        display: flex;
        justify-content: center;
    }

    .login-container {
        width: 100%;
        max-width: 300px;
        background: #9a8787;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        color: white;
    }

    .login-container label {
        display: block;
        font-weight: bold;
        margin: 15px 0 5px;

    }

    .login-container input {
        width: 93%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #6e1919;
        border-radius: 5px;
        background-color: #dad5d5;
    }

    .login-container button {
        width: 100%;
        padding: 10px;
        background-color: #676561;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-container button:hover {
        background-color: #218838;
    }

    p {
        font-size: 14px;
        color: red;
        margin-top: 10px;
    }


</style>


</body>
</html>
