<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\RequestException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KIA extends Model
{
    public static function getDataKia()
    {
        try {
            $response = Http::get(app('LinkApi') . '/admin/data-pengajuan-kia');

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
