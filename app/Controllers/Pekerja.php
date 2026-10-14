<?php

namespace App\Controllers;

use App\Models\PekerjaModel;

class Pekerja extends BaseController
{
    protected $PekerjaModel;

    public function __construct()
    {
        $this->PekerjaModel = new PekerjaModel();
    }

    public function index()
    {
        $data['title'] = 'Data Pekerja';
        $data['getPekerja'] = $this->PekerjaModel->getAllPekerja();
        $header['title'] = 'Data Pekerja';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('pekerja/index', $data);
        echo view('partial/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Pekerja';
        $header['title'] = 'Tambah Data Pekerja';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('pekerja/create', $data);
        echo view('partial/footer');
    }

    public function add()
    {
        $data = [
            'nama_pekerja' => $this->request->getPost('nama_pekerja'),
            'no_hp_pekerja' => $this->request->getPost('no_hp_pekerja'),
            'gajih_pekerja' => $this->request->getPost('gajih_pekerja'),
        ];
        $this->PekerjaModel->insert($data);
        echo '<script>
            alert("Sukses Tambah Data Pekerja");
            window.location="' . base_url('pekerja') . '";
        </script>';
    }

    public function edit($id)
    {
        $pekerja = $this->PekerjaModel->find($id);
        if (!$pekerja) {
            return redirect()->to(base_url('pekerja'))->with('error', 'Data Pekerja tidak ditemukan!');
        }

        $data['title'] = 'Edit Data Pekerja';
        $data['pekerja'] = $pekerja;
        $header['title'] = 'Edit Data Pekerja';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('pekerja/edit', $data);
        echo view('partial/footer');
    }

    public function update($id = null)
    {
        $id = $id ?? $this->request->getPost('id_pekerja');
        $data = [
            'nama_pekerja' => $this->request->getPost('nama_pekerja'),
            'no_hp_pekerja' => $this->request->getPost('no_hp_pekerja'),
            'gajih_pekerja' => $this->request->getPost('gajih_pekerja'),
        ];

        if ($this->PekerjaModel->find($id)) {
            $this->PekerjaModel->update($id, $data);
            echo '<script>
                alert("Sukses Edit Data Pekerja");
                window.location="' . base_url('pekerja') . '";
            </script>';
        } else {
            echo '<script>
                alert("Data Pekerja Tidak Ditemukan");
                window.location="' . base_url('pekerja') . '";
            </script>';
        }
    }

    public function delete($id)
    {
        if ($this->PekerjaModel->find($id)) {
            $this->PekerjaModel->delete($id);
            echo '<script>
                alert("Hapus Data Pekerja Sukses");
                window.location="' . base_url('pekerja') . '";
            </script>';
        } else {
            echo '<script>
                alert("Hapus Gagal! Data Pekerja ' . addslashes($id) . ' Tidak ditemukan");
                window.location="' . base_url('pekerja') . '";
            </script>';
        }
    }
}
