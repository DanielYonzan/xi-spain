<?php

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
Auth::routes();

//other routes
Route::get('/', 'FrontController@index')->name('front.index');
Route::get('/changeLanguage/{lang}', 'FrontController@changeLanguage')->name('changeLanguage');
Route::get('/event-checkout/{id}', 'FrontController@eventCheckout')->name('event.checkout');
Route::post('/saveCheckout', 'FrontController@saveCheckout');
Route::post('/contact_me', 'FrontController@contact_me')->name('contact_me');
Route::post('/getCatalogue', 'FrontController@getCatalogue');
Route::post('/getAgent', 'FrontController@getAgent');

//admin routes
Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::resource('/product','ProductController');
    Route::post('/filterProducts', 'ProductController@filterProducts');
    Route::group(['middleware' => ['App\Http\Middleware\Adminmiddleware']], function () {
        Route::resource('/adminAccount', 'AdminAccountController');
        Route::resource('/agent', 'AgentController');
        Route::resource('/feature', 'FeatureController');
        Route::resource('/category', 'CategoryController');
        Route::resource('/brochure', 'BrochureController');
        Route::resource('/event', 'EventController');
        Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
        Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
        Route::delete('/checkout/{id}', 'CheckoutController@delete')->name('checkout.destroy');
        Route::get('/code/{id}/edit', 'CodeController@edit')->name('code.edit');
        Route::put('/code/{id}', 'CodeController@update')->name('code.update');
    });
    Route::get('/', 'AdminDashboardController@index')->name('admin.dashboard');

});

