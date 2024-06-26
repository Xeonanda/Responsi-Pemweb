<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
        }
        .button {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            background-color: #333;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #000;
            text-decoration: none;
            color: #ffffff;
        }
    </style>
</head>
<body>
    @if(Auth::check())
        <script>window.location = "{{ route('home') }}";</script>
    @endif
    <div class="container">
        <h1 style="font-size: 50px;">Welcome!</h1>
        <p>Aplikasi ini adalah sebuah dashboard inventaris yang digunakan untuk tugas responsi mata kuliah pemrogramman web</p>
        <a href="{{ route('register') }}" class="button">Register</a>
        <a href="{{ route('login') }}" class="button">Login</a>
    </div>
</body>
</html>
