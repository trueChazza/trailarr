<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use PHPHtmlParser\Dom;
use YoutubeDl\Options;
use YoutubeDl\YoutubeDl;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $items = Http::get('https://api.themoviedb.org/3/trending/all/day?api_key=' . config('services.tmdb.api_key'))->json();

    $hasPoster = array_filter($items['results'], function($item) {
        return array_key_exists('poster_path', $item);
    });

    $hasTitle = array_filter($hasPoster, function($item) {
        return array_key_exists('title', $item);
    });

    return view('home', [
        'items' => [
            'results' => $hasTitle
        ]
    ]);
})->name('home');

Route::get('/now-playing', function () {

    $items = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=' . config('services.tmdb.api_key'))->json();

    $hasPoster = array_filter($items['results'], function($item) {
        return array_key_exists('poster_path', $item);
    });

    $hasTitle = array_filter($hasPoster, function($item) {
        return array_key_exists('title', $item);
    });

    return view('home', [
        'items' => [
            'results' => $hasTitle
        ]
    ]);
})->name('now-playing');

Route::get('/upcoming', function () {

    $items = Http::get('https://api.themoviedb.org/3/movie/upcoming?api_key=' . config('services.tmdb.api_key'));

    $hasPoster = array_filter($items['results'], function($item) {
        return array_key_exists('poster_path', $item);
    });

    $hasTitle = array_filter($hasPoster, function($item) {
        return array_key_exists('title', $item);
    });

    return view('home', [
        'items' => [
            'results' => $hasTitle
        ]
    ]);
})->name('upcoming');

Route::get('/search', function (Request $request) {

    $query = $request->query('query');

    $items = Http::get("https://api.themoviedb.org/3/search/multi?query=$query&api_key=" . config('services.tmdb.api_key'))->json();

    $hasPoster = array_filter($items['results'], function($item) {
        return array_key_exists('poster_path', $item);
    });

    $hasTitle = array_filter($hasPoster, function($item) {
        return array_key_exists('title', $item);
    });

    return view('results', [
        'title' => 'Results',
        'items' => [
            'results' => $hasTitle
        ]
    ]);
});

Route::get('/{id}', function ($id) {

    $item = Http::get("https://api.themoviedb.org/3/movie/$id?api_key=" . config('services.tmdb.api_key'));

    $key = (new Dom)->loadStr(Http::get("https://www.themoviedb.org/movie/$id")->body())
        ->find('.video.none .no_click.play_trailer')
        ->offsetGet(0)
        ->getAttribute('data-id');

    return view('item', [
        'item' => $item->json(),
        'key' => $key
    ]);
});

Route::post('/{id}', function (Request $request, $id) {

    $request->validate([
        'key' => 'required|string'
    ]);

    (new YoutubeDl)->download(
        Options::create()
            ->downloadPath('/var/www/html/storage/app/videos')
            ->url("https://www.youtube.com/watch?v=$request->key")
            ->output('%(title)s.%(ext)s')
    );

    return view('success');
});
