<?php

use Illuminate\Auth\Events\Login;
use App\Http\Livewire\ListDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\dashpord\BrandController;
use App\Http\Controllers\dashpord\LoginController;
use App\Http\Controllers\dashpord\BanersController;
use App\Http\Controllers\dashpord\DetailsController;
use App\Http\Controllers\dashpord\ProfileConroller;
use App\Http\Controllers\dashpord\ProductController;
use App\Http\Controllers\dashpord\SectionController;
use App\Http\Controllers\Declarativesite\HomeController;
use App\Models\Detail;

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
// Route::get('/', function () {
//     return view('Declarativesite.home');
// });

Route::middleware(['auth:admin'])->group(function () {
    //////////          Product       /////////////////////////

    Route::controller(DetailsController::class)->group(function () {
        Route::get('/edit', 'edit_detail')->name('edit_detail');
        Route::post('/update-details/{id}', 'update_detail');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/view_product', 'view_product')->name('product');
        Route::post('create_product', 'create_product')->name('create_product');
        Route::get('/edit_product/{id}', 'edit_product')->name('edit_product');
        Route::post('/update_product/{id}', 'update_product')->name('update_product');
        Route::get('/delete_product/{id}', 'delete_product')->name('delete_product');
    });

    ////////////////////    Brands               /////////////////////

    Route::controller(BrandController::class)->group(function () {
        Route::get('/view_brandes', 'view_brandes')->name('add_brandes');
        Route::post('/create_brand', 'create_brand')->name('create_brand');
        Route::get('/edit_brand/{id}', 'edit_brand')->name('edit_brand');
        Route::post('/update_brand/{id}', 'update_brand')->name('update_brand');
        Route::get('/delete_brand/{id}', 'delete_brand')->name('delete_brand');
    });

    /////////     section           //////////////
    Route::controller(SectionController::class)->group(function () {
        Route::get('/view_section', 'view_section')->name('view_section');
        Route::post('/createsection', 'createsection')->name('create_section');
        Route::get('/edit_section/{id}', 'edit_section')->name('edit_section');
        Route::post('/update_section/{id}', 'update')->name('update_section');
        Route::get('/delete_section/{id}', 'delete_section')->name('delete_section');
    });

    /////////////////////  About Us                 ///////////////////////////
    Route::controller(ProfileConroller::class)->group(function () {
        Route::get('/about_us', 'view_data')->name('about_us');
        Route::post('create_profile', 'create_profile')->name('create_profile');
        Route::get('/edit_profile/{id}', 'edit_profile')->name('edit_profile');
        Route::post('/update_profile/{id}', 'update_profile')->name('update_profile');
        Route::get('/delete_profile/{id}', 'delete_profile')->name('delete_profile');
        Route::get('/get_profile', 'get_profile')->name('get_profile');
    });
    Route::controller(BanersController::class)->group(function () {
        Route::get('/view_bnars', 'view_bnars')->name('view_bnars');
        Route::post('/create_bnars', 'create_bnars')->name('create_bnars');
        Route::get('/edit_bnars/{id}', 'edit_bnars')->name('edit_bnars');
        Route::post('/update_bnars/{id}', 'update_bnars')->name('update_bnars');
        Route::get('/delete_bnars/{id}', 'delete_bnars')->name('delete_bnars');
    });
});

///////////////////////////   login  admin            ////////////////////////
Route::controller(LoginController::class)->group(function () {
    Route::get('/login_admin', 'login_admin')->name('login');
    Route::post('chek_login', 'chek_login')->name('chek_login');
});

/////////////////   home page       ///////////////////////////
Route::middleware(['auth:web'])->group(function () {
Route::controller(HomeController::class)->group(function () {
    Route::get('/home_sa', 'view_home')->name('home');
    Route::get('/product', 'view_product')->name('view_product');
    Route::get('/section_brand', 'section_brand')->name('section_brand');
    Route::get('/About_Us', 'About_Us')->name('About_Us');
    Route::get('/brand_products', 'brand_products')->name('brand_products');
    Route::get('/get_section', 'get_section')->name('get_section');
    Route::get('/get_prodcatId', 'get_prodcatId')->name('get_prodcatId');
    Route::get('/information_products/{id}', 'information_products')->name('information_products');
    Route::get('/To_contact_us', 'To_contact_us')->name('To_contact_us');
    Route::get('/search','search')->name('search');
    Route::get('/get_products', 'get_products');
});
});
Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
