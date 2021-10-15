<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
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
