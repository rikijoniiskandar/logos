<?php

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\AboutUs\AboutUsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeaturedProduct\FeaturedProductController;
use App\Http\Controllers\Hero\HeroController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Portofolio\PortofolioController;
use App\Http\Controllers\Services\ServiceController;
use App\Http\Controllers\Team\TeamController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('services', [ServiceController::class, 'index'])->name('services');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    /** Route dashboard */
    Route::get('dashboard', [DashboardController::class, 'index']);

    /** route hero */
    Route::prefix('clients')->name('client.')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');
        Route::get('create', [ClientController::class, 'create'])->name('create');
        Route::post('/', [ClientController::class, 'store'])->name('store');
        Route::delete('{id}', [ClientController::class, 'destroy'])->name('destroy');
    });

    /** route featured-products */
    Route::prefix('featured-products')->name('featured-products.')->group(function () {
        Route::get('/', [FeaturedProductController::class, 'index'])->name('index');
        Route::get('create', [FeaturedProductController::class, 'create'])->name('create');
        Route::post('/', [FeaturedProductController::class, 'store'])->name('store');
        Route::get('/add-content/{id}', [FeaturedProductController::class, 'editContent'])->name('editContent');
        Route::get('/edit/{id}', [FeaturedProductController::class, 'edit'])->name('edit');
        Route::put('/edit-content/{id}', [FeaturedProductController::class, 'updateContent'])->name('updateContent');
        Route::post('{id}/add-content', [FeaturedProductController::class, 'addContent'])->name('addContent');
        Route::patch('update-status/{id}', [FeaturedProductController::class, 'updateStatus'])->name('update-status');
        Route::delete('{id}', [FeaturedProductController::class, 'destroy'])->name('destroy');
    });

    /** route about */
    Route::prefix('abouts')->name('abouts.')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('index');
        Route::get('create', [AboutController::class, 'create'])->name('create');
        Route::post('/', [AboutController::class, 'store'])->name('store');
        Route::get('{id}', [AboutController::class, 'edit'])->name('edit');
        Route::put('{id}', [AboutController::class, 'update'])->name('update');
        Route::patch('update-status/{id}', [AboutController::class, 'updateStatus'])->name('update-status');
        Route::delete('{id}', [AboutController::class, 'destroy'])->name('destroy');
    });

    /** route portofolios */
    Route::prefix('portofolios')->name('portofolios.')->group(function () {
        Route::get('/', [PortofolioController::class, 'index'])->name('index');
        Route::get('create', [PortofolioController::class, 'create'])->name('create');
        Route::post('/', [PortofolioController::class, 'store'])->name('store');
        Route::get('{id}', [PortofolioController::class, 'edit'])->name('edit');
        Route::put('{id}', [PortofolioController::class, 'update'])->name('update');
        Route::patch('update-status/{id}', [PortofolioController::class, 'updateStatus'])->name('update-status');
        Route::delete('{id}', [PortofolioController::class, 'destroy'])->name('destroy');
    });

    /** route teams */
    Route::prefix('teams')->name('teams.')->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('index');
        Route::get('create', [TeamController::class, 'create'])->name('create');
        Route::post('/', [TeamController::class, 'store'])->name('store');
        Route::get('{id}', [TeamController::class, 'edit'])->name('edit');
        Route::put('{id}', [TeamController::class, 'update'])->name('update');
        Route::patch('update-status/{id}', [TeamController::class, 'updateStatus'])->name('update-status');
        Route::delete('{id}', [TeamController::class, 'destroy'])->name('destroy');
    });
});
