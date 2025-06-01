<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Stock Management System')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet" />
    
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    
    <style>
        :root {
            --primary-color: #7b5cff;
            --primary-hover: #5c3edc;
            --text-dark: #2e2e3e;
            --bg-light: #fdfcff;
            --bg-dark: #121226;
            --text-light: #eaeaff;
            --shadow-light: rgba(123, 92, 255, 0.3);
            --shadow-dark: rgba(123, 92, 255, 0.6);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen,
                Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background: linear-gradient(135deg,rgb(255, 255, 255) 0%, rgb(255, 255, 255) 100%);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background 0.4s ease, color 0.4s ease;
            scroll-behavior: smooth;
        }

        body.dark {
            background: linear-gradient(135deg, #1a1a36 0%, #2a2a5a 100%);
            color: var(--text-light);
        }

        .navbar {
            background: var(--bg-light);
            box-shadow: 0 4px 20px var(--shadow-light);
            padding: 1.25rem 3rem;
            transition: background 0.4s ease, box-shadow 0.4s ease;
            backdrop-filter: saturate(180%) blur(10px);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        body.dark .navbar {
            background: var(--bg-dark);
            box-shadow: 0 4px 30px var(--shadow-dark);
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-color);
            letter-spacing: 1px;
            user-select: none;
            transition: color 0.3s ease;
        }

        body.dark .navbar-brand {
            color: var(--text-light);
        }

        .navbar-brand:hover {
            color: var(--primary-hover);
            text-decoration: none;
        }

        .btn-light, .btn-primary, .btn-outline-danger {
            border-radius: 12px;
            padding: 0.6rem 1.4rem;
            font-weight: 700;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            font-size: 1rem;
            min-width: 120px;
        }

        .btn-light {
            background: #ffffff;
            border: 1.8px solid #d0d0e6;
            color: var(--text-dark);
        }

        body.dark .btn-light {
            background: #222243;
            border: 1.8px solid #48486f;
            color: var(--text-light);
            box-shadow: none;
        }

        .btn-light:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
            box-shadow: 0 0 15px var(--primary-color);
        }

        body.dark .btn-light:hover {
            background: var(--primary-hover);
            border-color: var(--primary-hover);
            box-shadow: 0 0 15px var(--primary-hover);
            color: #fff;
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            color: #ffffff;
            box-shadow: 0 6px 12px var(--shadow-light);
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            box-shadow: 0 6px 18px var(--shadow-dark);
        }

        .btn-outline-danger {
            border-color: #dc2f9b;
            color: #c62877;
            font-weight: 700;
        }

        body.dark .btn-outline-danger {
            border-color: #f858be;
            color: #ff7edc;
        }

        .btn-outline-danger:hover {
            background: #ff52c1;
            color: #fff;
            box-shadow: 0 4px 10px #ff52c1aa;
        }

        body.dark .btn-outline-danger:hover {
            background: #ff38ba;
            box-shadow: 0 6px 12px #ff38baaa;
            color: #fff;
        }

        .theme-toggle {
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 10px transparent;
        }

        .theme-toggle:hover {
            background-color: var(--primary-color);
            box-shadow: 0 0 15px var(--primary-color);
        }

        body.dark .theme-toggle:hover {
            background-color: var(--primary-hover);
            box-shadow: 0 0 15px var(--primary-hover);
        }

        .theme-toggle svg {
            width: 26px;
            height: 26px;
            stroke: var(--text-dark);
            transition: stroke 0.3s ease;
        }

        body.dark .theme-toggle svg {
            stroke: var(--text-light);
        }

        .container {
            flex-grow: 1;
            max-width: 960px;
            margin: 2.5rem auto;
            padding: 0 1.5rem;
        }

        .footer {
            background: var(--bg-light);
            color: var(--text-dark);
            text-align: center;
            padding: 1rem 1.5rem;
            font-size: 0.9rem;
            box-shadow: 0 -2px 10px var(--shadow-light);
            transition: background 0.4s ease, color 0.4s ease;
            user-select: none;
        }

        body.dark .footer {
            background: var(--bg-dark);
            color: var(--text-light);
            box-shadow: 0 -2px 12px var(--shadow-dark);
        }

        /* RTL Adjustments */
        [dir="rtl"] .navbar-brand {
            margin-right: 0;
            margin-left: 2rem;
        }

        [dir="rtl"] .d-flex.justify-end {
            flex-direction: row-reverse;
        }

        [dir="rtl"] .me-2 {
            margin-right: 0 !important;
            margin-left: 0.5rem !important;
        }

        /* Smooth focus outline */
        button:focus, select:focus, a:focus {
            outline: 2px solid var(--primary-color);
            outline-offset: 3px;
            transition: outline-offset 0.3s ease;
        }

        button:focus-visible, select:focus-visible, a:focus-visible {
            outline-offset: 6px;
        }
    </style>

</head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body class="min-vh-100 d-flex flex-column">
    <nav class="navbar navbar-light">
        <a class="navbar-brand" href="#">@yield('navbar-title', 'Gestion de stock')</a>
        <div class="d-flex align-items-center justify-end gap-2">
            <select name="selectLang" id="selectLang" class="btn btn-light" aria-label="Select Language">
                <option @if(app()->getLocale() == 'ar') selected @endif value="ar">العربية</option>
                <option @if(app()->getLocale() == 'fr') selected @endif value="fr">Français</option>
                <option @if(app()->getLocale() == 'en') selected @endif value="en">English</option>
                <option @if(app()->getLocale() == 'es') selected @endif value="es">Español</option>
            </select>

            <button class="theme-toggle" aria-label="Toggle dark mode" title="Toggle dark mode">
                <svg id="theme-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </button>

            @auth
                <a href="{{ route('profile') }}" class="btn btn-primary me-2" title="Mon profil">Mon profil</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline" aria-label="Logout form">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Se déconnecter</button>
                </form>
            @endauth
        </div>
    </nav>

    <main class="container flex-grow-1">
        @yield('content')
    </main>

    <div class="footer">
        <div>© copyright 2025</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $("#selectLang").on('change', function () {
            const locale = $(this).val();
            window.location.href = `/changeLocale/${locale}`;
        });

        // Dark Mode Toggle
        const themeToggle = document.querySelector('.theme-toggle');
        const themeIcon = document.querySelector('#theme-icon');
        const body = document.body;

        const setDarkIcon = () => {
            themeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />';
        };
        const setLightIcon = () => {
            themeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />';
        };

        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark');
            setDarkIcon();
        } else {
            setLightIcon();
        }

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark');
            if (body.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
                setDarkIcon();
            } else {
                localStorage.setItem('theme', 'light');
                setLightIcon();
            }
        });
    </script>

    @stack('script')
</body>
</html>
