<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            box-sizing: border-box;
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .input-field {
            width: 100%;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .button {
            display: inline-block;
            width: 100%;
            margin: 10px 1%;
            padding: 10px 0;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            box-sizing: border-box;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .button.back {
            background-color: #6c757d;
        }
        .button.back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    @if(Auth::check())
        <script>window.location = "{{ route('home') }}";</script>
    @endif
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" name="name" placeholder="Name" class="input-field" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror

            <input type="password" name="password" class="input-field" id="password" placeholder="Password" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
            @if(session('error'))
                <div>{{ session('error') }}</div>
            @endif

            <div style="margin-top: 20px;">
                <button type="submit" class="button">Login</button>
                <a href="{{ url('/') }}" class="button back">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
