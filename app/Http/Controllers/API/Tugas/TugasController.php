<?php

namespace App\Http\Controllers\API\Tugas;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TugasController extends Controller
{
    public function getAll()
    {
        $data=DB::table('tasks')
        ->orderBy('id','desc')
        ->get();

        return response()->json($data,200);
    }
    public function store(Request $request){
        $validateData=$request->validate([
            'id' => 'required',
            'nama_tugas' => 'required',
            'id_kategori' => 'required',
            'ket_tugas' => 'required',
            'txtalamat_tugas' => 'required',
            'txtjenis_kendaraan'=>'required',
            'txtno_polisi'=>'required',
        ]);

        $data = new Task;
        $data->id = $request->id;
        $data->nama_tugas=$request->nama_tugas;
        $data->id_kategori=$request->id_kategori;
        $data->ket_tugas=$request->ket_tugas;
        $data->Alamat_tugas=$request->Alamat_tugas;
        $data->Jenis_Kendaraan=$request->Jenis_Kendaraan;
        $data->No_Polisi=$request->No_polisi;
        $data->save();

        return response()->json($data,201);

    }

    public function update (Request $request){
        $validateData=$request->validate([
            'id' => 'required',
            'nama_tugas' => 'required',
            'id_kategori' => 'required',
            'ket_tugas' => 'required',
            'Alamat_tugas' => 'required',
            'Jenis_Kendaraan' => 'required',
            'No_Polisi' => 'required',
        ]);

        $data = Task::where('id','=',$request->id)->first();
        $data->id = $request->id;
        $data->nama_tugas=$request->nama_tugas;
        $data->id_kategori=$request->id_kategori;
        $data->ket_tugas=$request->ket_tugas;
        $data->Alamat_tugas=$request->Alamat_tugas;
        $data->Jenis_Kendaraan=$request->Jenis_Kendaraan;
        $data->No_Polisi=$request->No_Polisi;
        $data->save();

        return response()->json($data,201);

    }

    public function destroy(Request $request){
        $data = Task::where('id','=',$request->id)->first();

        if(!empty($data)){
            $data->delete();

            return response()->json($data,200);      

        } else{
            return response()->json([
                'error' => 'data tidak di temukan'
            ],404);
        }
    }
}