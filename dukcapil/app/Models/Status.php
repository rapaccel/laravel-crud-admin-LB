<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\RequestException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    public static function posthadir($dataJson)
    {
        try {
            $client = new Client();

            $response = $client->post(app('LinkApi') . '/admin/change-status', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => $dataJson,
            ]);
     
            $statusCode = $response->getStatusCode();
            $data = $response->getBody()->getContents();
            $responseData = json_decode($data, true);
     
            if ($statusCode === 200) {
                if (isset($responseData['success']) && $responseData['success']) {
                    return $responseData;
                } else {
                    return $responseData;
                }
            } else {
                return $responseData;
            }
        } catch (RequestException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Terjadi kesalahan saat menghubungi server. code : ERR01'];
        }
    }
}
