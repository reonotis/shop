<?php

use App\Http\Controllers\Shop\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Shop\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Shop\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Shop\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Shop\Auth\NewPasswordController;
use App\Http\Controllers\Shop\Auth\PasswordResetLinkController;
use App\Http\Controllers\Shop\Auth\VerifyEmailController;
use App\Http\Controllers\Shop\{MyPageController, ProductController, ShopController, ShopSelectController, SettingController, StaffController};
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

Route::get('/', function () {
    return view('shop.welcome');
});

// ログイン後のトップページ
Route::get('/myPage', [MyPageController::class, 'index'])->middleware('auth:shops')->name('myPage');


Route::middleware('auth:shops')->group(function(){
    Route::get('/shop/list', [ShopController::class, 'list'])->name('shop.list');
    Route::get('/shopSelect', [ShopSelectController::class, 'index'])->name('shopSelect');
    Route::get('/selecting/{shop}', [ShopSelectController::class, 'selecting'])->name('selecting');
    Route::get('/deselect', [ShopSelectController::class, 'deselect'])->name('deselect');

});
Route::resource('shop', ShopController::class)->middleware('auth:shops');

// 商品関連
Route::middleware('auth:shops')->group(function(){
    Route::get('/product/list', [ProductController::class, 'list'])->name('product.list');
});
Route::resource('product', ProductController::class)->middleware('auth:shops');


// スタッフ関連
Route::middleware('auth:shops')->group(function(){
    Route::get('/staff/list', [ProductController::class, 'list'])->name('staff.list');
});
Route::resource('staff', StaffController::class)->middleware('auth:shops');




// 各種設定
Route::middleware('auth:shops')->group(function(){
    Route::get('/setting/name', [SettingController::class, 'name'])->name('setting.name');
    Route::post('/setting/nameSet', [SettingController::class, 'nameSet'])->name('setting.nameSet');
});

// Auth周り
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});
Route::middleware('auth:shops')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

