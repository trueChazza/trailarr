<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PHPHtmlParser\Dom;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('query') === 'popular') {
            $items = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=' . config('services.tmdb.api_key'))->json();
        }

        if ($request->query('query') === 'now-playing') {
            $items = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=' . config('services.tmdb.api_key'))->json();
        }

        if ($request->query('query') === 'upcoming') {
            $items = Http::get('https://api.themoviedb.org/3/movie/upcoming?api_key=' . config('services.tmdb.api_key'))->json();
        }

        $hasPoster = array_filter($items['results'], function($item) {
            return array_key_exists('poster_path', $item);
        });
    
        $hasTitle = array_filter($hasPoster, function($item) {
            return array_key_exists('title', $item);
        });
    
        return view('movies', [
            'items' => [
                'results' => $hasTitle
            ]
        ]);
    }

    public function show(string $movie)
    {
        $item = Http::get("https://api.themoviedb.org/3/movie/$movie?api_key=" . config('services.tmdb.api_key'));

        $key = (new Dom)->loadStr(Http::get("https://www.themoviedb.org/movie/$movie")->body())
            ->find('.video.none .no_click.play_trailer')
            ->offsetGet(0)
            ->getAttribute('data-id');
    
        return view('item', [
            'item' => $item->json(),
            'key' => $key
        ]);
    }
}