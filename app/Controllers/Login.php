<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('id_user')) {
            return redirect()->to('/dashboard');
        }

        $header['title'] = 'Login Pendataan Politry Polita';
        echo view('partial/login', $header);
        echo view('login/index');
    }

    public function cek_login()
    {
        $LoginModel = new LoginModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $LoginModel->where('username', $username)->first();

        if ($user) {
            if (password_verify((string) $password, $user['password'])) {
                // Session hanya diisi SETELAH login berhasil
                session()->set([
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                ]);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/login')->with('error', '<div class="alert alert-danger">Password yang digunakan salah!</div>');
            }
        } else {
            return redirect()->to('/login')->with('error', '<div class="alert alert-danger">Username yang digunakan salah!</div>');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('error', '<div class="alert alert-success">Anda berhasil logout</div>');
    }
}
