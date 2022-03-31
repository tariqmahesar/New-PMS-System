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


const ADMIN_CONTROLLER = \App\Http\Controllers\admin\AdminController::class;
const CATEGORY_CONTROLLER = \App\Http\Controllers\CategoryController::class;
const DESIGN_CONTROLLER = \App\Http\Controllers\DesignController::class;
const MESSAGES_CONTROLLER = \App\Http\Controllers\MessagesController::class;



Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => ['auth','admin']], function(){
    // Route::get('/admin', function(){
    //     return view('admin.dashboard');
    // });
Route::get('dashboard', 'DashboardController@initContent');
Route::get('/admin', [ADMIN_CONTROLLER,'index']);


// All users
Route::get('admin/users', [ADMIN_CONTROLLER,'users'])->name('users');
Route::get('user/add-user', [ADMIN_CONTROLLER,'showUserForm']);
Route::post('create-user', [ADMIN_CONTROLLER,'createUser'])->name('create.user');
Route::get('admin/user/edit/{id}', [ADMIN_CONTROLLER,'edit_user'])->name('user.edit');
Route::get('admin/user/delete/{id}', [ADMIN_CONTROLLER,'destroy'])->name('user.delete');
Route::post('admin/user/update/{id}', [ADMIN_CONTROLLER,'update_user'])->name('user.update');

// Category section routes
Route::get('admin/category',[CATEGORY_CONTROLLER,'index']);
Route::get('admin/add-category',[CATEGORY_CONTROLLER,'show']);
Route::post("create-category",[CATEGORY_CONTROLLER,'create'])->name('create.category');
Route::get('category/edit/{id}',[CATEGORY_CONTROLLER,'edit'])->name('category.edit');
Route::post('category-update/{id}',[CATEGORY_CONTROLLER,'update'])->name('category.update');
Route::get('category/delete/{id}' , [CATEGORY_CONTROLLER,'destroy'])->name('category.delete');

// Design Section Routes
Route::get('admin/design',[DESIGN_CONTROLLER,'index']);
Route::get('admin/add-design',[DESIGN_CONTROLLER,'show']);
Route::post('get/sections',[DESIGN_CONTROLLER,'getSections'])->name('get.sections');
Route::post("save-design",[CATEGORY_CONTROLLER,'add_design'])->name('save.design');
Route::get('design/edit/{id}',[DESIGN_CONTROLLER,'edit'])->name('design.edit');
Route::post('design-update/{id}',[DESIGN_CONTROLLER,'update'])->name('design.update');
Route::post('section/update/{id}' , [DESIGN_CONTROLLER,'sectionupdate'])->name('section.update');
Route::get('design/delete/{id}', [DESIGN_CONTROLLER,'destroy'])->name('design.delete');
Route::get('design/upload',[DESIGN_CONTROLLER,'upload_design'])->name('design.upload');
Route::get('design/upload/{id}',[DESIGN_CONTROLLER,'upload_design'])->name('design.upload');
Route::get('design/view/{id}',[DESIGN_CONTROLLER,'view_design'])->name('design.view');



// Approved Design Routes
Route::post('update/designstatus', 'App\Http\Controllers\ApprovedDesignController@create')->name('update.designstatus');
Route::post('unapproved/designstatus', 'App\Http\Controllers\ApprovedDesignController@update')->name('unapproved.designstatus');

// Notification routes
Route::get('show/notifications/{id}',['as'=>'show.notifications', 'uses'=>'App\Http\Controllers\NotificationController@index']);
Route::get('show/managernotifications/{id}',['as'=>'show.managernotifications', 'uses'=>'App\Http\Controllers\NotificationController@managernotification']);
Route::get('admin/logs','App\Http\Controllers\NotificationController@show');

// Messages Routes
Route::get('admin/inbox', [MESSAGES_CONTROLLER,'index'])->name('inbox');
Route::get('admin/view-message', [MESSAGES_CONTROLLER,'show'])->name('view.message');
Route::get('admin/compose-message', [MESSAGES_CONTROLLER,'composeMessage'])->name('compose.message');



});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

