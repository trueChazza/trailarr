<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Upcoming</h2>

            <div class="mt-6 grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                @foreach($items['results'] as $item)
                    <a href="/{{ $item['id'] }}" class="group">
                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="https://image.tmdb.org/t/p/original{{ $item['poster_path'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            {{ $item['release_date'] }}
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            {{ $item['title'] }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </body>
</html>
