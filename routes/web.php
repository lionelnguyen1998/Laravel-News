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

//Auth
//Route::get('/login','LoginController@getlogin');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Kiem tra cac database da lien ket voi nhau chua
// Route::get('test',function(){
// 	$theloai = App\TheLoai::find(1);
// 	foreach($theloai->loaitin as $loaitin)
// 	{
// 		echo $loaitin->Ten."<br>";
// 	}
// });
// //Kiem tra giao dien da on dinh chua
// Route::get('TestInterface/index',function(){
// 	return view('admin.TheLoai.add');
// });
// //Kiem tar giao dien da on dinh chua
// Route::get('TestInterface/users',function(){
// 	return view('admin.User.add');
// });
// //Kiem tar giao dien da on dinh chua
// Route::get('TestInterface/login',function(){
// 	return view('admin.login');
// });
Route::get('admin/login','UserController@getloginAdmin');
Route::post('admin/login','UserController@postloginAdmin');
Route::get('admin/logout','UserController@getLogout');
//Truy cap den admin
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'TheLoai'],function(){
		//admin/Theloai/list
		Route::get('list','TheLoaiController@getList');
		Route::get('add','TheLoaiController@getAdd');
		Route::post('add','TheLoaiController@postAdd');
		Route::get('edit/{id}','TheLoaiController@getEdit');
		Route::post('edit/{id}','TheLoaiController@postEdit');
		Route::get('delete/{id}','TheLoaiController@getDelete');

		});
	
	Route::group(['prefix'=>'LoaiTin'],function(){
		//admin/Theloai/list
		Route::get('list','LoaiTinController@getList');
		Route::get('add','LoaiTinController@getAdd');
		Route::post('add','LoaiTinController@postAdd');
		Route::get('edit/{id}','LoaiTinController@getEdit');
		Route::post('edit/{id}','LoaiTinController@postEdit');
		
		});
	Route::group(['prefix'=>'TinTuc'],function(){
		//admin/Theloai/list
		Route::get('list','TinTucController@getList');
		Route::get('add','TinTucController@getAdd');
		Route::post('add','TinTucController@postAdd');
		Route::get('edit/{id}','TinTucController@getEdit');
		Route::post('edit/{id}','TinTucController@postEdit');
		});
	//Tao group ajax rieng
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
	});
	Route::group(['prefix'=>'Comment'],function(){
		//admin/Theloai/list
		Route::get('list','CommentController@getList');
		Route::get('add','CommentController@getAdd');
		Route::get('edit','CommentController@getEdit');
		});
	Route::group(['prefix'=>'Slide'],function(){
		//admin/Theloai/list
		Route::get('list','SlideController@getList');
		Route::get('add','SlideController@getAdd');
		Route::post('add','SlideController@postAdd');
		Route::get('edit/{id}','SlideController@getEdit');
		Route::post('edit/{id}','SlideController@postEdit');
		Route::get('delete/{id}','SlideController@getDelete');
		});
	Route::group(['prefix'=>'User'],function(){
		//admin/Theloai/list
		Route::get('list','UserController@getList');
		Route::get('add','UserController@getAdd');
		Route::post('add','UserController@postAdd');
		Route::get('edit/{id}','UserController@getEdit');
		Route::post('edit/{id}','UserController@postEdit');
		Route::get('delete/{id}','UserController@getDelete');
		});
});

Route::get('/trangchu',function(){
        return view('page.trangchu');
});

