<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="flex h-screen">
            <div class="m-auto text-center">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Done!</h2>
                <a class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600" href="/">Back Home</a>
            </div>
        </div>
    </body>
</html>
