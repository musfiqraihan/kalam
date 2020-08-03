<?php

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

Route::get('/', function () {
    return view('welcome');
});
//admin panel users category=========================
Route::get('superadmin/add/users/addcategory','superadmin\SuperAdminController@addcatgory')->name('AddCategoryAdmin');
Route::post('superadmin/add/users/storecategory','superadmin\SuperAdminController@storecatgory');
Route::get('superadmin/add/users/categories','superadmin\SuperAdminController@viewcategory')->name('viewcategory');
Route::get('superadmin/add/users/editcategory/{id}','superadmin\SuperAdminController@editcategory');
Route::post('superadmin/add/users/updatecategory/{id}','superadmin\SuperAdminController@updatecategory');
Route::get('superadmin/add/users/deletecategory/{id}','superadmin\SuperAdminController@deletecategory');

//admin panel users registration=========================
Route::get('superadmin/users/registration','superadmin\SuperAdminController@adduser')->name('SuperAdminRegister');
Route::post('superadmin/users/registration/process','superadmin\SuperAdminController@processuser');
Route::get('superadmin/users/registration/users','superadmin\SuperAdminController@viewusers')->name('SuperAdminUsers');
Route::get('superadmin/users/registration/editusers/{id}','superadmin\SuperAdminController@editusers');
Route::post('superadmin/users/registration/updateusers/{id}','superadmin\SuperAdminController@updateusers');
Route::get('superadmin/users/registration/deleteusers/{id}','superadmin\SuperAdminController@deleteusers');


//login and registration form=====================
//register===================
Route::get('/user/registration', 'LoginRegistration\UserController@userRegistration')->name('userRegistration');
Route::post('/user/registration', 'LoginRegistration\UserController@processRegister');
//login===================
Route::get('/user/login', 'LoginRegistration\UserController@userLogin')->name('userloginpage');
Route::post('/user/login', 'LoginRegistration\UserController@processLogin');
//dashboard===========================
Route::get('/user/profile', 'LoginRegistration\UserController@showProfile')->name('profile');
Route::get('/logout', 'LoginRegistration\UserController@logout');
