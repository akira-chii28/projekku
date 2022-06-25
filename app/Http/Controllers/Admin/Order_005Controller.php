<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order_005;
use App\kategori;
use Illuminate\Http\Request;

class Order_005Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename='Data Kendaraan Kebun';
        $data=Order_005::all();
        return view ('admin.order_005.index', compact('data','pagename'));
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
        // $data_order_005 = order_005::all();
        $pagename='Form Input Kendaraan';
        return view('admin/order_005.create',compact('pagename','data_kategori'));
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
            'txtnama_supir'=>'required',
            'option_id_kategori'=>'required',
            'txtkendaraan_supir'=>'required',
            'txtplat_supir'=> 'required',
            'txtjenis_barang'=> 'required',
            'txtjammasuk_supir' => 'required',
            'txtjamkeluar_supir' => 'required',
            
        ]);
        $data_order_005=new Order_005([
            'Nama_supir'=> $request->get('txtnama_supir'),
            'Id_kategori'=> $request->get('option_id_kategori'),
            'Kendaraan_supir'=> $request->get('txtkendaraan_supir'),
            'Plat_supir'=> $request->get('txtplat_supir'),
            'Jenis_barang'=> $request->get('txtjenis_barang'),
            'Jammasuk_supir'=> $request->get('txtjammasuk_supir'),
            'Jamkeluar_supir'=> $request->get('txtjamkeluar_supir'),
        ]);
         // dd($data_order_005);

         $data_order_005->save();
         return redirect('admin/order_005')->with ('sukses','Kendaraan berhasil di simpan');
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
        $data_kategori = kategori::all();
        $data_order_005=Order_005::all();
        $pagename='Update Kendaraan';
        $data=Order_005::find($id);
        return view ('admin/order_005.edit',compact('data','pagename','data_order_005','data_kategori' ));
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
            'txtnama_supir'=>'required',
            'option_id_kategori'=>'required',
            'txtkendaraan_supir'=>'required',
            'txtplat_supir'=> 'required',
            'txtjenis_barang'=> 'required',
            'txtjammasuk_supir' => 'required',
            'txtjamkeluar_supir' => 'required',
            
        ]);
        
        $order_005=Order_005::find($id);

        $order_005->Nama_supir= $request->get('txtnama_supir');
        $order_005->Id_kategori= $request->get('option_id_kategori');
        $order_005->Kendaraan_supir= $request->get('txtkendaraan_supir');
        $order_005->Plat_supir= $request->get('txtplat_supir');
        $order_005->Jenis_barang= $request->get('txtjenis_barang');
        $order_005->Jammasuk_supir= $request->get('txtjammasuk_supir');
        $order_005->Jamkeluar_supir= $request->get('txtjamkeluar_supir');
        
        // dd($data_order_005);

        $order_005->save();
        return redirect('admin/order_005')->with ('sukses','Kendaraan berhasil di update');
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
        $order_005 =Order_005::find($id);

        $order_005->delete();
        return redirect('admin/order_005')->with('sukses','Kendaraan berhasil di hapus'); 
    }
}
