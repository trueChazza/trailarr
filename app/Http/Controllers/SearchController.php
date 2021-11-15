<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function index(Request $request)
    {
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
    }
}
