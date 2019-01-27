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
//front_end
Route::get('/','front_end@home');
Route::get('/login','front_end@login_user');
Route::get('/register','front_end@register_user');
Route::post('/storeuser','front_end@store_user');
Route::post('/checkuser','front_end@check_user');
Route::get('/logout','front_end@logout');
Route::get('/newrecipies','front_end@new_recipies');
Route::get('/cuisines','front_end@cuisines');
Route::post('/storemessage','front_end@store_message');
Route::post('/orderitem/{item_id}','front_end@order_item');
Route::get('/itemdetails/{item_id}','front_end@item_details');
Route::get('/order/{item_id}','front_end@order');
Route::get('/category/{category_name}','front_end@category_items');


//back_end
Route::get('/admin','back_end@login');
Route::post('/admin/checkadmin','back_end@check_admin');
Route::get('/admin/logout','back_end@logout');
Route::get('/admin/home','back_end@home');
Route::get('/admin/categories','back_end@categories');
Route::post('/admin/addcategory','back_end@add_category');
Route::get('/admin/users','back_end@users');
Route::get('/admin/reviews','back_end@reviews');
Route::get('/admin/additem','back_end@add_item');
Route::post('/admin/storeitem','back_end@store_item');
Route::get('/admin/allitems','back_end@all_items');
Route::get('/admin/deleteitem/{item_id}','back_end@delete_item');
Route::get('/admin/edititem/{item_id}','back_end@edit_item');
Route::post('/admin/updateitem/{item_id}','back_end@update_item');
Route::get('/admin/publisheditems','back_end@published_items');
Route::get('/admin/addsupply/{item_id}','back_end@add_supply');
Route::post('/admin/updatesupply/{item_id}','back_end@update_supply');
Route::get('/admin/changetype/{item_id}','back_end@change_type');
Route::get('/admin/draftitems','back_end@draft_items');
Route::get('/admin/allorders','back_end@all_orders');
Route::get('/admin/servedorders','back_end@served_orders');
Route::get('/admin/unservedorders','back_end@unserved_orders');
Route::get('/admin/serveitem/{item_id}','back_end@serve_item');
Route::get('/admin/addadmin','back_end@add_admin');
Route::post('/admin/storeadmin','back_end@store_admin');
Route::get('/admin/alladmins','back_end@all_admins');
Route::get('/admin/{category}','back_end@category_items');
Route::get('/admin/delete/{category}','back_end@delete_category');
