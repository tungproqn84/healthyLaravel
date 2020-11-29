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

use Illuminate\Support\Facades\Route;
Route::get('/index',['as' =>'index','uses'=>'mycontroller@index']);
Route::get('/loaisp/{loai}',['as'=>'loaisanpham','uses'=>'mycontroller@loaisp']);
Route::get('/chitietsp/{id}',['as'=>'chitietsp','uses'=>'mycontroller@chitietsp']);
Route::get('/dangnhap',['as'=>'login','uses'=>'mycontroller@getlogin']);
Route::post('/dangnhap','mycontroller@postlogin');
Route::get('/dangki',['as'=>'signin','uses'=>'mycontroller@getsignin']);
Route::post('/dangki','mycontroller@postsignin');
Route::get('/themsp','mycontroller@addsp');
Route::post('/themsp','mycontroller@xladdsp');
Route::get('/logout','mycontroller@logout');
Route::get('/danhsachsp',['as'=>'dssp','uses'=>'mycontroller@getdssp']);
Route::get('/suasp/{id}',['as'=>'suasp','uses'=>'mycontroller@getsuasp']);
Route::post('/suasp/{id}',['as'=>'suasp','uses'=>'mycontroller@postsuasp']);
Route::get('/xoasp/{id}',['as'=>'xoasp','uses'=>'mycontroller@xoasp']);
Route::get('/timkiem','mycontroller@timkiem');
Route::post('/timkiem','mycontroller@timkiem');
Route::get('/cart',['as'=>'cart','uses'=>'mycontroller@getcart']);
Route::get('/cart/{id}','mycontroller@postcart');
Route::get('/delete/{id}','mycontroller@delete');
Route::get('/deletecart','mycontroller@deletecart');
Route::get('/buy','mycontroller@buy');
//quản trị viên
Route::get('/indexad','mycontroller@indexadmin');
Route::get('/donhang','mycontroller@quanlidonhang');
Route::get('/chitiet/{id}','mycontroller@chitietdonhang');
Route::get('/xoadonhang/{id}',['as'=>'xoadonhang','uses'=>'mycontroller@xoadonhang']);
Route::get('/xacnhandonhang/{id}',['as'=>'xacnhandonhang','uses'=>'mycontroller@xacnhandonhang']);
Route::get('/quanlikh',['as'=>'quanlikh','uses'=>'mycontroller@quanlikh']);
Route::get('/suakh/{id}',['as'=>'suakh','uses'=>'mycontroller@getsuakh']);
Route::post('/suakh/{id}',['as'=>'postsuakh','uses'=>'mycontroller@postsuakh']);
Route::get('/xoa/{id}',['as'=>'xoakh','uses'=>'mycontroller@xoakh']);
