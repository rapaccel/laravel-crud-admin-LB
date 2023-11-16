<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\RequestException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Login extends Model
{
    public static function prosesLogin($email, $password)
    {
        try {
            $response = Http::post(app('LinkApi') . '/auth/login', [
                'email' => $email,
                'password' => $password,
            ]);

            $data = $response->json();
            
            if ($response->successful()) {
                $data = $response->json();
                return $data;
            } else {
                return ['success' => false, 'message' => 'Server tidak merespons'];
            }
        } catch (RequestException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Terjadi kesalahan saat menghubungi server'];
        }
    }
}
