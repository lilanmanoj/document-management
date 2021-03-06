<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
    'prefix' => 'files',
    'as' => 'files.',
    'namespace' => 'App\Http\Controllers\Modules',
], function () {
    Route::get('upload', 'FileController@create')->name('upload');
    Route::get('index', 'FileController@index')->name('index');
});
