<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function login()
    {
        // Tampilkan halaman login
        return view('auth/login');
    }

    public function authenticate()
    {
        // Validasi input
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
        ];

        if (!$this->validate($rules)) {
            // Terjadi error validasi, tampilkan kembali halaman login dengan pesan error
            return view('auth/login', [
                'validation' => $this->validator,
            ]);
        }

        // Cek email dan password di database
        $userModel = new UserModel();
        $user = $userModel->where('email', $this->request->getVar('email'))->first();

        if (!$user || !password_verify($this->request->getVar('password'), $user['password'])) {
            // Email atau password salah, tampilkan pesan error
            session()->setFlashdata('error', 'Email atau password salah.');
            return redirect()->to('/login');
        }

        // Login berhasil, set session dan redirect ke halaman home
        session()->set('logged_in', true);
        session()->set('id_user', $user['id_user']);
        return redirect()->to('dashboard');
    }

    public function logout()
    {
        // Hapus session dan redirect ke halaman login
        session()->remove('logged_in');
        session()->remove('id_user');
        return redirect()->to('/login');
    }
}
