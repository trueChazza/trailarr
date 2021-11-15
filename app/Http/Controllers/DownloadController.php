<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\DownloadVideo;

class DownloadController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'key' => 'required|string'
        ]);
    
        DownloadVideo::dispatch($request->key);
    
        return redirect()->back()->with([
            'success' => 'Success'
        ]);
    }
}
