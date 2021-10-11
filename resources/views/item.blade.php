<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $item['title'] }} | {{ config('app.name') }}</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="flex h-screen">
            <div class="m-auto text-center">

                <iframe width="640" height="360" src="https://www.youtube.com/embed/{{ $key }}"></iframe>

                <form method="POST" action="/{{ $item['id'] }}">
                    @csrf

                    <input type='hidden' name='key' value='{{ $key }}'>

                    <button type="submit" class="mt-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Download
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
