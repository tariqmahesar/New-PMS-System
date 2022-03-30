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
    return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => ['auth','admin']], function(){
    // Route::get('/admin', function(){
    //     return view('admin.dashboard');
    // });

Route::get('/admin', 'App\Http\Controllers\admin\AdminController@index');
Route::get('dashboard', 'DashboardController@initContent');


// All users
Route::get('admin/users', 'App\Http\Controllers\admin\AdminController@users')->name('users');
Route::get('user/add-user', 'App\Http\Controllers\admin\AdminController@showUserForm');
Route::post('create-user','App\Http\Controllers\admin\AdminController@createUser')->name('create.user');
Route::get('admin/user/edit/{id}', 'App\Http\Controllers\admin\AdminController@edit_user')->name('user.edit');
Route::get('admin/user/delete/{id}', 'App\Http\Controllers\admin\AdminController@destroy')->name('user.delete');
Route::post('admin/user/update/{id}', 'App\Http\Controllers\admin\AdminController@update_user')->name('user.update');


    // Category section routes
Route::get('admin/category','App\Http\Controllers\CategoryController@index');
Route::get('admin/add-category','App\Http\Controllers\CategoryController@show');
Route::post("create-category","App\Http\Controllers\CategoryController@create")->name('create.category');
Route::get('category/edit/{id}',['as'=>'category.edit', 'uses'=>'App\Http\Controllers\CategoryController@edit']);
Route::post('category-update/{id}' , ['as' => 'category.update' , 'uses' => 'App\Http\Controllers\CategoryController@update']);
Route::get('category/delete/{id}' , ['as' => 'category.delete' , 'uses' => 'App\Http\Controllers\CategoryController@destroy']);

// Design Section Routes
Route::get('admin/design','App\Http\Controllers\DesignController@index');
Route::get('admin/add-design','App\Http\Controllers\DesignController@show');


Route::post('get/sections', 'App\Http\Controllers\DesignController@getSections')->name('get.sections');
Route::post("save-design","App\Http\Controllers\CategoryController@add_design")->name('save.design');
Route::get('design/edit/{id}',['as'=>'design.edit', 'uses'=>'App\Http\Controllers\DesignController@edit']);
Route::post('design-update/{id}' , ['as' => 'design.update' , 'uses' => 'App\Http\Controllers\DesignController@update']);
Route::post('section/update/{id}' , ['as' => 'section.update' , 'uses' => 'App\Http\Controllers\DesignController@sectionupdate']);
Route::get('design/delete/{id}' , ['as' => 'design.delete' , 'uses' => 'App\Http\Controllers\DesignController@destroy']);
Route::get('design/upload','App\Http\Controllers\DesignController@upload_design')->name('design.upload');
Route::get('design/upload/{id}','App\Http\Controllers\DesignController@upload_design')->name('design.upload');
Route::get('design/view/{id}','App\Http\Controllers\DesignController@view_design')->name('design.view');



// Approved Design Routes
Route::post('update/designstatus', 'App\Http\Controllers\ApprovedDesignController@create')->name('update.designstatus');
Route::post('unapproved/designstatus', 'App\Http\Controllers\ApprovedDesignController@update')->name('unapproved.designstatus');

// Notification routes
Route::get('show/notifications/{id}',['as'=>'show.notifications', 'uses'=>'App\Http\Controllers\NotificationController@index']);
Route::get('show/managernotifications/{id}',['as'=>'show.managernotifications', 'uses'=>'App\Http\Controllers\NotificationController@managernotification']);
Route::get('admin/logs','App\Http\Controllers\NotificationController@show');



});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

