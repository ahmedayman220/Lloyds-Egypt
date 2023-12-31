<?php

use App\Http\Controllers\AddTrainingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceItemController;
use App\Http\Controllers\SupplierCategoryController;
use App\Http\Controllers\SupplierItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MissionController;
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

// if rout is not exist
//Route::fallback(function() {
//    return back();
//});



// Login Group
Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});




Route::middleware('auth')->prefix('admin')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class,'index'])->name('dashboard');

    // Admin Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Banners

    Route::controller(BannerController::class)
        ->prefix('banner')->name('banner.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::put('' , 'update')->name('update');
        });


    // Admin Setting
    Route::controller(SettingController::class)
        ->prefix('setting')->name('setting.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::put('' , 'update')->name('update');
        });

    // Admin About Us
    Route::controller(AboutController::class)
        ->prefix('about')->name('about.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::put('' , 'update')->name('update');
        });

    // Admin About Us
    Route::controller(MissionController::class)
        ->prefix('mission')->name('mission.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::put('' , 'update')->name('update');
        });

    // Admin Services Category
    Route::controller(ServiceCategoryController::class)
        ->prefix('service-category')->name('service_category.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::post('' , 'store')->name('store');
            Route::put('' , 'update')->name('update');
            Route::delete('' , 'destroy')->name('destroy');
        });

    // Admin Services Item
    Route::controller(ServiceItemController::class)
        ->prefix('service-item')->name('service_item.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::post('' , 'store')->name('store');
            Route::put('' , 'update')->name('update');
            Route::delete('' , 'destroy')->name('destroy');
        });

    // Admin Supplier Category
    Route::controller(SupplierCategoryController::class)
        ->prefix('supplier-category')->name('supplier_category.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::post('' , 'store')->name('store');
            Route::put('' , 'update')->name('update');
            Route::delete('' , 'destroy')->name('destroy');
        });

    // Admin Supplier Item
    Route::controller(SupplierItemController::class)
        ->prefix('supplier-item')->name('supplier_item.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::post('' , 'store')->name('store');
            Route::put('' , 'update')->name('update');
            Route::delete('' , 'destroy')->name('destroy');
        });

    // Admin Companies
    Route::controller(CompaniesController::class)
        ->prefix('companies')->name('companies.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::post('' , 'store')->name('store');
            Route::put('' , 'update')->name('update');
            Route::delete('' , 'destroy')->name('destroy');
        });

    // Admin instructors
    Route::controller(InstructorsController::class)
        ->prefix('instructors')->name('instructors.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::post('' , 'store')->name('store');
            Route::put('' , 'update')->name('update');
            Route::delete('' , 'destroy')->name('destroy');
        });

    // Admin courses
    Route::controller(CoursesController::class)
        ->prefix('courses')->name('courses.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::post('' , 'store')->name('store');
            Route::put('' , 'update')->name('update');
            Route::delete('' , 'destroy')->name('destroy');
        });

    // Admin Qr Code
    Route::controller(QrCodeController::class)
        ->prefix('QrCode')->name('QrCode.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::post('' , 'store')->name('store');
            Route::delete('' , 'destroy')->name('destroy');
        });


    // Admin Add Trainig
    Route::controller(AddTrainingController::class)
        ->prefix('add-training')->name('addTraining.')->group(function() {
            Route::get('' , 'index')->name('index');
            Route::post('' , 'store')->name('store');
        });



    // logout
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

});




//  User
Route::get('/', function () {
    return view('welcome');
});
