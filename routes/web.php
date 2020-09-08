<?php

use App\Http\Controllers\UserController;
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



Route::get('/register', 'UserController@userRegistration');

Route::get('/login', 'UserController@userLogin');

Route::post("user-register", "UserController@saveRegistration");

Route::get('/login',"UserController@userLogin");

Route::post('/user-login','UserController@loginValidate');

Route::get("/dashboard", "UserController@dashboard");

Route::get("/logout", "UserController@logout");



Route::get('/add-offer','OfferController@addNewOffer');

Route::post('/save-offer', 'OfferController@publishOffer');

Route::get('/view-offer', 'OfferController@getOffer');

Route::get('/admin-login', 'AdminController@adminLogin');

Route::get("admin-logout", "AdminController@logout");

Route::post('/admin-login-validate','AdminController@loginAdmin');

Route::get('/view-admin-offer','AdminController@viewAdminOffer');

Route::get("admin-dashboard", "AdminController@adminDasboard");

Route::get('/change-staus/{id}','AdminController@changeStatus');

Route::get('/offer-action/{offer_id}/{status}', 'AdminController@offerAction');


