<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    @vite('resources/css/app.css')
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <header>
       <nav class="navbar">
            <div class="nav-container">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('images/logo.svg') }}" class="h-16" alt="Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
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
                        
                        @foreach(config('menu.nav_links') as $link)
                            <li><a href="/" class="nav-link">{{ $link['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

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

</body>
</html>
