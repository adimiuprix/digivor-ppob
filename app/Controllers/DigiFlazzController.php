<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DigiFlazzController extends BaseController
{
    // Callback digiflazz
    public function callback()
    {
        $secret_key = "dev-a4738eb0-3ef5-11ed-beae-fd9939a68b2b";

        // Mengambil data dari permintaan HTTP POST
        $data = file_get_contents('php://input');
        
        $sign = hash_hmac('sha1', $data, $secret_key);
        $data1 = json_decode($data, true);

        // check header x-hub-signature
        if (isset($header['x-hub-signature']) && request()->header('x-hub-signature') == 'sha1=' . $sign) {
            // JSON Decode Getcontent
            $data = json_decode($data, true);
            // Log data
            $response = [
                'status' => true,
                'message' => 'Success',
                'data' => json_encode($data),
            ];
            return $response;
        }
        $response = [
            'status' => true,
            'message' => 'Success',
            'data' => [
                'sign' => $sign,
                'result' => json_encode($data1) == "null" || null ? '' : json_encode($data1),
            ],
        ];
        return $response;
    }









    
    public function callbackBackup()
    {
        $secret_key = "dev-a4738eb0-3ef5-11ed-beae-fd9939a68b2b";
        $data = file_get_contents('php://input');
        $sign = hash_hmac('sha1', $data, $secret_key);
        $data1 = json_decode($data, true);

        // check header x-hub-signature
        if (isset($header['x-hub-signature']) && request()->header('x-hub-signature') == 'sha1=' . $sign) {
            // JSON Decode Getcontent
            $data = json_decode($data, true);
            // Log data
            $response = [
                'status' => true,
                'message' => 'Success',
                'data' => json_encode($data),
            ];
            return $response;
        }
        $response = [
            'status' => true,
            'message' => 'Success',
            'data' => [
                'sign' => $sign,
                'result' => json_encode($data1) == "null" || null ? '' : json_encode($data1),
            ],
        ];
        return $response;
    }

}
