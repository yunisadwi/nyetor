<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\Frontend\HomepageController::class, 'index'])->name('homepage');
Route::get('daftar-motor', [\App\Http\Controllers\Frontend\MotorController::class, 'index'])->name('motor.index');
Route::get('daftar-motor/{motor}', [\App\Http\Controllers\Frontend\MotorController::class, 'show'])->name('motor.show');
Route::post('daftar-motor', [\App\Http\Controllers\Frontend\MotorController::class, 'store'])->name('motor.store');
Route::get('blog', [\App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{blog:slug}', [\App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blog.show');
Route::get('tentang-kami', [\App\Http\Controllers\Frontend\AboutController::class, 'index']);
Route::get('kontak', [\App\Http\Controllers\Frontend\ContactController::class, 'index']);
Route::post('kontak', [\App\Http\Controllers\Frontend\ContactController::class, 'store'])->name('contact.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'is_admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::resource('motors', \App\Http\Controllers\Admin\MotorController::class);
    Route::resource('types', \App\Http\Controllers\Admin\TypeController::class);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class);
    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class)->only(['index', 'store', 'update']);
    Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class)->only(['index', 'destroy']);
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class)->only(['index', 'destroy']);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
});
