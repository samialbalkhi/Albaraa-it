<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\dashpord\BrandController;
use App\Http\Controllers\dashpord\LoginController;
use App\Http\Controllers\dashpord\ProfileConroller;
use App\Http\Controllers\dashpord\ProductController;
use App\Http\Controllers\dashpord\SectionController;
use App\Http\Controllers\Declarativesite\HomeController;

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


Route::middleware(['auth:admin'])->group(function () {

    //////////          Product       ///////////////////////// 

    Route::controller(ProductController::class)->group(function () {
        Route::get('/view_product', "view_product")->name('view_product');
        Route::post('create_product', "create_product")->name('create_product');
        Route::get('/edit_product/{id}', "edit_product")->name('edit_product');
        Route::post('/update_product/{id}', "update_product")->name('update_product');
        Route::get('/delete_product/{id}', "delete_product")->name('delete_product');   
    });



    ////////////////////    Brands               /////////////////////

 Route::controller(BrandController::class)->group(function(){
    Route::get('/view_brandes',  "view_brandes")->name('add_brandes');
    Route::post('/create_brand',  "create_brand")->name('create_brand');
    Route::get('/edit_brand/{id}',  "edit_brand")->name('edit_brand');
    Route::post('/update_brand/{id}', "update_brand")->name('update_brand');
    Route::get('/delete_brand/{id}',  "delete_brand")->name('delete_brand');
    });

    


    /////////     section           //////////////
    Route::controller(SectionController::class)->group(function(){
        Route::get('/view_section',  "view_section")->name('view_section');
        Route::post('/createsection', "createsection")->name('create_section');
        Route::get('/edit_section/{id}', "edit_section")->name('edit_section');
        Route::post('/update_section/{id}', "update")->name('update_section');
        Route::get('/delete_section/{id}',  "delete_section")->name('delete_section');
    });


      /////////////////////  About Us                 ///////////////////////////
      Route::controller(ProfileConroller::class)->group(function(){
        Route::get('/about_us', "view_data")->name('about_us');
        Route::post('create_profile', "create_profile")->name('create_profile');
        Route::get('/edit_profile/{id}', "edit_profile")->name('edit_profile');
        Route::post('/update_profile/{id}', "update_profile")->name('update_profile');
        Route::get('/delete_profile/{id}', "delete_profile")->name('delete_profile');
        Route::get('/get_profile', "get_profile")->name('get_profile');
        
    });
    
});

///////////////////////////   login  admin            ////////////////////////
    Route::controller(LoginController::class)->group(function(){
        Route::get('/login_admin', "login_admin")->name('login');
        Route::post('chek_login',  "chek_login")->name('chek_login');
    });


  

    /////////////////   home page         ///////////////////////////

        Route::controller(HomeController::class)->group(function(){
            Route::get('/home', "view_home")->name('home');
            Route::get('/product',"view_product")->name('view_product');
            Route::post('/section_brand','section_brand')->name('section_brand');
            Route::get('/About_Us','About_Us')->name('About_Us');
            Route::get('/brand_products','brand_products')->name('brand_products');
            Route::get('/information_products','information_products')->name('information_products');
        });
