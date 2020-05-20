<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\User;

class Beranda_controller extends Controller
{
    public function index(){
    	$title = 'Halaman Dashboard';

    	$user_id = \Auth::user()->id;
    	$cek = Biodata::where('users',$user_id)->count();
    	//jika data kosong/belum di isi
    	if($cek < 1){
    		$pesan = 'Harap Melengkapi Biodata Terlebih Dahulu';
    	}else{
    		$pesan = 'Biodata Anda Sudah Dilengkapi.. Terima Kasih';
    	}

        $cek_verifikasi = User::find($user_id);

        if($cek_verifikasi->is_verifikasi == 1){
            $status = 'Status sudah di verifikasi';
        }else {
            $status = 'Belum di verifikasi';
        }

        $cek_lulus = User::find($user_id);
        if($cek_lulus->is_lulus == 1){
            $pesan_lulus = 'Selamat Anda Sudah Lulus';
        }else{
            $pesan_lulus = 'Mohon Maaf status anda masih dalam peninjauan';
        }

    	return view('dashboard.beranda.index',compact('title','pesan','cek', 'status','pesan_lulus'));
    }
}
