<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PHPHtmlParser\Dom;

class ShowController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('query') === 'popular') {
            $items = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=' . config('services.tmdb.api_key'))->json();
        }

        if ($request->query('query') === 'on-the-air') {
            $items = Http::get('https://api.themoviedb.org/3/tv/on_the_air?api_key=' . config('services.tmdb.api_key'))->json();
        }

        if ($request->query('query') === 'top-rated') {
            $items = Http::get('https://api.themoviedb.org/3/tv/top_rated?api_key=' . config('services.tmdb.api_key'))->json();
        }

        $hasPoster = array_filter($items['results'], function($item) {
            return array_key_exists('poster_path', $item);
        });
    
        $hasName = array_filter($hasPoster, function($item) {
            return array_key_exists('name', $item);
        });
    
        return view('shows', [
            'items' => [
                'results' => $hasName
            ]
        ]);
    }

    public function show(string $show)
    {
        $item = Http::get("https://api.themoviedb.org/3/tv/$show?api_key=" . config('services.tmdb.api_key'));

        $key = (new Dom)->loadStr(Http::get("https://www.themoviedb.org/tv/$show")->body())
            ->find('.video.none .no_click.play_trailer')
            ->offsetGet(0)
            ->getAttribute('data-id');
    
        return view('item', [
            'item' => $item->json(),
            'key' => $key
        ]);
    }
}
