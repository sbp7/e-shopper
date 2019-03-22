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
    return view('welcome', ['description'=>'E-SHOPPER - Интернет магазин одежды',
                                  'title'=>'E-SHOPPER-Главная']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/cabinet/user/{name}', 'HomeController@cabinetUser')->name('cabinet.user');

/*Route::get('/{page}', function ($page){
    $data = ['description'=>'E-SHOPPER - ' . $page,
             'title'=>'E-SHOPPER - ' . $page];
    return view ($page, $data);
}); */

Route::middleware (['auth'])
                   ->prefix ('cabinet/user')
                   ->name ('cabinet.user.')
                   ->group (function () {
                       Route::get('/{name}', 'HomeController@cabinetUser');
                       Route::get('/{name}/edit', 'HomeController@userEdit')->name('edit');
                       Route::post('/{id}/save', 'HomeController@userSave')->name('save');
                            });

Route::middleware (['auth', 'admin'])
                   ->prefix ('admin')
                   ->name ('admin.')
                   ->group ( function () {
                       Route::get('/', 'Admin\UserController@index')->name('index');
                       Route::get('/{id}', 'Admin\UserController@showEditForm')
                                  ->where('id', '[0-9]+')
                                  ->name('edit');
                       Route::post('/{id?}', 'Admin\UserController@store')->name('store');
                       Route::delete('/{id}', 'Admin\UserController@remove')->name('remove');
                       Route::get('/create', 'Admin\UserController@showCreateForm')->name('create');
                            });

Route::get('/letter', 'HomeController@letter');
Route::post('/sendmail', 'Ajax\FeedbackController@send');



