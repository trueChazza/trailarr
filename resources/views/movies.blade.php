@extends('app')

@section('content')
    <div class="pt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex">
            <h1 class="flex-1 text-2xl font-bold text-gray-900">Movies</h1>
        </div>

        <div class="mt-3 sm:mt-2">

            <div class="sm:block">
                <div class="flex items-center border-b border-gray-200">

                    <nav class="flex-1 -mb-px flex space-x-6 xl:space-x-8" aria-label="Tabs">

                        <a href="/movies?query=popular" class="{{ request()->query('query') === 'popular' ? 'border-indigo-500 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm' }}">
                            Popular
                        </a>

                        <a href="/movies?query=now-playing" class="{{ request()->query('query') === 'now-playing' ? 'border-indigo-500 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm' }}">
                            Now Playing
                        </a>

                        <a href="/movies?query=upcoming" class="{{ request()->query('query') === 'upcoming' ? 'border-indigo-500 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm' }}">
                            Upcoming
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <section class="mt-8 pb-16" aria-labelledby="gallery-heading">
            <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-6 xl:gap-x-8">

                @foreach($items['results'] as $item)
                    <li class="relative">
                        <a href="/movies/{{ $item['id'] }}" class="group">
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
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
@endsection
