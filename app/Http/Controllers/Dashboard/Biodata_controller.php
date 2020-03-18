<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\User;
use PDF;

class Biodata_controller extends Controller
{
    public function index(){
    	$title = 'Update Biodata';
    	$dt = Biodata::where('users',\Auth::user()->id)->first();
    	$cek = Biodata::where('users',\Auth::user()->id)->count();
    	return view('dashboard.biodata.index',compact('title','dt','cek'));
    }

    public function store(Request $request,$id){
    	$this->validate($request,[
    		'no_hp'=>'required',
    		'tempat_lahir'=>'required',
    		'tanggal_lahir'=>'required',
    		'alamat'=>'required'
    	]);
    	
    	$data['users']= $id;
    	$data['no_hp']= $request->no_hp;
    	$data['alamat']= $request->alamat;
    	$data['tempat_lahir']= $request->tempat_lahir;
    	$data['tanggal_lahir']= $request->tanggal_lahir;
    	$data['created_at']= date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	Biodata::insert($data);

    	\Session::flash('sukses','Data berhasil diupdate');

    	return redirect()->back();
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
    		'no_hp'=>'required',
    		'tempat_lahir'=>'required',
    		'tanggal_lahir'=>'required',
    		'alamat'=>'required'
    	]);
    	
    	$data['no_hp']= $request->no_hp;
    	$data['alamat']= $request->alamat;
    	$data['tempat_lahir']= $request->tempat_lahir;
    	$data['tanggal_lahir']= $request->tanggal_lahir;
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	Biodata::where('users',$id)->update($data);

    	\Session::flash('sukses','Data berhasil diupdate');

    	return redirect()->back();
    }

    public function print(){
        try {
            $dt = User::where('id',\Auth::user()->id)->with('biodata_r')->first();
 
 			//mengarah ke print biodata
            $pdf = PDF::loadview('dashboard.biodata.pdf',compact('dt'))->setPaper('a4', 'landscape');
            return $pdf->stream();
 
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage().' ! '.$e->getLine());
        }
 
        return redirect()->back();
    }

}
