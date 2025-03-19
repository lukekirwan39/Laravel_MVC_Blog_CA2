<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Laravel 8 Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #141E30, #243B55);
            color: white;
            text-align: center;
        }
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .btn-custom {
            background: #ff4e50;
            color: white;
            border-radius: 25px;
            padding: 12px 25px;
            font-size: 18px;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background: #ff6b6b;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Laravel 8 Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
{{--                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>--}}
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero">
    <h1 class="display-4">Welcome to Laravel 8 Blog</h1>
    <p class="lead">A simple and elegant blog powered by Laravel.</p>
{{--    <a href="{{ route('posts.index') }}" class="btn btn-custom">Explore Posts</a>--}}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
