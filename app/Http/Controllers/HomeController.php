<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $items = Http::get('https://api.themoviedb.org/3/trending/all/day?api_key=' . config('services.tmdb.api_key'))->json();

        $hasBackdrop = array_filter($items['results'], function($item) {
            return array_key_exists('backdrop_path', $item);
        });

        $hasTitle = array_filter($hasBackdrop, function($item) {
            return array_key_exists('title', $item);
        });

        return view('home', [
            'item' => empty($hasTitle) ? [] : $hasTitle[array_rand($hasTitle)]
        ]);
    }
}
