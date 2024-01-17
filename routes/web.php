<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

use App\Http\Controllers\StripePaymentController;

use App\Http\Controllers\AdminController;



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

// Admin Routes

Route::get('/admin',[AdminController::class,'index']);

Route::get('/adminProducts',[AdminController::class,'products']);

Route::get('/adminProfile',[AdminController::class,'profile']);

Route::get('/ourCustomers',[AdminController::class,'customers']);

Route::get('/ourOrders',[AdminController::class,'orders']);

Route::get('/changeOrderStatus/{status}/{id}',[AdminController::class,'changeOrderStatus']);

Route::get('/changeUserStatus/{status}/{id}',[AdminController::class,'changeUserStatus']);

Route::get('/deleteProduct/{id}',[AdminController::class,'deleteProduct']);

Route::POST('/AddNewProduct',[AdminController::class,'AddNewProduct']);

Route::POST('/UpdateProduct',[AdminController::class,'UpdateProduct']);




// Customer Routes
Route::get('/',[MainController::class,'index'])->name('/');

Route::get('/cart',[MainController::class,'cart']);

Route::get('/shop',[MainController::class,'shop'])->name("shop-page");

Route::get('/single/{id}',[MainController::class,'singleProduct']);

Route::get('/checkout',[MainController::class,'checkout']);

Route::get('/register',[MainController::class,'register']);

Route::get('/logout',[MainController::class,'logout']);

Route::get('/login',[MainController::class,'login']);

Route::get('/checkout',[MainController::class,'checkout']);

Route::get('/profile',[MainController::class,'profile']);

Route::get('/myOrders',[MainController::class,'myOrders']);

Route::get('/deleteCartItem/{id}',[MainController::class,'deleteCartItem']);

Route::post('/registerUser',[MainController::class,'registerUser']);

Route::post('/loginUser',[MainController::class,'loginUser']);

Route::post('/addToCart',[MainController::class,'addToCart']);

Route::post('/updateCart',[MainController::class,'updateCart']);

Route::post('/updateUser',[MainController::class,'updateUser'])->name('updateUser');

Route::get('/testMail',[MainController::class,'testMail']);

// socialite login url
Route::get('/googleLogin',[MainController::class,'googleLogin']);

Route::get('/auth/google/callback',[MainController::class,'googleHandle']);

Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});





