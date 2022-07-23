<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {



    //these routes are defined in Admin::routes
    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UserController::class);
     $router->resource('categories', CategoryController::class);
     $router->resource('plans', PlanController::class);
     $router->resource('products', ProductController::class);


});
