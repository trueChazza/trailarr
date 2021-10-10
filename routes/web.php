<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

    $item = Http::get("https://api.themoviedb.org/3/movie/{$id}?api_key=" . config('services.tmdb.api_key') . '&language=en-US');

    return view('item', [
        'item' => $item->json()
    ]);
});
