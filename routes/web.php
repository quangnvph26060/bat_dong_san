<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Email\EmailRequestController;
use App\Http\Controllers\Session\SessionConfigController;
use App\Http\Controllers\ConfigEmail\ConfigEmailController;
use App\Http\Controllers\Information\ConfigurationInformationController;

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








Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'authenticate']);
    });

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(ConfigurationInformationController::class)->group(function () {
            Route::get('config', 'index')->name('setting.config.info');
            Route::post('config', 'save')->name('setting.config.store');
        });

        Route::controller(SessionConfigController::class)->group(function () {
            Route::get('session', 'session')->name('setting.config.session');
            Route::post('session', 'save')->name('setting.config.session.save');
            Route::post('session/delete', 'destroy')->name('setting.config.session.delete');
            Route::get('session/edit', 'edit')->name('setting.config.session.edit');
            Route::post('session/edit', 'update')->name('setting.config.session.update');
        });

        Route::controller(NewsController::class)->group(function () {
            Route::get('news', 'index')->name('news.index');
            Route::get('news/create', 'create')->name('news.create');
            Route::post('news/create', 'store')->name('news.store');
            Route::get('news/{id}/edit', 'edit')->name('news.edit');
            Route::post('news/{id}/edit', 'update')->name('news.update');
            Route::delete('news/{news}/destroy', 'destroy')->name('news.destroy');
        });

        Route::controller(ConfigEmailController::class)->group(function () {
            Route::get('config/email', 'edit')->name('setting.config.email');
            Route::post('config/email', 'update')->name('setting.config.email.update');
        });

        Route::controller(EmailRequestController::class)->group(function () {
            Route::get('email-request', 'index')->name('email.index');
            Route::get('email-request/{id}/change-status', 'changeStatus')->name('email.change.status');
        });
    });
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('tin-tuc', 'news')->name('news');
    Route::get('{slug}', 'newsDetail')->name('newsDetail');
    Route::post('subscribe', 'subscribe')->name('subscribe');
});
