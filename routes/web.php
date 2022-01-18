<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrationController; 
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FoodController;  
use App\Http\Controllers\ProfileController;  
use App\Http\Controllers\UserController; 
use App\Http\Controllers\PlaceController;   
use App\Http\Controllers\AdminController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\FrontEndcontroller;
use App\Http\Controllers\OrderController;

Auth::routes();
Route::get('cart', [cartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [cartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [cartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [cartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [cartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('fontendfood', [FrontEndcontroller::class,'food'])->name('food.home');
Route::get('fontendplace', [FrontEndcontroller::class,'place'])->name('place.home');
Route::get('searches', [FrontEndcontroller::class,'search'])->name('search');
Route::get('/', [FrontEndcontroller::class,'home'])->name('home.main');
//Route::get('/layouts', [FrontEndcontroller::class,'layout'])->name('layout');
Route::post('/order', [OrderController::class,'store'])->name('store.order');
Route::get('/orderdetails', [OrderController::class,'orderdetail'])->name('orderdetail');


Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::resource('category', CategoryController::class);
    Route::resource('adminactions', AdminController::class); 
    Route::get('messageshoew', [AdminController::class,'messageshow'])->name('messageshow'); 
    Route::get('userapprove/{id}', [UserController::class,'userApprove'])->name('userapprove.edit'); 
    Route::put('userapprove/{id}', [UserController::class,'update'])->name('userapprove.update'); 
}); 

Route::group(['middleware' => ['auth', 'user']], function () {
    Route::resource('foods', FoodController::class);
    Route::resource('places', PlaceController::class);
    Route::resource('users', UserController::class); 
    // Route::get('profile/{id}', [FoodController::class,'edit'])->name('edit');
    Route::get('profile/{id}', [UserController::class,'edit'])->name('edit');
    Route::put('profile/{id}', [UserController::class,'update'])->name('userprofile.Update');

}); 

Route::get('dashboard', [ProfileController::class,'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//usereditprofile
Route::get('/messgepages', [App\Http\Controllers\HomeController::class, 'messagepage'])->name('messagepage');
Route::post('/messages', [App\Http\Controllers\HomeController::class, 'message'])->name('sendmessage');

//Route::get('dashboard', [ProfileController::class,'update'])->name('profile.update');
//Route::resource('profiles',ProfileController::class);
//Route::resource('registrations', RegistrationController::class);
//Route::get('testlogin', [LoginController::class,'showAdminLoginForm']);
//Route::post('testlogin', [LoginController::class,'adminLogin'])->name('loginroute');

//Route::put('profiles/{id}', [ProfileController::class,'update'])->name('profile.photo.update');
  
//Route::get('register', [UserController::class,'district']);
 
// Route::get('userapprove/{id}', [UserController::class,'userApprove'])->name('order.edit'); 
// Route::put('userapprove/{id}', [UserController::class,'update'])->name('userapprove.update');  

