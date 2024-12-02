<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client;
Route::namespace(App\Http\Controllers\Client::class)->group(function () {
    Route::get('/', 'PagesController@index')->name('home');
    Route::post('/cart/add', 'CartController@add')->name('cart.add');
    // Route::post('/login', 'AuthController@authenticate');
    // Route::get('/register', 'AuthController@register')->name('register');
    // Route::post('/register', 'AuthController@store');
    // Route::get('/logout', 'AuthController@logout')->name('logout');
});

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
