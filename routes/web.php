<?php

use App\Http\Controllers\Admin\AllUsersController;
use App\Http\Controllers\Admin\ManageRentalsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\ManageVisitorsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/all-rentals', [ManageRentalsController::class, 'allrentals'])->name('allrentals');
Route::get('/add-rental', [ManageRentalsController::class, 'createrental'])->name('createrental');
Route::post('/store-rental', [ManageRentalsController::class, 'storerental'])->name('storerental');

Route::get('/all-visitors', [ManageVisitorsController::class, 'allvisitors'])->name('allvisitors');
Route::get('/create-visitors', [ManageVisitorsController::class, 'createvisitor'])->name('createvisitor');
Route::get('/create-driving-visitors', [ManageVisitorsController::class, 'createdrivingvisitor'])->name('createdrivingvisitor');
Route::get('/all-driving-visitors', [ManageVisitorsController::class, 'alldrivingvisitors'])->name('alldrivingvisitors');
Route::post('/store-visitor', [ManageVisitorsController::class, 'storevisitor'])->name('storevisitor');
Route::post('/store-driving-visitor', [ManageVisitorsController::class, 'storevisitor'])->name('storedrivingvisitor');

Route::get('/all-services', [ServicesController::class, 'allservices'])->name('allservices');
Route::get('/create-service', [ServicesController::class, 'createservice'])->name('addservice');
Route::post('/store-service', [ServicesController::class, 'storeservice'])->name('storeservice');

Route::get('/all-watchmen', [AllUsersController::class, 'watchmen'])->name('watchmen');
Route::get('/create-watchmen', [AllUsersController::class, 'createwatchmen'])->name('createwatchmen');
Route::post('/store-watchmen', [AllUsersController::class, 'storewatchmen'])->name('storewatchmen');

Route::get('/all-owners', [AllUsersController::class, 'allowners'])->name('allowners');
Route::get('/create-owner', [AllUsersController::class, 'createnewowner'])->name('createnewowner');
Route::post('/store-owner', [AllUsersController::class, 'storebusinessowner'])->name('storebusinessowner');


Route::get('/my-profile', [AllUsersController::class, 'profile'])->name('profile');
Route::post('/my-profile', [AllUsersController::class, 'updatepassword'])->name('updatepassword');


