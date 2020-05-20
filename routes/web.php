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

Route::get('create-admin', function(){
	\DB::table('users')->insert([
		'role'=>1,
		'name'=>'admin',
		'nisn'=>'1',
		'email'=>'admin@gmail.com',
		'id_registrasi'=>'-',
		'password'=>bcrypt('123')
	]);
});

Route::get('/', function () {
	$title = 'PPDB';
    return view('welcome',compact('title'));
});

Route::get('keluar',function(){
	\Auth::logout();
	return redirect('/');
});

Route::get('ppdb','Ppdb_controller@index');
Route::post('ppdb','Ppdb_controller@store');

//mengatur akses admin
Route::group(['middleware'=>'auth'],function(){
	
	Route::get('dashboard','Dashboard\Beranda_controller@index');
	Route::get('biodata','Dashboard\Biodata_controller@index');
	Route::post('biodata/{users}','Dashboard\Biodata_controller@store');
	Route::put('biodata/{users}','Dashboard\Biodata_controller@update');

	//cetak biodata
	Route::get('cetak-biodata','Dashboard\Biodata_controller@print');

	//verifikasi peserta
	Route::get('verifikasi','Dashboard\Verifikasi_controller@index');
	Route::post('verifikasi','Dashboard\Verifikasi_controller@verifikasi');

	//data peserta
	Route::get('peserta','Dashboard\Peserta_controller@index');
	Route::get('peserta/verifikasi','Dashboard\Peserta_controller@diverifikasi');
	Route::get('peserta/belum-verifikasi','Dashboard\Peserta_controller@belum_verifikasi');

	//edit peserta
	Route::get('peserta/{id}','Dashboard\Peserta_controller@edit');
	Route::put('peserta/{id}','Dashboard\Peserta_controller@update');

	//delete data peserta
	Route::delete('peserta/{id}','Dashboard\Peserta_controller@delete');

	Route::get('peserta/{id}/lulus','Dashboard\Peserta_controller@lulus');

	//profile_sekolah
	Route::get('profile-sekolah','Dashboard\Profile_sekolah_controller@index');
	Route::put('profile-sekolah','Dashboard\Profile_sekolah_controller@update');

	//kirim pesan
	Route::get('pesan','Dashboard\Pesan_controller@index');
	Route::get('pesan/add','Dashboard\Pesan_controller@add');
	Route::post('pesan/add','Dashboard\Pesan_controller@store');
	Route::get('pesan/{id}','Dashboard\Pesan_controller@detail');
	
});

Auth::routes();

Route::get('/home', function(){
	return redirect('dashboard');
});

