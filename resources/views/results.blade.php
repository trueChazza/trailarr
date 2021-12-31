@extends('app')

@section('content')
    <div class="pt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex">
            <h1 class="flex-1 text-2xl font-bold text-gray-900">Results</h1>
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
