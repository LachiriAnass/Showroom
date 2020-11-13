<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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
    if(Auth::check()){
        return redirect('/explore');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/gallery/{gallery_id}', 'GalleryController@show');
Route::get('/galleries', 'GalleryController@index')->middleware('auth');
Route::get('/create_gallery', 'GalleryController@newGallery')->middleware('auth');
Route::post('/create_gallery', 'GalleryController@store')->middleware('auth');
Route::post('/delete_gallery/{gallery_id}', 'GalleryController@destroy')->middleware('auth');


Route::get('/painting/{painting_id}', 'PaintingController@show');
Route::post('/create_painting', 'PaintingController@store')->middleware('auth');
Route::post('/delete_painting/{painting_id}', 'PaintingController@destroy')->middleware('auth');
Route::post('/sold_painting/{painting_id}', 'PaintingController@modify')->middleware('auth');


Route::get('/checkout/{id}', 'CheckoutController@show')->middleware('auth');
Route::post('/order','OrderController@create')->middleware('auth');
Route::get('/orders', 'OrderController@index')->middleware('auth');


route::get('/admin','AdminController@index')->middleware('auth');
route::get('/admin/galleries','AdminController@galleriesIndex')->middleware('auth');
route::get('/admin/paintings','AdminController@paintingsIndex')->middleware('auth');
route::get('/admin/orders','AdminController@ordersIndex')->middleware('auth');
route::get('/admin/users','AdminController@usersIndex')->middleware('auth');

route::post('/delete/painting/{id}', 'AdminController@destroyPainting')->middleware('auth');
route::post('/delete/gallery/{id}', 'AdminController@destroyGallery')->middleware('auth');

route::post('/permission/user/{id}', 'AdminController@permissionUser')->middleware('auth');
route::post('/delete/user/{id}', 'AdminController@destroyUser')->middleware('auth');

route::get('/admin/order/{id}', 'AdminController@orderIndex')->middleware('auth');
route::post('/delete/order/{id}', 'AdminController@orderDeliver')->middleware('auth');


Route::get('/profile/{user_id}', 'ProfileController@show');
Route::get('/modify_profile/{user_id}', 'ProfileController@modifyProfile');
Route::post('/modify_profile/{user_id}', 'ProfileController@update')->middleware('auth');

Route::get('/search', 'SearchController@index');

Route::get('/explore', 'ExploreController@index');

Route::post('/galleryupvote/{user_id}/{gallery_id}', 'GalleryVoteController@manageUpvote')->middleware('auth');
Route::post('/gallerydownvote/{user_id}/{gallery_id}', 'GalleryVoteController@manageDownvote')->middleware('auth');

Route::post('/paintingupvote/{user_id}/{painting_id}', 'PaintingVoteController@manageUpvote')->middleware('auth');
Route::post('/paintingdownvote/{user_id}/{painting_id}', 'PaintingVoteController@manageDownvote')->middleware('auth');

Route::post('/profileupvote/{user_id}/{profile_id}', 'ProfileVoteController@manageUpvote')->middleware('auth');
Route::post('/profiledownvote/{user_id}/{profile_id}', 'ProfileVoteController@manageDownvote')->middleware('auth');


