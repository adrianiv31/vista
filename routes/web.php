<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');



Route::group(['middleware' => 'admin'], function(){

    Route::resource('admin/users','AdminUsersController', ['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit',
        'destroy'=>'admin.users.destroy',

    ]]);

    Route::resource('admin/producers','AdminProducersController', ['names'=>[

        'index'=>'admin.producers.index',
        'create'=>'admin.producers.create',
        'store'=>'admin.producers.store',
        'edit'=>'admin.producers.edit',
        'destroy'=>'admin.producers.destroy',

    ]]);

    Route::resource('admin/categories','AdminCategoriesController', ['names'=>[

        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit',
        'destroy'=>'admin.categories.destroy',

    ]]);

    Route::resource('admin/products','AdminProductsController', ['names'=>[

        'index'=>'admin.products.index',
        'create'=>'admin.products.create',
        'store'=>'admin.products.store',
        'edit'=>'admin.products.edit',
        'destroy'=>'admin.products.destroy',

    ]]);

    Route::resource('admin/productdocuments','AdminProductDocumentsController', ['names'=>[

        'index'=>'admin.productdocuments.index',
        'create'=>'admin.productdocuments.create',
        'store'=>'admin.productdocuments.store',
        'edit'=>'admin.productdocuments.edit',
        'destroy'=>'admin.productdocuments.destroy',

    ]]);

    Route::resource('admin/suppliers','AdminSuppliersController', ['names'=>[

        'index'=>'admin.suppliers.index',
        'create'=>'admin.suppliers.create',
        'store'=>'admin.suppliers.store',
        'edit'=>'admin.suppliers.edit',
        'destroy'=>'admin.suppliers.destroy',

    ]]);

    Route::resource('admin/clients','AdminClientsController', ['names'=>[

        'index'=>'admin.clients.index',
        'create'=>'admin.clients.create',
        'store'=>'admin.clients.store',
        'edit'=>'admin.clients.edit',
        'destroy'=>'admin.clients.destroy',

    ]]);

    //Ajax
    Route::get('/cautaUsers','AjaxController@cautaUsers');
    Route::get('/cautaProducers','AjaxController@cautaProducers');
    Route::get('/cautaCategories','AjaxController@cautaCategories');
    Route::get('/cautaProducts','AjaxController@cautaProducts');
    Route::get('/cautaSupplier','AjaxController@cautaSupplier');
    Route::get('/cautaClient','AjaxController@cautaClient');
    Route::post('/addSupplierDoc','AjaxController@addSupplierDoc');
    Route::post('/updSupplierDoc','AjaxController@updSupplierDoc');
    Route::get('/delSupplierDoc','AjaxController@delSupplierDoc');

    Route::post('/addClientDoc','AjaxController@addClientDoc');
    Route::post('/updClientDoc','AjaxController@updClientDoc');
    Route::get('/delClientDoc','AjaxController@delClientDoc');

});

Route::group(['middleware' => 'operator'], function(){



});