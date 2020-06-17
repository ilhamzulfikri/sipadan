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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
	if(!Session::get('login')) {
		return redirect('login');
	} else {
		return redirect('beranda');
	}
});

Route::get('halo', function () {
	return "Halo, Selamat datang di tutorial laravel www.malasngoding.com";
});

Route::get('blog', function () {
	return view('blog');
});

//Route::get('/pegawai/{nama}', 'PegawaiController@index');

Route::get('dosen', 'DosenController@index');

Route::get('/formulir', 'PegawaiController@formulir');
Route::post('/formulir/proses', 'PegawaiController@proses');

// route blog
Route::get('/blog', 'BlogController@home');
Route::get('/blog/tentang', 'BlogController@tentang');
Route::get('/blog/kontak', 'BlogController@kontak');

Route::get('/pegawai','PegawaiController@index');
Route::get('pegawai/tambah','PegawaiController@tambah');
Route::post('/pegawai/store','PegawaiController@store');
Route::get('/pegawai/edit/{id}','PegawaiController@edit');
Route::post('/pegawai/update','PegawaiController@update');
Route::get('/pegawai/hapus/{id}','PegawaiController@hapus');
Route::get('/pegawai/cari','PegawaiController@cari');

//MENU BERANDA
Route::get('beranda', 'CountController@beranda');

//MENU MANBAG
Route::get('notadinas', 'manbagControl@notadinas');
Route::post('notadinas/tambah', 'manbagControl@tambah');
Route::get('addendum', 'manbagControl@daftarAddendum');
Route::get('spbj', 'manbagControl@daftarSpbj');

//MENU RENDAN
Route::get('rks', 'rendanControl@daftarRks');
Route::get('rks/{id}', 'rendanControl@lihatRks');
Route::post('rks/tambah', 'rendanControl@tambahRks');

//MENU LAKDAN
Route::get('prosespengadaan', 'lakdanControl@daftarProsesPengadaan');
Route::get('prosespengadaan/{id}', 'lakdanControl@lihatProsesPengadaan');
Route::post('prosespengadaan/tambah', 'lakdanControl@tambahProsesPengadaan');
Route::get('prosespengadaan/edit/{id}', 'lakdanControl@editProsesPengadaan');
Route::post('prosespengadaan/update', 'lakdanControl@updateProsesPengadaan');

Route::get('inputkontrak', 'lakdanControl@daftarKontrak');
Route::get('inputkontrak/{id}', 'lakdanControl@lihatKontrak');
Route::post('inputkontrak/tambah', 'lakdanControl@tambahKontrak');


Route::get('monitoring', 'IamController@monitoring');
Route::get('monitoring/{id}', 'IamController@monitoringpekerjaan');

Route::get('tentang', 'IamController@tentang');
Route::get('kontak', 'IamController@kontak');
Route::get('versi', 'IamController@versi');
Route::get('index', 'IamController@beranda');
Route::get('user', 'IamController@user');

Route::get('login', 'IamController@login');
Route::post('loginPost', 'IamController@loginPost');
Route::get('register', 'IamController@register');
Route::post('registerPost', 'IamController@registerPost');
Route::get('logout', 'IamController@logout');

//MENU KSA
Route::get('tagihan', 'ksaControl@tagihan');
Route::get('tagihan/{id}', 'ksaControl@lihatTagihan');
Route::post('tagihan/simpan', 'ksaControl@simpanTagihan');


Route::get('hpemail', 'IamController@hpemail');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
