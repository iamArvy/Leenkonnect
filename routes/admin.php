<?php
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin;

Route::group([
    'namespace' => App\Http\Controllers\Admin::class,
    'middleware'=>['auth:sanctum', 'role:superuser'],
    'as'=>'admin.',
    'prefix'=>'/admin'
], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/products', 'ProductController@index')->name('products');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('consultants', ConsultantController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('bookings', BookingsController::class);
    Route::resource('services', ServiceController::class);
    // Route::post('/search', 'ProductController@search')->name('search');
    // Route::resource('settings', SettingController::class);
    // Route::resource('pages', PageController::class);

    // Route::group([
    //     'as'=>'products.',
    //     'prefix'=>'/products'
    // ], function () {
    //     Route::get('/', 'ProductController@index')->name('index');
    //     Route::post('/add', 'ProductController@add')->name('add');
    //     Route::get('/{slug}', 'ProductController@edit')->name('show');
    //     Route::post('/remove/{slug}', 'ProductController@remove')->name('remove');
    //     Route::post('/clear', 'ProductController@clear')->name('clear');
    //     Route::post('/update/{slug}', 'ProductController@update')->name('update');
    // });

    // Route::group([
    //     'as'=>'categories.',
    //     'prefix'=>'/categories'
    // ], function () {
    //     // Route::get('/', 'CategoryController@index')->name('index');
    //     // Route::post('/add', 'ProductController@add')->name('add');
    //     // Route::post('/search', 'ProductController@search')->name('search');
    //     // Route::get('/{slug}', 'ProductController@edit')->name('show');
    //     // Route::post('/remove/{slug}', 'ProductController@remove')->name('remove');
    //     // Route::post('/clear', 'ProductController@clear')->name('clear');
    //     // Route::post('/update/{slug}', 'ProductController@update')->name('update');
    // });

    // Route::group([
    //     'as'=>'customers.',
    //     'prefix'=>'/customers'
    // ], function () {
    //     Route::get('/', 'ProductController@index')->name('index');
    //     Route::post('/add', 'ProductController@add')->name('add');
    //     Route::post('/search', 'ProductController@search')->name('search');
    //     Route::get('/{slug}', 'ProductController@edit')->name('show');
    //     Route::post('/remove/{slug}', 'ProductController@remove')->name('remove');
    //     Route::post('/clear', 'ProductController@clear')->name('clear');
    //     Route::post('/update/{slug}', 'ProductController@update')->name('update');
    // });

    // Route::group([
    //     'as'=>'orders.',
    //     'prefix'=>'/orders'
    // ], function () {
    //     Route::get('/', 'ProductController@index')->name('index');
    //     Route::post('/add', 'ProductController@add')->name('add');
    //     Route::post('/search', 'ProductController@search')->name('search');
    //     Route::get('/{slug}', 'ProductController@edit')->name('show');
    //     Route::post('/remove/{slug}', 'ProductController@remove')->name('remove');
    //     Route::post('/clear', 'ProductController@clear')->name('clear');
    //     Route::post('/update/{slug}', 'ProductController@update')->name('update');
    // });

    // Route::group([
    //     'as'=>'consultants.',
    //     'prefix'=>'/consultants'
    // ], function () {
    //     Route::get('/', 'ProductController@index')->name('index');
    //     Route::post('/add', 'ProductController@add')->name('add');
    //     Route::post('/search', 'ProductController@search')->name('search');
    //     Route::get('/{slug}', 'ProductController@edit')->name('show');
    //     Route::post('/remove/{slug}', 'ProductController@remove')->name('remove');
    //     Route::post('/clear', 'ProductController@clear')->name('clear');
    //     Route::post('/update/{slug}', 'ProductController@update')->name('update');
    // });

    // Route::group([
    //     'as'=>'bookings.',
    //     'prefix'=>'/bookings'
    // ], function () {
    //     Route::get('/', 'ProductController@index')->name('index');
    //     Route::post('/add', 'ProductController@add')->name('add');
    //     Route::post('/search', 'ProductController@search')->name('search');
    //     Route::get('/{slug}', 'ProductController@edit')->name('show');
    //     Route::post('/remove/{slug}', 'ProductController@remove')->name('remove');
    //     Route::post('/clear', 'ProductController@clear')->name('clear');
    //     Route::post('/update/{slug}', 'ProductController@update')->name('update');
    // });

    // Route::group([
    //     'as'=>'services.',
    //     'prefix'=>'/services'
    // ], function () {
    //     Route::get('/', 'ProductController@index')->name('index');
    //     Route::post('/add', 'ProductController@add')->name('add');
    //     Route::post('/search', 'ProductController@search')->name('search');
    //     Route::get('/{slug}', 'ProductController@edit')->name('show');
    //     Route::post('/remove/{slug}', 'ProductController@remove')->name('remove');
    //     Route::post('/clear', 'ProductController@clear')->name('clear');
    //     Route::post('/update/{slug}', 'ProductController@update')->name('update');
    // });

    // Route::group([
    //     'as'=>'users.',
    //     'prefix'=>'/users'
    // ], function () {
    //     Route::get('/', 'ProductController@index')->name('index');
    //     Route::post('/add', 'ProductController@add')->name('add');
    //     Route::post('/search', 'ProductController@search')->name('search');
    //     Route::get('/{slug}', 'ProductController@edit')->name('show');
    //     Route::post('/remove/{slug}', 'ProductController@remove')->name('remove');
    //     Route::post('/clear', 'ProductController@clear')->name('clear');
    //     Route::post('/update/{slug}', 'ProductController@update')->name('update');
    // });
});

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
