<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Iman\Streamer\VideoStreamer;

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
    return view('welcome');
});


Route::group(['prefix' => 'portal'], function () {
    Voyager::routes();
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::get('/videos', function (Request $request) {
    $path = public_path('storage/'.$request->id);
    return view('video')->with(['path' => '/videos-serve?id='.$request->id]);
});

Route::get('/videos-serve', function (Request $request) {
    $path = public_path('storage/'.$request->id);
    
    VideoStreamer::streamFile($path);
});