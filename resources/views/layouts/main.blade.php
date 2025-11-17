<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FarmTech MIS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts and Styles -->
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        html, body {
            height: 100%;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-top: 60px;
        }
        main {
            flex: 1 0 auto;
        }
        .navbar {
            background-color: #26605f;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .navbar-brand {
            font-size: 2.1rem;
            font-weight: 800;
            letter-spacing: 0.01em;
        }
        .nav-link {
            color: white !important;
            padding: 1rem 1.5rem;
            transition: background-color 0.3s;
        }
        
        .nav-link:hover {
            background-color: #3a7d7b;
        }
        
        .navbar-nav {
            margin-left: auto;
        }
        
        body {
            padding-top: 60px;
        }

        .navbar-toggler {
            border-color: rgba(255,255,255,0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.7%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">FarmTech MIS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('farmer.index') }}">Beneficiary Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('schemes') }}">Govt. Schemes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('get-trained') }}">Get Trained</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('assistance') }}">Get Assistance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @yield('content')
    </main>
    @stack('scripts')

    <!-- Emergency Contacts Ribbon Footer -->
    <footer class="custom-footer">
        <div class="footer-contacts">
            <strong>Kisan Call Center:</strong> 1800-180-1551 &nbsp; | &nbsp;
            <strong>Crop Crisis:</strong> 1800-123-4567
        </div>
        <div class="footer-line"></div>
        <div class="footer-copyright">
            <div class="d-flex justify-content-between">
                <div>&copy; 2025 FarmTech MIS | All Rights Reserved</div>
                <div class="footer-madeby">Made By Mridul Nikhanj</div>
            </div>
        </div>
    </footer>
    <style>
    .custom-footer {
        width: 100vw;
        background: #26605F;
        color: #fff;
        /* position: fixed; */
        /* left: 0; */
        /* bottom: 0; */
        z-index: 2000;
        text-align: left;
        padding-top: 0.7rem;
        padding-bottom: 0.2rem;
        font-size: 1.18rem;
        box-shadow: 0 -2px 8px rgba(38,96,95,0.08);
        padding-left: 2.5rem;
    }
    .footer-contacts {
        font-weight: 600;
        letter-spacing: 0.01em;
        margin-bottom: 0.5rem;
    }
    .footer-line {
        display: none;
    }
    .footer-copyright {
        font-size: 1rem;
        color: #eaeaea;
        font-weight: 400;
        padding-bottom: 0.2rem;
    }
    .footer-madeby {
        padding-right: 2rem;
    }
    @media (max-width: 900px) {
        .footer-madeby { padding-right: 0.5rem; }
        .custom-footer { font-size: 1rem; padding-left: 1rem; }
    }
    </style>
</body>
</html> 