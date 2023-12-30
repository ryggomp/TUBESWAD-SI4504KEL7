<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EducationController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/aboutus', [UserController::class, 'aboutus'])->name('aboutus');
    Route::post('/feedback', [UserController::class, 'feedback'])->name('feedback');
    Route::middleware(['role:user'])->name('user.')->group(function (){
        Route::get('/dashboard-impact', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/recycle-from-home', [UserController::class, 'recycleFromHome'])->name('recycleFromHome');
        Route::post('/recycle-from-home', [UserController::class, 'recycleFromHomeStore'])->name('recycleFromHomeStore');
        Route::get('/nearest-recycle', [UserController::class, 'nearestRecycle'])->name('nearestRecycle');
        Route::post('/nearest-recycle', [UserController::class, 'nearestRecycleStore'])->name('nearestRecycleStore');

        Route::get('/reward', [UserController::class, 'store'])->name('store');
        Route::post('/reward/buy', [UserController::class, 'storeBuy'])->name('storeBuy');
        Route::get('/myorder', [UserController::class, 'myorder'])->name('myorder');
        

        Route::get('/education', [EducationController::class, 'index'])->name('education.index');
        Route::get('/education/memilah-sampah', [EducationController::class, 'education1'])->name('education.education1');
        Route::get('/education/advancements-in-plastic-recycling-technology', [EducationController::class, 'education2'])->name('education.education2');
        Route::get('/education/fda-approval-of-recycling-processes-for-food-contact-packaging', [EducationController::class, 'education3'])->name('education.education3');
        Route::get('/education/innovations-at-coperionrecycling-innovation-center', [EducationController::class, 'education4'])->name('education.education4');
        Route::get('/education/cutting-edge-research-in-chemical-recycling', [EducationController::class, 'education5'])->name('education.education5');
        Route::get('/education/global-trends-and-policies-in-recycling', [EducationController::class, 'education6'])->name('education.education6');
    });

    Route::middleware(['role:vendor'])->name('vendor.')->group(function (){
        Route::get('/daftar-pengirim-sampah', [VendorController::class, 'index'])->name('daftarPengirimSampah');
        Route::post('/approval/pengiriman/{id}', [VendorController::class, 'approval'])->name('approvalPengiriman');
    });
    
    Route::middleware(['role:admin'])->name('admin.')->group(function (){
        Route::get('/list-vendor', [AdminController::class, 'listVendor'])->name('listVendor');
        Route::get('/list-recycle', [AdminController::class, 'listRecycle'])->name('listRecycle');
        Route::get('/all-order', [AdminController::class, 'allOrder'])->name('allOrder');
        Route::get('/feedback', [AdminController::class, 'feedback'])->name('feedback');
    });
});

require __DIR__.'/auth.php';
