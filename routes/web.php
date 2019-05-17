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


Route::get('/', 'Index@index');
Route::get('/sendmail', 'ContactController@sendmail');
Route::get('/rolunk', 'Rolunk@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('admin/timelinepost', 'Admin\TimelineController@poststore');
Route::get('admin', 'Admin\AdminController@index');
Route::get('admin/timelinepost/create/{id}', 'Admin\TimelineController@postcreate');
Route::get('admin/gallery/photo/create/{id}', 'Admin\GalleryController@photocreate');
Route::get('admin/newscategory/news/create/{id}', 'Admin\NewsController@newscreate');
Route::post('admin/newscategory/news', 'Admin\NewsController@newsstore');
Route::post('admin/gallery/photo', 'Admin\GalleryController@photostore');
Route::post('admin/news', 'Admin\NewsController@newsstore');
Route::delete('admin/gallery/photo/{id}', 'Admin\GalleryController@photodelete');
Route::get('admin/timeline/post/{id}/edit', 'Admin\TimelineController@postedit');
Route::get('admin/news/{id}/edit', 'Admin\NewsController@newsedit');
Route::patch('admin/timelinepost/{id}', 'Admin\TimelineController@updatepost');
Route::patch('admin/news/{id}', 'Admin\NewsController@updatenews');
Route::delete('admin/timelinepost/{id}', 'Admin\TimelineController@postdelete');
Route::delete('admin/news/{id}', 'Admin\NewsController@newsdelete');
///

Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/newscat', 'Admin\NewsController');
Route::resource('admin/timeline', 'Admin\TimelineController');
Route::resource('admin/menu', 'Admin\MenuController');
Route::resource('admin/gallery', 'Admin\GalleryController');
Route::resource('admin/slider', 'Admin\SliderController');
Route::resource('admin/pages', 'Admin\PagesController');
Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);
Route::resource('admin/settings', 'Admin\SettingsController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
