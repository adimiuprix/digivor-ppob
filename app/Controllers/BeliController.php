<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\InvoiceModel;

class BeliController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        return view('beli', compact('products'));
    }

    public function proses(){
        // Get session user ID
        $idUser = session()->get('id_user');

        // Hash ID
        $timestamp = time();
        $seed = 'Masukkan sembarang string';
        $combined = $timestamp . $seed;
        $encrypted = md5($combined);
        $hashID = strtoupper(substr($encrypted, 0, 8));

        $data = [
            'id_buyyer' => $idUser,
            'nama_product' => 'DANA',
            'code' => $this->request->getPost('product'),
            'harga' => $this->request->getPost('harga'),
            'hash_id' => $hashID,
            'status' => 'pending',
            'tujuan' => $this->request->getPost('tujuan'),
        ];

        $invoice = new InvoiceModel();
        $invoice->insert($data);

        // redirect ke invoice dengan membawa hashID
        return redirect()->to('invoice/' . $hashID);
    }

    public function invoice($hash){
        $invoiceModel = new InvoiceModel();
        $invoice = $invoiceModel->where('hash_id', $hash)->first();

        // Cek apakah invoice ditemukan
        if ($invoice) {
            // Jika ditemukan, tampilkan data invoice
            return view('invoice', ['invoice' => $invoice]);
        } else {
            // Jika tidak ditemukan, redirect atau tampilkan pesan error
            return redirect()->to('beli');
        }
    }

    public function checkout(){
        
        // Sensitif
        $username = "cazekoD7ELKg";

        // dev-a4738eb0-3ef5-11ed-beae-fd9939a68b2b
        // a3bd1141-63f8-5885-9d9a-c52bbcf2c97b
        $apikey = "dev-a4738eb0-3ef5-11ed-beae-fd9939a68b2b";   

        // variable
        // $buyer_sku_code = $this->request->getPost('code');   // production
        $buyer_sku_code = 'xld10';  // test case
        $customer_no = '087800001233'; // production gunakan >>>> $this->request->getPost('tujuan');
        $ref_id = $this->request->getPost('hash');
        $sign = md5($username . $apikey . $ref_id);

        // Data permintaan API
        $data = array(
            'ref_id' => $ref_id,
            'testing' => true,
            'username' => $username,
            'buyer_sku_code' => $buyer_sku_code,
            'customer_no' => $customer_no,
            'sign' => $sign,
        );
        
        // Mengirim permintaan ke API
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        
        $response = curl_exec($ch);
        
        curl_close($ch);
        
        echo $response;
    }
}
