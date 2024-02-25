<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function index()
    {
        // Tampilkan halaman register
        return view('auth/register');
    }

    public function save()
    {
        // Validasi input
        $rules = [
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
        ];

        if (!$this->validate($rules)) {
            // Terjadi error validasi, tampilkan kembali halaman register dengan pesan error
            return view('auth/register', [
                'validation' => $this->validator,
            ]);
        }

        // Simpan data user ke database
        $userModel = new UserModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];
        $userModel->insert($data);

        // Tampilkan pesan sukses dan redirect ke halaman login
        session()->setFlashdata('success', 'Registrasi berhasil! Silahkan login.');
        return redirect()->to('/login');
    }
}
