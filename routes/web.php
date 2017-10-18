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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin-access'], 'as'=>'admin'], function() {

    //Dashboard
    Route::get('/', 'Admin\DashboardController@index')->name('.dashboard');

    //Penyerahan Anak
    Route::group(['prefix' => 'penyerahananak', 'as'=>'.penyerahananak'], function() {
        Route::get('/', 'Admin\PenyerahanAnakController@index')->name('.manage');
        Route::get('/detail/{id}', 'Admin\PenyerahanAnakController@show')->name('.show');
        Route::post('/terima', 'Admin\PenyerahanAnakController@terima')->name('.terima');
        Route::post('/tolak', 'Admin\PenyerahanAnakController@tolak')->name('.tolak');
    });

    //Baptisan
    Route::group(['prefix' => 'baptisan', 'as'=>'.baptisan'], function() {
        Route::get('/', 'Admin\BaptisanController@index')->name('.manage');
        Route::get('/detail/{id}', 'Admin\BaptisanController@show')->name('.show');
        Route::post('/terima', 'Admin\BaptisanController@terima')->name('.terima');
        Route::post('/tolak', 'Admin\BaptisanController@tolak')->name('.tolak');
    });

    //Pemberkatan Nikah
    Route::group(['prefix' => 'pemberkatannikah', 'as'=>'.pemberkatannikah'], function() {
        Route::get('/', 'Admin\PemberkatanNikahController@index')->name('.manage');
        Route::get('/detail/{id}', 'Admin\PemberkatanNikahController@show')->name('.show');
        Route::post('/terima', 'Admin\PemberkatanNikahController@terima')->name('.terima');
        Route::post('/tolak', 'Admin\PemberkatanNikahController@tolak')->name('.tolak');
    });

    //Users
    Route::group(['prefix' => 'users', 'as'=>'.users'], function() {
        //Admin
        Route::group(['prefix' => 'admin', 'as'=>'.admin'], function() {
            Route::get('/', 'Admin\UsersController@admin')->name('.manage');
            Route::get('/create', 'Admin\UsersController@create_admin')->name('.create');
            Route::post('/create', 'Admin\UsersController@store_admin')->name('.store');
            Route::get('/edit/{id}', 'Admin\UsersController@edit_admin')->name('.edit');
            Route::post('/edit/{id}', 'Admin\UsersController@update_admin')->name('.update');
            Route::get('/detail/{id}', 'Admin\UsersController@show_admin')->name('.show');
        });

        //Member
        Route::group(['prefix' => 'member', 'as'=>'.member'], function() {
            Route::get('/', 'Admin\UsersController@member')->name('.manage');
            Route::get('/create', 'Admin\UsersController@create_member')->name('.create');
            Route::post('/create', 'Admin\UsersController@store_member')->name('.store');
            Route::get('/edit/{id}', 'Admin\UsersController@edit_member')->name('.edit');
            Route::post('/edit/{id}', 'Admin\UsersController@update_member')->name('.update');
            Route::get('/detail/{id}', 'Admin\UsersController@show_member')->name('.show');
        });
    });

    //Profile
    Route::group(['prefix' => 'profile', 'as'=>'.profile'], function() {
        Route::get('/', 'Admin\ProfileController@index')->name('.manage');
        Route::post('/', 'Admin\ProfileController@update')->name('.update');
    });

    //Laporan
    Route::group(['prefix' => 'laporan', 'as'=>'.laporan'], function() {
        Route::get('/', 'Admin\LaporanController@index')->name('.index');
        Route::post('/', 'Admin\LaporanController@result')->name('.result');
    });

});




//Member
Route::group(['prefix' => 'member', 'middleware' => ['auth','role:member-access'], 'as'=>'member'], function() {

    //Dashboard
    Route::get('/', 'Member\DashboardController@index')->name('.dashboard');

    //Penyerahan Anak
    Route::group(['prefix' => 'penyerahananak', 'as'=>'.penyerahananak'], function() {
        Route::get('/', 'Member\PenyerahanAnakController@index')->name('.manage');
        Route::get('/create', 'Member\PenyerahanAnakController@create')->name('.create');
        Route::post('/create', 'Member\PenyerahanAnakController@store')->name('.store');
        Route::get('/edit/{id}', 'Member\PenyerahanAnakController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Member\PenyerahanAnakController@update')->name('.update');
        Route::get('/detail/{id}', 'Member\PenyerahanAnakController@show')->name('.show');
    });

    //Baptisan
    Route::group(['prefix' => 'baptisan', 'as'=>'.baptisan'], function() {
        Route::get('/', 'Member\BaptisanController@index')->name('.manage');
        Route::get('/create', 'Member\BaptisanController@create')->name('.create');
        Route::post('/create', 'Member\BaptisanController@store')->name('.store');
        Route::get('/edit/{id}', 'Member\BaptisanController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Member\BaptisanController@update')->name('.update');
        Route::get('/detail/{id}', 'Member\BaptisanController@show')->name('.show');
    });

    //Pemberkatan Nikah
    Route::group(['prefix' => 'pemberkatannikah', 'as'=>'.pemberkatannikah'], function() {
        Route::get('/', 'Member\PemberkatanNikahController@index')->name('.manage');
        Route::get('/create', 'Member\PemberkatanNikahController@create')->name('.create');
        Route::post('/create', 'Member\PemberkatanNikahController@store')->name('.store');
        Route::get('/edit/{id}', 'Member\PemberkatanNikahController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Member\PemberkatanNikahController@update')->name('.update');
        Route::get('/detail/{id}', 'Member\PemberkatanNikahController@show')->name('.show');
    });

    //Profile
    Route::group(['prefix' => 'profile', 'as'=>'.profile'], function() {
        Route::get('/', 'Member\ProfileController@index')->name('.manage');
        Route::post('/', 'Member\ProfileController@update')->name('.update');
    });

});


Route::get('sendemail', function () {

    $data = array(
        'name' => "Bedebah",
    );

    Mail::send('email.test', $data, function ($message) {

        $message->from(env('MAIL_USERNAME'), 'Rock GBI');

        $message->to('wijaya.imd@gmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});