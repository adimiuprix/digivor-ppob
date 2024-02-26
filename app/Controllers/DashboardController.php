<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\InvoiceModel;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }

        // Dapatkan data user dari session
        $userId = session()->get('id_user');

        // Dapatkan data user dari database
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        $email = $user['email'];
        $saldo = $user['saldo'];

        return view('dashboard', compact('email', 'saldo'));
    }

    public function logTransaction(){
        $userId = session()->get('id_user');
        $invoiceModel = new InvoiceModel();
        $logTransactions = $invoiceModel->where('id_buyyer', $userId)->findAll();

        return view('logs', compact('logTransactions'));
    }
}
