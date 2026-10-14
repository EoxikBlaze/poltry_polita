<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data['title'] = 'Data User';
        $data['getUser'] = $this->UserModel->getUser();
        $header['title'] = 'Data User';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('user/index', $data);
        echo view('partial/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Data User';
        $header['title'] = 'Tambah Data User';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('user/create', $data);
        echo view('partial/footer');
    }

    public function add()
    {
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getPost('level'),
        ];
        $this->UserModel->addUser($data);
        echo '<script>
            alert("Sukses Tambah Data User");
            window.location="' . base_url('user') . '";
        </script>';
    }

    public function update($id = null)
    {
        $id = $id ?? $this->request->getPost('id_user');
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'username' => $this->request->getPost('username'),
            'level' => $this->request->getPost('level'),
        ];

        // Password hanya diganti jika diisi (biarkan kosong untuk mempertahankan password lama)
        $password = $this->request->getPost('password');
        if ($password !== null && $password !== '') {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $existingData = $this->UserModel->find($id);
        if ($existingData) {
            $this->UserModel->update($id, $data);
            echo '<script>
                alert("Sukses Edit Data User");
                window.location="' . base_url('user') . '";
            </script>';
        } else {
            echo '<script>
                alert("Data User Tidak Ditemukan");
                window.location="' . base_url('user') . '";
            </script>';
        }
    }

    public function edit($id)
    {
        $getUser = $this->UserModel->getUser($id);
        if ($getUser) {
            $data['title'] = 'Edit User';
            $data['user'] = $getUser;
            $header['title'] = 'Edit User';
            echo view('partial/header', $header);
            echo view('partial/top_menu');
            echo view('partial/side_menu');
            echo view('user/edit', $data);
            echo view('partial/footer');
        } else {
            return redirect()->to(base_url('user'))->with('error', 'Data User Tidak ditemukan');
        }
    }

    public function delete($id)
    {
        $getUser = $this->UserModel->getUser($id);
        if ($getUser) {
            $this->UserModel->deleteUser($id);
            echo '<script>
                alert("Hapus Data User Sukses");
                window.location="' . base_url('user') . '";
            </script>';
        } else {
            echo '<script>
                alert("Hapus Gagal! Data User ' . addslashes($id) . ' Tidak ditemukan");
                window.location="' . base_url('user') . '";
            </script>';
        }
    }
}
