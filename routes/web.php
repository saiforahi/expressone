<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

//To clear all cache
Route::get('clear', function () {
    Artisan::call('optimize:clear');
    return "Cleared!";
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/verify', [AuthController::class, 'verify'])->name('verify-user');
Route::post('/verify', [AuthController::class, 'verify_code'])->name('verify-user-code');
Route::post('/verification.resend', [AuthController::class, 'send_verification_code'])->name('verification.resend');

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::get('/team', [HomeController::class,'team'])->name('team');
Route::get('/mission', [HomeController::class,'mission'])->name('mission');
Route::get('/vision', [HomeController::class,'vision'])->name('vision');
Route::get('/promise', 'HomeController@promise')->name('promise');
Route::get('/history', 'HomeController@history')->name('history');
Route::get('/tracking', 'HomeController@tracking')->name('tracking');
Route::get('/track-shipment', 'HomeController@track_order')->name('track-shipment');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', 'HomeController@save_contact')->name('save-contact');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/blog-info/{blog}', 'HomeController@show_blog')->name('show-blog');
Route::get('/blog-category/{blog_category}', 'HomeController@category_post')->name('category-post');
Route::get('/blog-search', 'HomeController@seach_blog')->name('search-post');
// ajax call
Route::get('/check-rate', 'HomeController@rateCheck')->name('rate.check');
Route::get('/pricing', 'HomeController@pricing')->name('pricing');

/*
|--------------------------------------------------------------------------
| Admin Route
|--------------------------------------------------------------------------
*/
require_once __DIR__.'/web_routes/admin.php';

/*
|--------------------------------------------------------------------------
| Merchant Route
|--------------------------------------------------------------------------
*/
require_once __DIR__.'/web_routes/merchant.php';
/*
|--------------------------------------------------------------------------
| courier Route
|--------------------------------------------------------------------------
*/
require_once __DIR__.'/web_routes/courier.php';

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});
