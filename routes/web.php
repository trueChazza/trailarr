<?php

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShowController;
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

Route::get('/', [ HomeController::class, 'index' ]);

Route::get('/search', [ SearchController::class, 'index' ]);

Route::resource('/movies', MovieController::class)->only([ 'index', 'show' ]);
Route::resource('/shows', ShowController::class)->only([ 'index', 'show' ]);
Route::post('/{id}/download', [ DownloadController::class, 'store' ]);