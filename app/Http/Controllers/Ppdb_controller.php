<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Ppdb_controller extends Controller
{
    public function index()
    {
    	$title = 'PPDB Online';
    	return view('ppdb.index',compact('title'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    	'nama'=>'required',
    	'nisn'=>'required',
    	'email'=>'required'
    ]);

    $data['name'] = $request->nama;
    $data['nisn'] = $request->nisn;
    $data['email'] = $request->email;
    $data['password'] = bcrypt('123');
    $data['id_registrasi'] = 'REG-'.date('YmdHis'); //id harus unik jd menggunakan tanggal dan jam sekarang

    //mengecek foto
    $file = $request->file('photo');
    //jika user mengupload foto maka file akan dipindahkan 
    if($file){
    	$file->move('uploads',$file->getClientOriginalName());
    	$data['photo'] = 'uploads/'.$file->getClientOriginalName();
    }

    //mengisi data pd db
    User::insert($data);

    \Session::flash('berhasil','Pendaftaran berhasil dilakukan');
    
    return redirect('ppdb');

}
}
