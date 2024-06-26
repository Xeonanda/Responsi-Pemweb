<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Laravel App')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        html, body {
            height: 100%;
        }
        #app {
            display: flex;
            min-height: 100vh;
        }
        nav {
            flex: 0 0 200px;
        }
        .content {
            flex: 1;
        }
        .user-info {
            margin-top: auto;
            padding: 1rem;
            background-color: #f8f9fa;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="d-flex flex-column bg-light">
            <!-- Sidebar -->
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pemasok') }}">Pemasok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori') }}">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produk') }}">Produk</a>
                </li>
            </ul>

            <!-- User Info -->
            <div class="user-info">
                @auth
                    <p>{{ Auth::user()->name }}</p>
                    <a href="{{ route('logout') }}"
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

        <div class="content p-4">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
