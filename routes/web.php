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
Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);
// Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    $path = LaravelLocalization::getLocalizedURL($locale, back()->getTargetUrl());
    return redirect($path);
})->name('locale');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {

    Route::get(
        '/',
        function () {
            
        }
    )->name('cv.index');

    Route::get('/cookies', function ()
    {
        
    })->name('cookies');

    Route::get('/', 'App\Http\Controllers\CvController@index')->name('cv.index');

    Route::get('/cookies', 'App\Http\Controllers\CookieController@index')->name('cookies.index');
    Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact.index');
    Route::post( '/contact', 'App\Http\Controllers\ContactController@store')->name('contact.store');

    Route::resource('article', 'App\Http\Controllers\ArticleController');
    Route::resource('service', 'App\Http\Controllers\ServiceController')->except(['show']);

    Route::get('/weather', 'App\Http\Controllers\WeatherController@show')->name('weather.show');

    Route::get('/barcode/code128', 'App\Http\Controllers\BarcodeController@code128')->name('barcode.code128.index');
    Route::post('/barcode/code128', 'App\Http\Controllers\BarcodeController@code128_show')->name('barcode.code128.show');

    Route::get('/search','App\Http\Controllers\SearchController@index')->name('search');
});