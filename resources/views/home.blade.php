@extends('app')

@section('content')
<div class="relative overflow-hidden">

  <main>
  @if(!empty($item))
          <div class="relative">
              <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100"></div>
              <div class="">
                  <div class="relative sm:overflow-hidden">
                      <div class="absolute inset-0">
                          <img class="h-full w-full object-cover" src="https://image.tmdb.org/t/p/original{{ $item['backdrop_path'] }}" alt="{{ $item['title'] }}">
                          <div class="absolute inset-0 bg-gray-700 mix-blend-multiply"></div>
                      </div>
                      <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
                          <h1 class="text-left text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                              <span class="block text-white">{{ $item['title'] }}</span>
                          </h1>
                          <p class="mt-6 max-w-lg text-left text-xl text-white sm:max-w-2xl truncate">
                              {{ $item['overview'] }}
                          </p>
                          <div class="mt-10 max-w-sm sm:max-w-none sm:flex">
                              <div class="space-y-4 sm:space-y-0 sm:inline-grid sm:grid-cols-2 sm:gap-5">
                                  <a href="/movies/{{ $item['id'] }}" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-500 hover:bg-indigo-700 sm:px-8">
                                      See Trailer
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
  @endif

    <!-- More main page content here... -->
  </main>
</div>

@endsection
