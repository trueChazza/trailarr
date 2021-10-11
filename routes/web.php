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

    $items = Http::get('https://api.themoviedb.org/3/movie/upcoming?api_key=' . config('services.tmdb.api_key') . '&language=en-US&page=1');

    return view('home', [
        'items' => $items->json()
    ]);
});

Route::get('/{id}', function ($id) {

    $item = Http::get("https://api.themoviedb.org/3/movie/$id?api_key=" . config('services.tmdb.api_key') . '&language=en-US');

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
