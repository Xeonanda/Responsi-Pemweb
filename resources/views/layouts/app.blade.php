<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Navbar')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        #app {
            display: flex;
            min-height: 100vh;
        }
        nav {
            flex: 0 0 30vh;
            background-color: #202020;
            font-weight: bold;
        }

        .nav-item {
            width: 90%;
            align-self: center;
        }
        .content {
            flex: 1;
            padding: 2rem;
        }
        .nav-link {
            background-color: #111111;
            color: #e3e3e3;
            margin: 0.5rem 0;
            padding: 0.75rem;
            border-radius: 5px;
            text-align: left;
            width: 100%;
            border-bottom: 2px solid #111111;
        }
        .nav-link:hover {
            background-color: #202020;
            color: #e3e3e3;
        }
        .user-info {
            margin-top: auto;
            text-align: center;
            padding: 1rem;
            height: 12%;
            width: 100%;
            border-top: 2px solid #e3e3e3;
            color: #e3e3e3;
            font-family: sans-serif;
        }
        .logo {
            width: 50px;
            height: auto;
            margin: 1rem 0;
            align-self: center;
        }

        nav .logo-underline {
            width: 100%;
            border-bottom: 2px solid #e3e3e3;
            margin-bottom: 1rem;
        }

        .logout-btn {
            color: #e3e3e3;
            background-color: #e74c3c;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #c0392b;
            text-decoration: none;
            color: #e3e3e3;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="d-flex flex-column">
            <img src="{{ asset('images/warehouse.png') }}" alt="Gudang Logo" class="logo">
            <div class="logo-underline"></div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pemasok.index') }}">Pemasok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori.index') }}">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produk.index') }}">Produk</a>
                </li>
            </ul>

            <div class="user-info">
                @auth
                    <p>Welcome, {{ Auth::user()->name }}</p>
                    <a href="{{ route('logout') }}" class="logout-btn"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <p><a href="{{ route('login') }}">Login</a></p>
                @endauth
            </div>
        </nav>

        <div class="content">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
