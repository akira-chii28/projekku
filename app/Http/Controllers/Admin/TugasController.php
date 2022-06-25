<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\kategori;
use App\Task;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        //$this->middleware('role:admin|manajer');
        //$this->middleware('role:karyawan', ['only'->'index']);

        $this->middleware('permission:tugas-list', ['only'=>['index']]);
        $this->middleware('permission:tugas-create', ['only'=>['create','store']]);
        $this->middleware('permission:tugas-edit', ['only'=>['edit','update']]);
        $this->middleware('permission:tugas-delete', ['only'=>['destroy']]);
    }

    public function index()
    {
        //
        $pagename='Data Pengunjung';
        $data=Task::all();
        return view ('admin.tugas.index', compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_kategori = kategori::all();
        $pagename='Form Input pengunjung';
        return view('admin.tugas.create',compact('pagename','data_kategori'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'txtNama_tugas'=>'required',
            'option_id_kategori'=>'required',
            'txtKeterangan_tugas'=>'required',
            'txtalamat_tugas'=>'required',
            'txtjenis_kendaraan' =>'required',
            'txtno_polisi'=>'required',
        ]);
        $data_tugas=new Task([
            'Nama_tugas'=> $request->get('txtNama_tugas'),
            'Id_kategori'=> $request->get('option_id_kategori'),
            'Ket_tugas'=> $request->get('txtKeterangan_tugas'),
            'Tempat_tugas'=> $request->get('txtalamat_tugas'),
            'Jenis_Kendaraan'=> $request->get('txtjenis_kendaraan'),
            'No_Polisi'=>$request->get('txtno_polisi'), 

        ]);
            // dd($data_tugas);

            $data_tugas->save();
            return redirect('admin/tugas')->with ('sukses','Pengunjung berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data_kategori=kategori::all();
        $pagename='Update Pengunjung';
        $data=Task::find($id);
        return view ('admin.tugas.edit',compact('data','pagename','data_kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'txtNama_tugas'=>'required',
            'option_id_kategori'=>'required',
            'txtKeterangan_tugas'=>'required',
            'txtalamat_tugas'=>'required',
            'txtjenis_kendaraan' =>'required',
            'txtno_polisi'=>'required',
        ]);
        
        $tugas=Task::find($id);

        $tugas->Nama_tugas= $request->get('txtNama_tugas');
        $tugas->Id_kategori= $request->get('option_id_kategori');
        $tugas->Ket_tugas= $request->get('txtKeterangan_tugas');
        $tugas->Tempat_Tugas= $request->get('txtalamat_tugas'); 
        $tugas->Jenis_Kendaraan= $request->get('txtjenis_kendaraan');
        $tugas->No_Polisi= $request->get('txtno_polisi');
        
            // dd($data_tugas);

            $tugas->save();
            return redirect('admin/tugas')->with ('sukses','Pengunjung berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tugas =Task::find($id);

        $tugas->delete();
        return redirect('admin/tugas')->with('sukses','Pengunjung berhasil di hapus'); 
    }
}
