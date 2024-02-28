<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\InvoiceModel;

class BeliController extends BaseController
{
    public function purchase(){
        $userModel = new UserModel();
    
        // Get session user ID
        $idUser = session()->get('id_user');
    
        $dataUser = $userModel->find($idUser);

        if($dataUser){
            $saldo = $dataUser['saldo'];
            $namaProduct = $this->request->getPost('name_product');
            $code = $this->request->getPost('code_product');
            $harga = $this->request->getPost('price');
            $tujuan = $this->request->getPost('tujuan');

            if($saldo >= $harga && !empty($tujuan)){
                // Hash ID
                $timestamp = time();
                $seed = 'Masukkan sembarang string';
                $combined = $timestamp . $seed;
                $encrypted = md5($combined);
                $hashID = strtoupper(substr($encrypted, 0, 8));
                
                // Memasukkan data ini ke table invoice dengan status Pending
                $data = [
                    'id_buyer' => $idUser,  // Dari id_user session
                    'nama_product' => $namaProduct, // Nama Produk
                    'code' => $code,    // Code produk
                    'harga' => $harga,  // Harga produk
                    'hash_id' => $hashID,   // Di generate system
                    'status' => 'Pending',  // Di setel Pending untuk awal
                    'tujuan' => $tujuan,    // Dari Form
                ];
    
                $invoice = new InvoiceModel();
                $invoice->insert($data);
    
                // redirect ke invoice dengan membawa hashID
                return redirect()->to('invoice/' . $hashID);
            } else {
                $notify = ($saldo < $harga) ? "Saldo kurang!!!" : "Nomor tujuan tidak boleh kosong!!!";
                return redirect()->back()->with('notify', $notify);
            }
        } else {
            $notify = "Pengguna tidak ditemukan";
            return redirect()->back()->with('notify', $notify);
        }
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
            return redirect()->to('dashboard');
        }
    }

    public function checkout(){
        $userModel = new UserModel();
    
        // Get session user ID
        $idUser = session()->get('id_user');
    
        $dataUser = $userModel->find($idUser);

        if($dataUser){
            $saldo = $dataUser['saldo'];
            $harga = $this->request->getPost('harga');

            if($saldo >= $harga){
                // Sensitif
                $username = "cazekoD7ELKg";
                // dev-a4738eb0-3ef5-11ed-beae-fd9939a68b2b
                // a3bd1141-63f8-5885-9d9a-c52bbcf2c97b
                $apikey = "dev-a4738eb0-3ef5-11ed-beae-fd9939a68b2b";   
        
                // variable
                // $buyer_sku_code = $this->request->getPost('code');   // production
                $buyer_sku_code = 'xld10';  // test case
                $customer_no = '087800001230'; // production gunakan >>>> $this->request->getPost('tujuan');
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
                
                // Ubah JSON menjadi array PHP
                $dataResponse = json_decode($response, true);
                $status = $dataResponse['data']['status'];
        
                $invoiceModel = new InvoiceModel();
                $invoiceModel->set('status', $status)->where('status', 'Pending')->update();

                // Kurangi saldo user sebanyak harga produk, lalu update saldonya
                $newSaldo = $saldo - $harga;
                $userModel->find($idUser);
                $userModel->update($idUser, ['saldo' => $newSaldo]);

                $notify = "berhasil checkout.";
                return redirect()->to('dashboard')->with('notify', $notify);
            } else {
                $notify = "Saldo kurang!!!";
                return redirect()->to('dashboard')->with('notify', $notify);
            }
        }
    }
}
