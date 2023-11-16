<?php

namespace App\Http\Controllers;

use App\Models\Status;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ScanController extends Controller
{
    public function getDetailWargaPesensi(Request $request, $id_pengajuan){
        

        try {
            $response = Http::get(app('LinkApi') . '/admin/data-scan/'.$id_pengajuan);

            $data = $response->json();

            if ($response->successful()) {
                return $data;
            } else {
                return ['success' => false, 'message' => 'Server tidak merespons'];
            }
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Terjadi kesalahan saat menghubungi server. code : ERR01'];
        }
            

        
    }
    public function update(Request $request){
        $data = [
            'kondisi' => $request->kondisi,
            'id_pengajuan' => $request->id_pengajuan,
            'tanggal_pengambilan'=>$request->tanggal_pengambilan,
   
        ];

        $dataJson = json_encode($data);
        $wargaModel = new Status();
            
        $response = $wargaModel->posthadir($dataJson);

        if ($response['success']) {
            return $response; 
        } else {
            return $response; 
        }
    }
}
