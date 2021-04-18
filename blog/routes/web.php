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

/*Route::get('/', function () {
	$db=DB::table('sanpham')->get();
	print_r($db);
   // return view('welcome');
});*/

Auth::routes();

//route::resource('testa','a')->only(['index']);

//Route lien quan den ControllerBook

route::get('/','book@index');

route::get('/chitiet',"book@detail");

route::get('/danhmuc',"book@danhmuc");

route::get('/phanloai',"book@danhmucdequi");

route::get('/khuyenmai',"book@khuyenmai");

route::get('/gioithieu',"book@gioithieu");

route::get('/timkiem',"book@timkiem");

route::get('/ses',"book@testses");

//Route lien quan den ControllerAdmin

route::get('/mainadmin',"AdminController@admin");

route::get('/khoitaoadmin',"AdminController@taomau");

route::get('/loginadmin',"AdminController@login");

route::get('/checkloginadmin',"AdminController@checklogin");

route::get('/logout',"AdminController@logout");

//route::get('/testses',"AdminController@testses");

	//route san pham

route::get('/themsp',"sanphamController@themsp");

route::post('/upsp',"sanphamController@upload");

route::get('/suasp',"sanphamController@suasp");

route::post('/updatesp',"sanphamController@updatesp");

route::get('/xoasp',"sanphamController@xoasp");

	//route danh muc

route::get('/themdm',"danhmucController@themdm");

route::post('/adddm',"danhmucController@adddm");

route::get('/suadm',"danhmucController@suadm");

route::post('/updatedm',"danhmucController@updatedm");

route::get('/xoadm',"danhmucController@xoadm");

	//route quan lý nguoi dung

route::get('/xoand',"qlndController@xoand");

route::get('/suand',"qlndController@suand");

route::post('/updatend',"qlndController@updatend");

	//route quản lý hóa đơn

route::get('/xulyhd',"qlhdController@xulyhd");

route::get('/hienthihd',"qlhdController@hienthihd");

	//gio hang

route::get('/xemgiohang',"giohangController@xemgiohang");

route::get('/themvaogio',"giohangController@themvaogio");

route::get('/xuligio',"giohangController@xuligio");

	//nothing




//mau goc'

Route::get('/home', 'HomeController@index')->name('home');

