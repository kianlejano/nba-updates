<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    @vite('resources/css/app.css')
    <title>{{ config('app.name') }}</title>
</head>
<body class="w-full min-h-screen dark:bg-gray-900">
    <header>
       <nav class="navbar">
            <div class="nav-container">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('images/logo.svg') }}" class="h-16" alt="Logo" />
                    <span class="app-name">
                        {{ config('app.name') }}
                    </span>
                </a>
                
                <!-- Mobile Toggle Button -->
                <button data-collapse-toggle="navbar-default" type="button" class="nav-toggle">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>

                <!-- Navigation Menu -->
                <div id="navbar-default" class="hidden w-full md:block md:w-auto">
                    <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 
                        md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white 
                        dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        
                        @foreach(config('menu.NAV_LINKS') as $link)
                            <a href="{{ route($link['route']) }}" class="nav-link {{ Route::is($link['route']) ? 'nav-active' : '' }}">
                                {{ $link['name'] }}
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="w-full min-h-screen dark:bg-gray-900">
        <div class="max-w-8/10 mx-auto py-8">
            {{ $slot }}
        </div>
    </main>

    <footer class="footer">
        <p>Data provided by <a href="https://www.balldontlie.io/" target="_blank" class="font-bold text-blue-700 dark:text-blue-800">Ball Don't Lie API</a>.</p>
        <p>Developed by <a href="https://github.com/kianlejano" target="_blank" class="font-bold">Kian Lejano</a>.</p>
        <p class="italic text-[10px] mt-1 text-gray-400">
            This site is a personal project built to enhance my skills in API development and the Laravel Framework. It is not affiliated with, endorsed by, or sponsored by the National Basketball Association (NBA) or any of its teams. All NBA team names, logos, and trademarks are the property of their respective owners.
        </p>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleButton = document.querySelector("[data-collapse-toggle]");
            const navMenu = document.getElementById("navbar-default");

            if (toggleButton && navMenu) {
                toggleButton.addEventListener("click", function () {
                    navMenu.classList.toggle("hidden");
                });
            }
        });
    </script>
    @stack('scripts')

</body>
</html>
