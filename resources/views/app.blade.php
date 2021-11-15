<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="relative h-screen bg-gray-50 flex overflow-hidden">
        <div class="hidden w-28 bg-indigo-700 overflow-y-auto md:block">
            <div class="w-full py-6 flex flex-col items-center">
                <div class="flex-shrink-0 flex items-center">

                    <a href="/">
                        <svg width="30px" height="30px" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded" transform="translate(-476.000000, -954.000000)">
                                    <g id="AV" transform="translate(100.000000, 852.000000)">
                                        <g id="-Round-/-AV-/-movie" transform="translate(374.000000, 98.000000)">
                                            <g>
                                                <rect id="Rectangle-Copy-48" x="0" y="0" width="24" height="24"></rect>
                                                <path d="M18,4 L19.82,7.64 C19.9,7.8 19.78,8 19.6,8 L17.62,8 C17.24,8 16.89,7.79 16.73,7.45 L15,4 L13,4 L14.82,7.64 C14.9,7.8 14.78,8 14.6,8 L12.62,8 C12.24,8 11.89,7.79 11.73,7.45 L10,4 L8,4 L9.82,7.64 C9.9,7.8 9.78,8 9.6,8 L7.62,8 C7.24,8 6.89,7.79 6.72,7.45 L5,4 L4,4 C2.9,4 2,4.9 2,6 L2,18 C2,19.1 2.9,20 4,20 L20,20 C21.1,20 22,19.1 22,18 L22,5 C22,4.45 21.55,4 21,4 L18,4 Z" id="🔹Icon-Color" fill="white"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>

                </div>

                <div class="flex-1 mt-6 w-full px-2 space-y-1">
                    <!-- Current: "bg-indigo-800 text-white", Default: "text-indigo-100 hover:bg-indigo-800 hover:text-white" -->
                    @if (request()->is('movies'))
                        <a href="/movies?query=popular" class="bg-indigo-800 text-white group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    @else
                        <a href="/movies?query=popular" class="text-indigo-100 hover:bg-indigo-800 hover:text-white group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    @endif
                        <!--
            Heroicon name: outline/home

            Current: "text-white", Default: "text-indigo-300 group-hover:text-white"
          -->
                        @if (request()->is('movies'))
                            <svg class="text-indigo-300 group-hover:text-white h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        @else
                            <svg class="text-white h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        @endif
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                        <span class="mt-2">Movies</span>
                    </a>

                    @if (request()->is('shows'))
                        <a href="/shows?query=popular" class="bg-indigo-800 text-white group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    @else
                        <a href="/shows?query=popular" class="text-indigo-100 hover:bg-indigo-800 hover:text-white group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    @endif
                    
                    @if (request()->is('shows'))
                        <svg class="text-indigo-300 group-hover:text-white h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    @else
                        <svg class="text-white h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    @endif
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                    </svg>
                    <span class="mt-2">Shows</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">

            @include('app-bar')

            <div class="flex-1 flex items-stretch overflow-hidden">

                <main class="flex-1 overflow-y-auto">

                    @yield('content')
                </main>
            </div>
        </div>
    </div>

</body>

</html>