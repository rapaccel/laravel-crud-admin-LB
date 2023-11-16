<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\AktaKelahiran;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AktaKelahiranController extends Controller
{
    public function index(){
        $data = AktaKelahiran::getDataAktaKelahiran();
        

        if ($data['success']) {
            $collection = collect($data['result']);

            return view('admin.pelayanan.akta-kelahiran', [
                'page'=>'layanan',
                'subpage'=>'akta-kelahiran',
                'title'=>'Akta Kelahiran',
                'status' => 'success',
                'data' => $collection,
            ]);
        } else {
            return view('admin.pelayanan.akta-kelahiran', [
                'page'=>'layanan',
                'subpage'=>'akta-kelahiran',
                'title'=>'Akta Kelahiran',
                'status' => 'error',
                'message' => $data['message'],
            ]);
        }
    }
    public function update(Request $request){
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_pengajuan' => 'required|string',
            'kondisi' => 'required|string',
            'tanggal_pengambilan'=>'string',
          
        ]);

        

        // Simpan data ke dalam array
        $data = [
            'kondisi' => $request->kondisi,
            'id_pengajuan' => $request->id_pengajuan,
            'tanggal_pengambilan'=>$request->tanggal_pengambilan,
   
        ];

        $dataJson = json_encode($data);

        try {
            $client = new Client();

            $response = $client->post(app('LinkApi') . '/admin/change-status', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => $dataJson,
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $data = json_decode($response->getBody(), true);
                $success = $data['success'];
                $message = $data['message'];

                if ($success) {
                    Alert::success('Sukses', $message);
                
                } else {
                    if ($message == "Kendaraan sudah pernah ditambahkan") {
                        Alert::warning('Perhatian', $message);
                    } else {
                        Alert::error('Gagal', $message);
                    }
                }
            } else {
                Alert::error('Gagal', 'Terjadi kesalahan saat mengirim data ke API');
                
            }
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
        }

        return redirect()->route('akta-kelahiran.index');
    }
}