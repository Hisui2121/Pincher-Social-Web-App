<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ isset($title) ? $title . ' - Pincher' : 'Pincher' }} </title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/pinch-style.css">
    <link rel="stylesheet" href="/css/edit-style.css">
    <link rel="stylesheet" href="/css/home-style.css">
    <link rel="stylesheet" href="/css/register-style.css">
</head>

<body>
    <nav class="navbar">
        <div class="navbar-start">
            <a href="/" class="brand">🤏 Pincher</a>
        </div>
        <div class="nav-actions">
            @auth
                <span class="text-sm">{{auth()->user()->name}}</span>
                <form action="{{route('logout')}}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="btn">Logout</button>
                </form>
            @else
            <a href="/login" class="btn ghost">Sign In</a>
            <a href="{{route('register')}}" class="btn primary">Sign Up</a>
            @endauth
        </div>
    </nav>
    @if(session('success'))
        <div class="toast">
            <div class="alert alert-sucess">
                <svg class="icon" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    stroke="currentColor"
                    stroke-width="2"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"></path>
                </svg>
                <span>Message pinched successfully!</span>
            </div>
        </div>
    @endif

    <main class="container">
        {{ $slot }}
    </main>

    <footer class="footer">
        <p>© 2026 Pincher - Built with laravel, css, html ❤️</p>
    </footer>
</body>

</html>