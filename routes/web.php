<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\dashpord\BrandController;
use App\Http\Controllers\dashpord\LoginController;
use App\Http\Controllers\dashpord\ProductController;
use App\Http\Controllers\dashpord\SectionController;
use Illuminate\Auth\Events\Login;

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
//////////          Product       ///////////////////////// 
Route::get('/view_product',[ProductController::class,"view_product"])->name('view_product')->middleware('auth:admin');
Route::post('create_product',[ProductController::class,"create_product"])->name('create_product');
Route::get('/edit_product/{id}',[ProductController::class,"edit_product"])->name('edit_product');
Route::post('/update_product/{id}',[ProductController::class,"update_product"])->name('update_product');

////////////////////    Brands               /////////////////////

Route::get('/view_brandes',[BrandController::class,"view_brandes"])->name('add_brandes');
Route::post('/create_brand',[BrandController::class,"create_brand"])->name('create_brand');
Route::get('/edit_brand/{id}',[BrandController::class,"edit_brand"])->name('edit_brand');
Route::post('/update_brand/{id}',[BrandController::class,"update_brand"])->name('update_brand');
Route::get('/delete_brand/{id}',[BrandController::class,"delete_brand"])->name('delete_brand');


/////////     section           //////////////

Route::get('/view_section',[SectionController::class,"view_section"])->name('view_section');
Route::post('/createsection',[SectionController::class,"createsection"])->name('create_section');
Route::get('/edit_section/{id}',[SectionController::class,"edit_section"])->name('edit_section');
Route::post('/update_section/{id}',[SectionController::class,"update"])->name('update_section');
Route::get('/delete_section/{id}',[SectionController::class,"delete_section"])->name('delete_section');



///////////////////////////   login  admin            ////////////////////////

Route::get('/login_admin',[LoginController::class,"login_admin"]);




Route::get('/regester',[LoginController::class,"regester"]);