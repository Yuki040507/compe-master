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

Route::get('acount', 'HomeController@acount');
Route::get('/{group_id}/competition/{compe_id}', 'CompeDetails@competition_home');
Route::get('/{group_id}/competition/{compe_id}/edit', 'CompeDetails@competition_edit');
Route::get('/{group_id}/competition/{compe_id}/members', 'CompeDetails@competiton_members');
Route::get('/{group_id}/competition/{compe_id}/teams', 'CompeDetails@competiton_teams');
Route::get('/{group_id}/competition/{compe_id}/scores', 'CompeDetails@competition_scores');
Route::get('/{group_id}/competition/{compe_id}/ranks', 'CompeDetails@competition_ranks');
Route::post('/compe_create', 'CompeDetails@store_compedetails');
Route::post('/compe_edit/{compe_id}', 'CompeDetails@edit_compedetails');
Route::post('/member_submit', 'CompeDetails@store_competeams');
Route::post('/member_score/{id}', 'CompeDetails@edit_competeams');
Route::post('/member_score/{id}', 'CompeDetails@edit_competeams');

Route::post('/member_team', 'CompeDetails@edit2_competeams');
Route::post('/member_destroy/{id}', 'CompeDetails@destroy_competeams');
Route::post('/competition_destroy/{compe_id}', 'CompeDetails@destroy_competition');
Route::get('/create_competition/{group_id}', 'CompeDetails@create_competition');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user/index', 'admin\UserController@index');
Route::get('/user/edit', 'admin\UserController@edit');
Route::post('/userinfo/update/{id}', 'CompeDetails@test');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
