<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="h-screen flex overflow-hidden bg-gray-100">

            <div class="flex flex-col w-0 flex-1 overflow-hidden">

                @include('app-bar')

                <main class="flex-1 relative overflow-y-auto focus:outline-none">
                    <div class="py-6">

                        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 text-center">
                            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Done!</h2>
                            <a class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600" href="/">Back Home</a>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
