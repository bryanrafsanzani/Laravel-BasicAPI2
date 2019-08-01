<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\lokasi;
use App\Models\invoice;
use App\Http\Controllers\Controller;

class lokasiController extends Controller
{
    public function view($id){
        $lokasi = lokasi::findOrFail($id);
        if(!$lokasi){
            $response = [
                "msg" => "Lokasi tidak ditemukan",
                "status" => 0
            ];  
            return response()->json($response, 404);
        }else{
            $response = [
                "msg" => "Lokasi Ditemukan",
                "lokasi" => $lokasi->nama,
                "provinsi" => $lokasi->provinsi,
                "invoice" => $lokasi->tbl_invoice->id_invoice,
                "nama" => $lokasi->tbl_invoice->nama,
                "harga" => $lokasi->tbl_invoice->harga,
                "kapasitas" => $lokasi->tbl_invoice->kapasitas,
            ];  
            return response()->json($response, 201);
        }
    }

    public function showAll(){
        $lokasi = lokasi::All();

        if(!$lokasi || is_null($lokasi)){
            $response = [
                "msg" => "Lokasi Kosong",
                "status" => 0
            ];  
            return response()->json($response, 404);
        }else{      
            $response = Array();
            $response['msg'] = "Sukses Menampilkan Semua Lokasi";
            foreach ($lokasi as $i){
                $response[] = Array(
                    "lokasi" => $i->nama,
                    "provinsi" => $i->provinsi,
                    "invoice" => $i->tbl_invoice->id_invoice,
                    "nama" => $i->tbl_invoice->nama,
                    "harga" => $i->tbl_invoice->harga,
                    "kapasitas" => $i->tbl_invoice->kapasitas
                );
            }
            return response()->json($response, 201);
        }
    }

    public function create(Request $request){
        $queryInvoice = invoice::findOrFail($request->invoice);
        
        if(is_null($request->nama) || is_null($request->provinsi) || is_null($request->id_invoice)){
            return response()->json(["msg"   => "masih ada field yang kosong",], 422);
        }else if(!$queryInvoice){
            return response()->json(["msg"   => "Invoice tidak valid",], 404);
        }else{
            $query = lokasi::create([
                'lokasi'    => $request->lokasi,
                'provinsi'  => $request->provinsi,
                'invoice'   => $request->invoice,
            ]);
            return response()->json(["msg"   => "sukses menyimpan"], 201);
        }
    }

    public function update(Request $request, $id){
        $query = lokasi::findOrFail($id);
        if($query){
            lokasi::where('id_lokasi', $id)->update([
                'lokasi'        => $request->lokasi,
                'provinsi'      => $request->provinsi,
            ]);
            return response()->json(["msg"   => "Sukses Mengubah"], 201);
        }else{
            return response()->json(["msg"   => "data tidak ada, gagal mengubah"], 404);
        }
    }

    public function delete($id){
        $query = lokasi::findOrFail($id);
        if($query){
            $query->delete();
            return response()->json(["msg"   => "Sukses Menghapus"], 201);
        }else{
            return response()->json(["msg"   => "gagal menghapus, data tidak valid"], 404);
        }
    }
}

