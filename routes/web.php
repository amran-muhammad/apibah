<?php

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

Route::get('/', function () {
    return view('welcome');
});
//user
Route::post('/app/addUser','UserController@addUser');
Route::get('/app/showUser','UserController@showUser');
Route::get('/app/showSingleUser/{id}','UserController@showSingleUser');
Route::post('/app/updateUser/{id}','UserController@updateUser');
Route::post('/app/deleteUser/{id}','UserController@deleteUser');

//product
Route::post('/app/addProduct','ProductController@addProduct');
Route::get('/app/showProduct','ProductController@showProduct');
Route::get('/app/showSingleProduct/{id}','ProductController@showSingleProduct');
Route::post('/app/updateProduct/{id}','ProductController@updateProduct');
Route::post('/app/deleteProduct/{id}','ProductController@deleteProduct');

//cart
Route::post('/app/addCart','CartController@addCart');
Route::get('/app/showCart','CartController@showCart');
Route::get('/app/showSingleCart/{id}','CartController@showSingleCart');
Route::post('/app/updateCart/{id}','CartController@updateCart');
Route::post('/app/deleteCart/{id}','CartController@deleteCart');

//Order details
Route::post('/app/addOrder','OrderController@addOrder');
Route::get('/app/showOrder','OrderController@showOrder');
Route::get('/app/showSingleOrder/{id}','OrderController@showSingleOrder');
Route::post('/app/updateOrder/{id}','OrderController@updateOrder');
Route::post('/app/deleteOrder/{id}','OrderController@deleteOrder');

//Reservation

Route::post('/app/addReservation','ReservationController@addReservation');
Route::get('/app/showReservation','ReservationController@showReservation');
Route::get('/app/showSingleReservation/{id}','ReservationController@showSingleReservation');
Route::post('/app/updateReservation/{id}','ReservationController@updateReservation');
Route::post('/app/deleteReservation/{id}','ReservationController@deleteReservation');

//status
Route::post('/app/addStatus','StatusController@addStatus');
Route::get('/app/showStatus','StatusController@showStatus');
Route::get('/app/showSingleStatus/{id}','StatusController@showSingleStatus');
Route::post('/app/updateStatus/{id}','StatusController@updateStatus');
Route::post('/app/deleteStatus/{id}','StatusController@deleteStatus');

//voucher
Route::post('/app/addVoucher','VoucherController@addVoucher');
Route::get('/app/showVoucher','VoucherController@showVoucher');
Route::get('/app/showSingleVoucher/{id}','VoucherController@showVoucher');
Route::post('/app/updateVoucher/{id}','VoucherController@updateVoucher');
Route::post('/app/deleteVoucher/{id}','VoucherController@deleteVoucher');

//shipping table
Route::post('/app/addShipping','ShippingController@addShipping');
Route::get('/app/showShipping','ShippingController@showShipping');
Route::get('/app/showSingleShipping/{id}','ShippingController@showSingleShipping');
Route::post('/app/updateShipping/{id}','ShippingController@updateShipping');
Route::post('/app/deleteShipping/{id}','ShippingController@deleteShipping');

//shipping table
Route::post('/app/addOrderDetail','OrderDetailController@addOrderDetail');
Route::get('/app/showOrderDetail','OrderDetailController@showOrderDetail');
Route::get('/app/showOrderDetail/{id}','OrderDetailController@showOrderDetail');
Route::post('/app/updateOrderDetail/{id}','OrderDetailController@updateOrderDetail');
Route::post('/app/deleteOrderDetail/{id}','OrderDetailController@deleteOrderDetail');

//wishlist
Route::post('/app/addWishlist','WishlistController@addWishlist');
Route::get('/app/showWishlist','WishlistController@showWishlist');
Route::get('/app/showSingleWishlist/{id}','WishlistController@showSingleWishlist');
Route::post('/app/updateWishlist/{id}','WishlistController@updateWishlist');
Route::post('/app/deleteWishlist/{id}','WishlistController@deleteWishlist');

//category
Route::post('/app/addCategory','CategoryController@addCategory');
Route::get('/app/showCategory','CategoryController@showCategory');
Route::get('/app/showSingleCategory/{id}','CategoryController@showSingleCategory');
Route::post('/app/updateCategory/{id}','CategoryController@updateCategory');
Route::post('/app/deleteCategory/{id}','CategoryController@deleteCategory');

//subcategory
Route::post('/app/addSubCategory','SubCategoryController@addSubCategory');
Route::get('/app/showSubCategory','SubCategoryController@showSubCategory');
Route::get('/app/showSingleSubCategory/{id}','SubCategoryController@showSingleSubCategory');
Route::post('/app/updateSubCategory/{id}','SubCategoryController@updateSubCategory');
Route::post('/app/deleteSubCategory/{id}','SubCategoryController@deleteSubCategory');

//review
Route::post('/app/addReview','ReviewController@addReview');
Route::get('/app/showReview','ReviewController@showReview');
Route::get('/app/showSingleReview/{id}','ReviewController@showSingleReview');
Route::post('/app/updateReview/{id}','ReviewController@updateReview');
Route::post('/app/deleteReview/{id}','ReviewController@deleteReview');