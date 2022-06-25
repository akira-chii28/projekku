<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengunjung;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename='Data Pengunjung Booked';
        $data=Pengunjung::all();
        return view ('admin.pengunjung.index', compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_pengunjung = Pengunjung::all();
        $pagename='Form Input Pengunjung Booked';
        return view('admin/pengunjung.create',compact('pagename'));
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
            'txtnama_peng'=>'required',
            'txtalamat_peng'=>'required',
            'txtkendaraan_peng'=>'required',
            'txtplat_peng'=> 'required',
            'txtket_peng'=> 'required',
            'txtjammasuk_peng' => 'required',
            'txtjamkeluar_peng' => 'required',
        ]);

        $data_pengunjung=new pengunjung([
            'Nama_peng'=> $request->get('txtnama_peng'),
            'Alamat_peng'=> $request->get('txtalamat_peng'),
            'Kendaraan_peng'=> $request->get('txtkendaraan_peng'),
            'Plat_peng'=> $request->get('txtplat_peng'),
            'Ket_peng'=> $request->get('txtket_peng'),
            'Jammasuk_peng'=> $request->get('txtjammasuk_peng'),
            'Jamkeluar_peng'=> $request->get('txtjamkeluar_peng'),
        ]);
        $data_pengunjung->save();
         return redirect('admin/pengunjung')->with ('sukses','Pengunjung berhasil di simpan');
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
        $data_pengunjung=Pengunjung::all();
        $pagename='Update Pengunjung Booked';
        $data=Pengunjung::find($id);
        return view ('admin/pengunjung.edit',compact('data','pagename','data_pengunjung' ));
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
            'txtnama_peng'=>'required',
            'txtalamat_peng'=>'required',
            'txtkendaraan_peng'=>'required',
            'txtplat_peng'=> 'required',
            'txtket_peng'=> 'required',
            'txtjammasuk_peng' => 'required',
            'txtjamkeluar_peng' => 'required',
            
        ]);
        
        $pengunjung=Pengunjung::find($id);

        $pengunjung->Nama_peng= $request->get('txtnama_peng');
        $pengunjung->Alamat_peng= $request->get('txtalamat_peng');
        $pengunjung->Kendaraan_peng= $request->get('txtkendaraan_peng');
        $pengunjung->Plat_peng= $request->get('txtplat_peng');
        $pengunjung->Ket_peng= $request->get('txtket_peng');
        $pengunjung->Jammasuk_peng= $request->get('txtjammasuk_peng');
        $pengunjung->Jamkeluar_peng= $request->get('txtjamkeluar_peng');
        
        // dd($data_order_005);

        $pengunjung->save();
        return redirect('admin/pengunjung')->with ('sukses','Pengunjung Booked berhasil di update');
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
        $pengunjung =Pengunjung::find($id);

        $pengunjung->delete();
        return redirect('admin/pengunjung')->with('sukses','Pengunjung Booked berhasil di hapus'); 
    }
}
