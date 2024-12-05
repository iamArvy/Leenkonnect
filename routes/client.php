<?php
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Client;
Route::namespace(App\Http\Controllers\Client::class)->group(function () {
    Route::get('/', 'PagesController@index')->name('home');
    Route::get('/about', 'PagesController@about')->name('about');
    Route::get('/contact', 'PagesController@contact')->name('contact');
    Route::get('/faq', 'PagesController@faq')->name('faq');
    Route::get('/services', 'PagesController@services')->name('services');

    Route::group([
        'as'=>'cart.',
        'prefix'=>'/cart'
    ], function () {
        // Route::get('/', 'CartController@index')->name('index');
        Route::post('/add', 'CartController@add')->name('add');
        Route::post('/remove', 'CartController@remove')->name('remove');
        Route::post('/clear', 'CartController@clear')->name('clear');
        Route::post('/update', 'CartController@update')->name('update');
    });

    Route::group([
        'as'=>'shop.',
        'prefix'=>'/shop'
    ], function () {
        Route::get('/', 'ShopController@index')->name('index');
        Route::get('/catalog/{category}', 'ShopController@catalog')->name('catalog');
    });

    Route::group([
        'as'=>'contact.',
        'prefix'=>'/contact'
    ], function () {
        Route::get('/contact', 'ContactController@index')->name('index');
        Route::post('/contact/store', 'ContactController@store')->name('store');
    });

    // Checkout

    Route::group([
        'as'=>'checkout.',
        'prefix'=>'/checkout'
    ], function () {
        Route::get('/', 'CartController@checkout')->name('get');
        Route::post('/', 'OrderController@store')->name('post');
    });

    // Route::post('/cart/add', 'CartController@add')->name('cart.add');
    // Route::post()
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
