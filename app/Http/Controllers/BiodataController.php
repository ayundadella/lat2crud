<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\BiodataMahasiswa;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateBiodata;
use App\Exports\MahasiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        // $mahasiswa = BiodataMahasiswa::all(); //menyeleksi data dr DB
        // return view("biodata.index", compact("mahasiswa")); //proses passing data dr controller ke view

        if(request()->ajax()) {
            return DataTables::of(BiodataMahasiswa::query())->editColumn("nim", function($data) {
               return "<strong><i>" . $data->nim .
               "</i></strong>" ;
            })->addColumn("action", function($data) {
                return "
                <a href='" . route("biodata.show", ["id" => $data->id]) ."' class='btn btn-success'>Detail</a>
                <a href='" . route("biodata.edit", ["id" => $data->id]) ."' class='btn btn-warning'>Edit</a>
                <a href='" . route("biodata.destroy", ["id" => $data->id]) ."' class='btn btn-danger'>Delete</button>
                ";
            })->rawColumns(["nim", "action"])->addIndexColumn()->toJson();
        }

        $html = $builder->columns([
            ["data" => "DT_RowIndex", "name" => "#", "title" => "#", "defaultContent"=> "", "orderable" => false],
            ["data" => "name", "name" => "name", "title" => "NAMA"],
            ["data" => "nim", "nim" => "nim", "title" => "NIM"],
            [
                'defaultContent' => '',
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'ACTION',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
            ],
        ]);

        return view("biodata.index", compact("html"));
    }

    public function export_excel()
    {
        return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("biodata.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $filePath = $request->file("foto")->store("public");

      BiodataMahasiswa::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'address' => $request->address,
            'foto' => $filePath]); //menyimpan filePath yang didapatkan 

      return redirect()->route("biodata.index");
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = BiodataMahasiswa::find($id);
        return view("biodata.show", compact("data"));

        //return response()->json($data); view
    }

    /**
     * Show the form for editing the specified resource.2
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BiodataMahasiswa::find($id);
        return view("biodata.edit", compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBiodata  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBiodata $request, $id)
    {

        //nama,nim,alamat
        // special character(-,./penomoran)
        // $validation = Validator::make($request->all(), [
        //     "name" => "string|min:3|max:10|alpha",
        //     "nim" => "string|min:8",
        //     "alamat" => "string|min:10",

        // ]);

        // if($validation->fails()) {
        //     return redirect()->back()->withErrors($validation)->withInput();
        // }


        BiodataMahasiswa::where("id", $id)->update($request->except("_token"));
        return redirect()->route("biodata.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BiodataMahasiswa::where("id", $id)->delete();
        return redirect()->route("biodata.index");
    }
}
