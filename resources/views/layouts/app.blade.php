<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveHive</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background setup */
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('/images/bg.webp') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow-x: hidden;
        }

        /* Overlay effect for readability */
        .overlay {
            background-color: rgba(0, 0, 0, 0.7); /* Dark overlay */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        /* Navbar styles */
        .navbar {
            background-color: transparent;
            z-index: 2; /* Above overlay */
        }
        .navbar-brand {
            font-weight: 600;
            color: #d4af37 !important; /* Gold */
            font-size: 1.5rem;
        }
        .navbar-nav .nav-link {
            color: #f5f5f5 !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: #d4af37 !important; /* Gold hover */
        }

        /* Button styles */
        .btn-outline-gold {
            color: #d4af37;
            border-color: #d4af37;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-outline-gold:hover {
            background-color: #d4af37;
            color: #121212;
            border-color: #d4af37;
        }
        .btn-gold {
            background-color: #d4af37;
            color: #121212;
            font-weight: 600;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-gold:hover {
            background-color: #b58e2a;
            color: #ffffff;
        }

        /* Content container */
        .content {
            position: relative;
            z-index: 2; /* Above overlay */
            padding-top: 100px;
        }
    </style>
</head>
<body>
    <!-- Overlay for darkening background -->
    <div class="overlay"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">DriveHive</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vehicles.index') }}">Explore Cars</a>
                    </li>
                    @auth
                     <!-- Authenticated user links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bookings.index') }}">My Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="color: #f5f5f5;">Logout</button>
                            </form>
                        </li>
                    @else
                     <!-- Guest links -->
                        <li class="nav-item">
                            <a class="btn btn-outline-gold me-2" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-gold" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
