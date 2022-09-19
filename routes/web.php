<?php

use App\Http\Controllers\APIController;
//use App\Http\Controllers\Auth\RegisterCustomerController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\RegisterCustomerController;
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

//Route::get('{any}', function () {
//    return view('welcome');
//})->where("any", ".*");
//Route::post('/auth', [\App\Http\Controllers\CustomerLoginController::class, 'login']);


//Route::post("/api/orders", [APIController::class, 'createOrder'])->middleware("auth:customer");
//Route::get("/api/orders", [APIController::class, 'getCustomerOrders'])->middleware("auth:customer");
//Route::get("/api/cart/products", [APIController::class, 'getCartProducts'])->middleware("auth:customer");
//Route::get('/{any}', [Controller::class, 'showApplication'])->where("any", "(?!nova)(.*)");
//Route::get("/api/products", [APIController::class, 'getProducts']);

Route::post('/login', [CustomerLoginController::class, 'login']);
Route::post('/register', [RegisterCustomerController::class, 'register']);
Route::post('/api/orders', [APIController::class, 'createOrder']);
Route::get("/api/orders", [APIController::class, 'getCustomerOrders']);
Route::get("/api/cart/products", [APIController::class, 'getCartProducts']);
Route::get('/api/product', [APIController::class, 'getProduct']);

Route::get('/zain-cash/{order}/completed', [Controller::class, 'showApplication'])->where("any", "(?!nova)(.*)");

Route::get('/{any}', [Controller::class, 'showApplication'])->where("any", "(?!nova)(.*)");

//->middleware("auth:customer")
//    ->middleware("auth:customer")
//    ->middleware("auth:customer")
