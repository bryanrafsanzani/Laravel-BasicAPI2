<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\invoice;
use App\Http\Controllers\Controller;

class invoiceController extends Controller
{
    public function viewAll(){
        
    }

    public function view($id){
        $query = invoice::findOrFail($id);

        if($query){
            $response = [
                'msg'       => "Data Ditemukan",
                'invoice'   =>  $query->id_invoice,
                'nama'      =>  $query->nama,
                'harga'     =>  $query->harga,
                'kapasitas' =>  $query->kapasitas,
            ];
            return response()->json($response, 201);
        }else{
            return response()->json(['msg' => 'Data Tidak Ditemukan'], 404);
        }
    }

    public function create(Request $request){

        if(is_null($request->nama) || is_null($request->harga) || is_null($request->kapasitas) ){            
            return response()->json(["msg"   =>  "ada kolom yang masih kosong", "status" => false], 422);
        }else{
            invoice::create([
                'nama'      =>  $request->nama,
                'harga'     =>  $request->harga,
                'kapasitas' =>  $request->kapasitas,
            ]);
            return response()->json(["msg"   =>  "Data Berhasil Ditambah",  "status" => true], 201);
        }
    }

    public function update(Request $request, $id){
        $query = invoice::findOrFail($id);
        if(!$query){
            return response()->json(["msg"   =>  "Data Gagal Diubah"], 404);
        }else{
            invoice::where('id_invoice', $id)->update([
                'nama'  => $request->nama,
                'harga' => $request->harga,
                'kapasitas' => $request->kapasitas
            ]);

            return $response()->json(["msg"   =>  "Data berhasil Diubah"], 201);
        }
    }
    
    public function delete($id) {
        $query = invoice::findOrFail($id)->delete();
        return $response()->json(["msg"   =>  "Data berhasil Diubah"], 201);
    }
}
