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
                    <ul class="font-medium flex flex-col md:items-center p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 
                        md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white 
                        dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        
                        @foreach(config('menu.NAV_LINKS') as $link)
                            <a href="{{ route($link['route']) }}" class="nav-link {{ Route::is($link['route']) ? 'nav-active' : '' }}">
                                {{ $link['name'] }}
                            </a>
                        @endforeach
                        <button id="theme-toggle" 
                            class="flex justify-center cursor-pointer p-2 rounded-sm dark:text-white hover:bg-gray-100
                             md:rounded-full order-1 md:order-last md:bg-gray-200 md:hover:bg-gray-300
                            md:dark:bg-gray-800 hover:dark:bg-gray-700"
                        >
                            <svg id='dark-button' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M7.455 2.004a.75.75 0 0 1 .26.77 7 7 0 0 0 9.958 7.967.75.75 0 0 1 1.067.853A8.5 8.5 0 1 1 6.647 1.921a.75.75 0 0 1 .808.083Z" clip-rule="evenodd" />
                            </svg>
                            <svg id='light-button' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path d="M10 1a6 6 0 0 0-3.815 10.631C7.237 12.5 8 13.443 8 14.456v.644a.75.75 0 0 0 .572.729 6.016 6.016 0 0 0 2.856 0A.75.75 0 0 0 12 15.1v-.644c0-1.013.762-1.957 1.815-2.825A6 6 0 0 0 10 1ZM8.863 17.414a.75.75 0 0 0-.226 1.483 9.066 9.066 0 0 0 2.726 0 .75.75 0 0 0-.226-1.483 7.553 7.553 0 0 1-2.274 0Z" />
                            </svg>
                        </button>
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
            const darkButton = document.getElementById("dark-button");
            const lightButton = document.getElementById("light-button");

            if (toggleButton && navMenu) {
                toggleButton.addEventListener("click", function () {
                    navMenu.classList.toggle("hidden");
                });
            }

            const htmlElement = document.documentElement;
            const themeToggle = document.getElementById("theme-toggle");

            // Load stored theme from localStorage
            if (localStorage.getItem("theme") === "light") {
                htmlElement.setAttribute("data-theme", "light");
                lightButton.classList.add("hidden");
            } else {
                htmlElement.setAttribute("data-theme", "dark");
                darkButton.classList.add("hidden")

            }

            // Toggle the theme when button is clicked
            themeToggle.addEventListener("click", function () {
                if (htmlElement.getAttribute("data-theme") === "dark") {
                    htmlElement.setAttribute("data-theme", "light");
                    localStorage.setItem("theme", "light");
                    darkButton.classList.remove("hidden");
                    lightButton.classList.add("hidden");
                } else {
                    htmlElement.setAttribute("data-theme", "dark");
                    localStorage.setItem("theme", "dark");
                    darkButton.classList.add("hidden");
                    lightButton.classList.remove("hidden");
                }
            });
        });
    </script>
    @stack('scripts')

</body>
</html>
