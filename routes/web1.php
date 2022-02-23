<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/dashboard', function () {
    return view('/admin/dashboard');
});

Route::get('/admin/store/categorylist', function () {
    return view('/admin/store/categorylist');
});

Route::get('/admin/store/addcategory', function () {
    return view('/admin/store/addcategory');
});

Route::get('/admin/store/storelist', function () {
    return view('/admin/store/storelist');
});

Route::get('/admin/store/addstore', function () {
    return view('/admin/store/addstore');
});

Route::get('/admin/store/productlist', function () {
    return view('/admin/store/productlist');
});

Route::get('/admin/store/addproduct', function () {
    return view('/admin/store/addproduct');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group([
    'middleware' => [ 'auth:sanctum' ]
], function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group([
        'prefix' => 'admin',
    ], function(){

        Route::resource('salebill', 'SaleBillController');
        Route::resource('maintenance', 'MaintenanceBillController');
        Route::get('ajax_search_barcode/{id}', 'SaleBillController@ajax_search_barcode');
        Route::get('printsalebill/{id}', 'SaleBillController@print_bill')->name('printsalebill');
        Route::get('ajax_search_bill/{id}', 'MaintenanceBillController@ajax_search_bill');
        
        Route::get('printmaintenancebill/{id}', 'MaintenanceBillController@print_bill')->name('printmaintenancebill');

        Route::group([
            'middleware' => 'admin',
        ], function(){
            Route::get('/dashboard', function () {
                return view('/admin/dashboard');
            })->name('dashboard');

            /*Route::get('/admin/store/addsupplier', function () {
                return view('/admin/store/addsupplier');
            });*/

            Route::resource('category', 'CategoryController');
            Route::resource('store', 'StoreController');
            Route::resource('product', 'ProductController');
            Route::resource('supplier', 'SupplierController');
            Route::resource('employee', 'EmployeeController');
            Route::resource('brand', 'BrandController');
            Route::resource('purchasebill', 'PurchaseBillController');
           // Route::resource('maintenance', 'MaintenanceBillController');
            
            

    		Route::get('printbarcode/{id}', 'ProductController@print_barcode')->name('printbarcode');
    		Route::get('printbarcodelist/', 'ProductController@print_barcode_list')->name('printbarcodelist');
            Route::get('ajax_search_barcode_purchase/{id}', 'PurchaseBillController@ajax_search_barcode');
            Route::get('printpurchasebill/{id}', 'PurchaseBillController@print_bill')->name('printpurchasebill');


           

        });
    });
});
    
