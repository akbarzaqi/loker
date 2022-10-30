<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalariesController;
use App\Http\Controllers\SettingsController;

use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Employer\JobController as EmployerJobController;
use App\Http\Controllers\Employer\CompanyController as EmployerCompanyController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'CheckRole:admin'
    ],
    function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('companies', CompanyController::class);
        Route::resource('industry', IndustryController::class);
        Route::resource('province', ProvinceController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('users', UserController::class);
        Route::resource('jobs', JobController::class);
    }
);

Route::group(
    [
        'prefix' => 'employer',
        'middleware' => 'CheckRole:employer'
    ],
    function () {
        Route::get('/', [App\Http\Controllers\Employer\DashboardController::class, 'index'])->name('employer-dashboard');
        Route::resource('company', EmployerCompanyController::class);
        Route::resource('job', EmployerJobController::class);
    }
);






































Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
Route::get('/salaries', [SalariesController::class, 'index'])->name('salaries');
Route::get('/jobs', [JobsController::class, 'index'])->name('jobs');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/update-profile', [ProfileController::class, 'update'])->name('update-profile');

Route::get('/settings', [SettingsController::class, 'update'])->name('account-settings');
Route::get('/privacy', [SettingsController::class, 'index'])->name('privasi-settings');

Route::get('/jobs-company', [CompanyController::class, 'index'])->name('company');
Route::get('/jobs-company/add-jobs', [CompanyController::class, 'create'])->name('add-jobs');

Route::get('/compare', [CompareController::class, 'index'])->name('compare');

Auth::routes();