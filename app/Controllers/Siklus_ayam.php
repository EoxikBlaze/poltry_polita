<?php

namespace App\Controllers;

use App\Models\KandangModel;
use App\Models\Siklus_ayamModel;

class Siklus_ayam extends BaseController
{
    protected $Siklus_ayamModel;
    protected $KandangModel;

    public function __construct()
    {
        $this->Siklus_ayamModel = new Siklus_ayamModel();
        $this->KandangModel = new KandangModel();
    }

    public function index()
    {
        $data['title'] = 'Data Siklus Ayam';
        $data['getSiklusAyam'] = $this->Siklus_ayamModel->getSiklus_ayamwithKandang();
        $header['title'] = 'Data Siklus Ayam';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('siklus_ayam/index', $data);
        echo view('partial/footer');
        echo view('partial/animasipreload');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Siklus Ayam',
            'kandangMap' => $this->buildKandangMap(),
        ];
        $header['title'] = 'Tambah Siklus Ayam';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('siklus_ayam/create', $data);
        echo view('partial/footer');
    }

    public function add()
    {
        $id_kandang = $this->request->getPost('id_kandang');
        $kandang = $this->KandangModel->find($id_kandang);

        if ($kandang) {
            $data = [
                'id_kandang' => $id_kandang,
                'nama_kandang_siklus' => $kandang['nama_kandang'],
                'minggu_siklus' => $this->request->getPost('minggu_siklus'),
                'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
                'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
                'jumlah_ayam' => $this->request->getPost('jumlah_ayam'),
                'total_telor_utuh' => $this->request->getPost('total_telor_utuh'),
                'jumlah_ikat' => $this->request->getPost('jumlah_ikat'),
            ];

            $this->Siklus_ayamModel->addSiklus_ayam($data);
            echo '<script>
                alert("Sukses Tambah Data Siklus Ayam");
                window.location="' . base_url('siklus_ayam') . '";
            </script>';
        } else {
            echo '<script>
                alert("Kandang Tidak Ditemukan");
                window.location="' . base_url('siklus_ayam/create') . '";
            </script>';
        }
    }

    public function edit($id)
    {
        $siklus_ayam = $this->Siklus_ayamModel->find($id);
        if (!$siklus_ayam) {
            return redirect()->to(base_url('siklus_ayam'))->with('error', 'Data tidak ditemukan!');
        }

        $data['title'] = 'Edit Siklus Ayam';
        $data['getSiklus'] = $siklus_ayam;
        $data['kandangMap'] = $this->buildKandangMap();
        $header['title'] = 'Edit Siklus Ayam';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('siklus_ayam/edit', $data);
        echo view('partial/footer');
    }

    public function update()
    {
        $id = $this->request->getPost('id_siklus_ayam');
        $id_kandang = $this->request->getPost('id_kandang');

        $data_siklus = $this->Siklus_ayamModel->find($id);
        if (!$data_siklus) {
            echo '<script>
                alert("Data Siklus Ayam Tidak Ditemukan");
                window.location="' . base_url('siklus_ayam') . '";
            </script>';
            return;
        }

        $kandang = $this->KandangModel->find($id_kandang);

        if ($kandang) {
            $data = [
                'id_kandang' => $id_kandang,
                'nama_kandang_siklus' => $kandang['nama_kandang'],
                'minggu_siklus' => $this->request->getPost('minggu_siklus'),
                'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
                'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
                'jumlah_ayam' => $this->request->getPost('jumlah_ayam'),
                'total_telor_utuh' => $this->request->getPost('total_telor_utuh'),
                'jumlah_ikat' => $this->request->getPost('jumlah_ikat'),
            ];

            if ($this->Siklus_ayamModel->update($id, $data)) {
                echo '<script>
                    alert("Sukses Update Data Siklus Ayam");
                    window.location="' . base_url('siklus_ayam') . '";
                </script>';
            } else {
                echo '<script>
                    alert("Gagal Update Data Siklus Ayam");
                    window.location="' . base_url('siklus_ayam/edit/' . $id) . '";
                </script>';
            }
        } else {
            echo '<script>
                alert("Kandang Tidak Ditemukan");
                window.location="' . base_url('siklus_ayam/edit/' . $id) . '";
            </script>';
        }
    }

    public function delete($id)
    {
        $siklus = $this->Siklus_ayamModel->getSiklus_ayam($id);
        if ($siklus) {
            if ($this->Siklus_ayamModel->deleteSiklus_ayam($id)) {
                echo '<script>
                    alert("Sukses Hapus Data Siklus Ayam");
                    window.location="' . base_url('siklus_ayam') . '";
                </script>';
            } else {
                echo '<script>
                    alert("Gagal Hapus Data Siklus Ayam");
                    window.location="' . base_url('siklus_ayam') . '";
                </script>';
            }
        } else {
            echo '<script>
                alert("Data Siklus Ayam Tidak Ditemukan");
                window.location="' . base_url('siklus_ayam') . '";
            </script>';
        }
    }

    private function buildKandangMap(): array
    {
        $kandangMap = [];
        foreach ($this->KandangModel->findAll() as $kandang) {
            $kandangMap[$kandang['id_kandang']] = $kandang['nama_kandang'];
        }
        return $kandangMap;
    }
}
