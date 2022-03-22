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

Route::group(['middleware' => ['auth', 'web']], function() {
Route::get('/', 'HomeController@index')->name('index');
Route::get('/update/status/{value}/{id}', 'LeadController@updateStatus')->name('update.status');

Route::post('/advance/search', 'LeadController@advancesearch')->name('advance.search');

Route::get('/profile', [
    'uses' => 'ProfileController@profile',
    'as' => 'profile'

]);

Route::post('/profile/Update', [
    'uses' => 'ProfileController@profile_update',
    'as' => 'profile.update'

]);

Route::get('/update-Password', [
    'uses' => 'ProfileController@password_change',
    'as' => 'change.password'

]);

Route::post('/update-password/store', [
    'uses' => 'ProfileController@password_update',
    'as' => 'update.password'

]);

Route::get('/apperance', [
    'uses' => 'HomeController@apperance',
    'as' => 'apperance'

]);

Route::post('/app/store', [
    'uses' => 'HomeController@app_update',
    'as' => 'app.update'

]);

Route::get('/lead', [
    'uses' => 'LeadController@index',
    'as' => 'lead.index'

]);

Route::get('/lead/create', [
    'uses' => 'LeadController@create',
    'as' => 'lead.create'

]);

Route::post('/lead/store', [
    'uses' => 'LeadController@store',
    'as' => 'lead.store'

]);

Route::get('/lead/delete/{id}', [
    'uses' => 'LeadController@delete',
    'as' => 'lead.delete'

]);

Route::get('/lead/edit/{id}', [
    'uses' => 'LeadController@edit',
    'as' => 'lead.edit'

]);

Route::post('/lead/update', [
    'uses' => 'LeadController@update',
    'as' => 'lead.update'

]);

Route::get('/lead/comment/{id}', [
    'uses' => 'LeadController@comment',
    'as' => 'lead.comment'

]);

Route::post('/lead/comment/store', [
    'uses' => 'LeadController@comment_store',
    'as' => 'comment.store'

]);

Route::get('/lead/export', [
    'uses' => 'LeadController@export',
    'as' => 'lead.export'

]);

Route::post('/lead/import', [
    'uses' => 'LeadController@import',
    'as' => 'lead.import'

]);

Route::post('/lead/search', [
    'uses' => 'LeadController@search',
    'as' => 'lead.search'

]);


});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sales/report', 'HomeController@salesReport')->name('sales.report');
Route::get('/sales/weeklyreport', 'HomeController@weeklyreport')->name('sales.weeklyreport');
Route::get('/sales/monthlyreport', 'HomeController@monthlyreport')->name('sales.monthlyreport');


Route::get('/department/index', 'DepartmentController@index')->name('department.index');
Route::get('/department/delete/{id}', 'DepartmentController@delete')->name('department.delete');
Route::get('/department/create', 'DepartmentController@create')->name('department.create');
Route::post('/department/store', 'DepartmentController@store')->name('department.store');
Route::post('/department/update/{id}', 'DepartmentController@update')->name('department.update');

Route::post('/sale/store', 'SalesController@store')->name('sale.store');
