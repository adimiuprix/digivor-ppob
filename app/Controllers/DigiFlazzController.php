<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\InvoiceModel;

class DigiFlazzController extends BaseController
{
    use ResponseTrait;

    // Callback digiflazz
    public function callback()
    {
        // Secret value provided by Digiflazz
        // $secret = 'aplikasitest';

        // Get the raw post data
        $post_data = file_get_contents('php://input');

        // Direktori tempat menyimpan file
        $folder = 'public/';

        // Nama file (misalnya timestamp saat ini)
        $filename = $folder . 'data_' . date('YmdHis') . '.txt';

        // Menyimpan data ke dalam file .txt
        file_put_contents($filename, $post_data);

        // // Generate HMAC signature
        // $signature = hash_hmac('sha1', $post_data, $secret);

        // // Verify the signature
        // if ($request->getHeaderLine('X-Hub-Signature') === 'sha1=' . $signature) {
        //     // Signature is valid, process the webhook data
        //     $webhook_data = json_decode($request->getBody(), true);

        //     // Handle the webhook data here, for example:
        //     $this->handleWebhookData($webhook_data);

        //     // Return a success response
        //     return $this->respond('Webhook received successfully', 200);
        // } else {
        //     // Signature is not valid, reject the request or handle accordingly
        //     return $this->failUnauthorized('Invalid signature');
        // }
    }

    // Function to handle the webhook data
    // private function handleWebhookData($data)
    // {
    //     // Update transaction status from "pending" to "success"
    //     $transactionModel = new InvoiceModel();
    //     $trx_id = $data['data']['trx_id'];
    //     $new_status = 'success';
    //     $transactionModel->where('trx_id', $trx_id)->set('status', $new_status)->update();
    // }






    // Di bawah ini code backup
    
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
