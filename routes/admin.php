<?php
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin;

Route::group([
    'namespace' => App\Http\Controllers\Admin::class,
    'middleware'=>['auth', 'permission:view dashboard'],
    'as'=>'admin.',
    'prefix'=>'/admin'
], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('customers', CustomerController::class);
    // Route::resource('testimonials', )
    Route::group([
        'namespace' => Store::class,
        'as' => 'store.',
        'prefix' => '/store',
        'middleware' => ['permission:view store']
    ], function (){
        Route::resource('/products', ProductController::class);
        // Route::resource('/categories', CategoryController::class);
        Route::resource('/orders', OrderController::class);
        Route::post('/products/gallery/delete/{product}', 'ProductController@deleteGalleryImage')->name('products.gallery.delete');
        Route::post('/products/gallery/add/{product}', 'ProductController@addGalleryImage')->name('products.gallery.add');
    });

    Route::group([
        'namespace' => Access::class,
        'as' => 'access.',
        'prefix' => '/access',
        'middleware' => ['permission:control access']
    ], function (){
        Route::resource('/users', UserController::class);
        Route::post('/users/roles/add', 'UserController@addRole')->name('users.roles.add');
        Route::delete('/users/{user}/roles/{role}', 'UserController@removeRole')->name('users.roles.remove');
        // Route::delete('/users/delete', 'UserController@destroy')->name('users.destroy');
        Route::resource('/roles', RoleController::class);
        Route::resource('/permissions', PermissionController::class);
    });

    Route::group([
        'namespace' => Blog::class,
        'as' => 'blog.',
        'prefix' => '/blog',
        // 'middleware' => ['permission:control access']
    ], function (){
        Route::resource('/posts', PostController::class);
    });

    Route::group([
        'namespace' => Consultation::class,
        'as' => 'consultation.',
        'prefix' => '/consultation',
        // 'middleware' => ['permission:control access']
    ], function (){
        Route::resource('/specialisations', SpecialisationController::class);
        Route::resource('/bookings', BookingController::class);
        Route::resource('/consultants', ConsultantController::class);
    });
});
