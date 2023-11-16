<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\RequestException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ektp extends Model
{
    public static function getDataEktp()
    {
        try {
            $response = Http::get(app('LinkApi') . '/admin/data-pengajuan-ktp');

            $data = $response->json();

            if ($response->successful()) {
                $data = $response->json();
                return $data;
            } else {
                return ['success' => false, 'message' => 'Server tidak merespons'];
            }
        } catch (RequestException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Terjadi kesalahan saat menghubungi server. code : ERR01'];
        }
    }
}
