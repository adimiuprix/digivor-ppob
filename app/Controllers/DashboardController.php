<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\InvoiceModel;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();

        // Dapatkan data user dari session
        $userId = session()->get('id_user');

        // Dapatkan data user dari database
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        $nama = $user['username'];
        $email = $user['email'];
        $saldo = $user['saldo'];

        return view('dashboard', compact('nama', 'email', 'saldo', 'categories'));
    }

    public function logTransaction(){
        $userId = session()->get('id_user');
        $invoiceModel = new InvoiceModel();
        $logTransactions = $invoiceModel->where('id_buyer', $userId)->findAll();

        return view('logs', compact('logTransactions'));
    }
}
