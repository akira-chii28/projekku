<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jabatan;
use App\Pegawai;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename='Data Pegawai';
        $data=Pegawai::all();
        return view ('admin.pegawai.index', compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_jabatan = Jabatan::all();
        $pagename='Form Input pegawai';
        return view('admin.pegawai.create',compact('pagename','data_jabatan'));
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
            'txtnama_pegawai'=>'required',
            'txtalamat_pegawai'=>'required',
            'option_id_jabatan'=>'required',
            'txtkendaraan_pegawai'=>'required',
            'txtplat_pegawai' =>'required',
            'txtjammasuk_pegawai'=>'required',
            'txtjamkeluar_pegawai'=>'required',
        ]);
        $data_pegawai=new Pegawai([
            'Nama_pegawai'=> $request->get('txtnama_pegawai'),
            'Alamat_pegawai'=> $request->get('txtalamat_pegawai'),
            'Id_jabatan'=> $request->get('option_id_jabatan'),
            'Kendaraan_pegawai'=> $request->get('txtkendaraan_pegawai'),
            'Plat_pegawai'=> $request->get('txtplat_pegawai'),
            'Jammasuk_pegawai'=>$request->get('txtjammasuk_pegawai'), 
            'Jamkeluar_pegawai'=>$request->get('txtjamkeluar_pegawai'), 

        ]);
            // dd($data_tugas);

            $data_pegawai->save();
            return redirect('admin/pegawai')->with ('sukses','Pegawai berhasil di simpan');
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
        $data_jabatan=Jabatan::all();
        $pagename='Update Pegawai';
        $data=Pegawai::find($id);
        return view ('admin.pegawai.edit',compact('data','pagename','data_jabatan'));
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
            'txtnama_pegawai'=>'required',
            'txtalamat_pegawai'=>'required',
            'option_id_jabatan'=>'required',
            'txtkendaraan_pegawai'=>'required',
            'txtplat_pegawai' =>'required',
            'txtjammasuk_pegawai'=>'required',
            'txtjamkeluar_pegawai'=>'required',
        ]);
        
        $pegawai=Pegawai::find($id);

        $pegawai->Nama_pegawai= $request->get('txtnama_pegawai');
        $pegawai->Alamat_pegawai= $request->get('txtalamat_pegawai');
        $pegawai->Id_jabatan= $request->get('option_id_jabatan');
        $pegawai->Kendaraan_pegawai= $request->get('txtkendaraan_pegawai'); 
        $pegawai->Plat_pegawai= $request->get('txtplat_pegawai');
        $pegawai->Jammasuk_pegawai= $request->get('txtjammasuk_pegawai');
        $pegawai->Jamkeluar_pegawai= $request->get('txtjamkeluar_pegawai');
        
            // dd($data_tugas);

            $pegawai->save();
            return redirect('admin/pegawai')->with ('sukses','Pengunjung berhasil di update');
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
        $pegawai =Pegawai::find($id);

        $pegawai->delete();
        return redirect('admin/pegawai')->with('sukses','Pegawai berhasil di hapus'); 
    }

    public function generate ($id)
    {
        
        $qrcode = Pegawai::findOrFail($id);
        $qrcode = QrCode::size(400)-> generate (['id' =>$qrcode ->id] );
        return view('welcome',compact('qrcode'));
    }
}
