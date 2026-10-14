<?php

namespace App\Controllers;

use App\Models\KandangModel;
use App\Models\Pencatatan_harianModel;
use App\Models\Siklus_ayamModel;

class Pencatatan_harian extends BaseController
{
    protected $Pencatatan_harianModel;
    protected $Siklus_ayamModel;
    protected $KandangModel;

    public function __construct()
    {
        $this->Pencatatan_harianModel = new Pencatatan_harianModel();
        $this->Siklus_ayamModel = new Siklus_ayamModel();
        $this->KandangModel = new KandangModel();
    }

    // Menampilkan data pencatatan harian
    public function index()
    {
        $data['title'] = 'Pencatatan Harian Ayam';
        $data['getPencatatan'] = $this->Pencatatan_harianModel->getAllPencatatan();
        $header['title'] = 'Pencatatan Harian Ayam';

        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('pencatatan_harian/index', $data);
        echo view('partial/footer');
        echo view('partial/animasipreload');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pencatatan Harian',
            'kandangMap' => $this->buildKandangMap(),
            'siklusMap' => $this->buildSiklusMap(),
        ];
        $header['title'] = 'Tambah Pencatatan Harian';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('pencatatan_harian/create', $data);
        echo view('partial/footer');
    }

    public function add()
    {
        $id_kandang = $this->request->getPost('id_kandang');
        $id_siklus_ayam = $this->request->getPost('id_siklus_ayam');
        $kandang = $this->KandangModel->find($id_kandang);
        $siklus = $this->Siklus_ayamModel->find($id_siklus_ayam);

        if ($kandang && $siklus) {
            $data = $this->buildDataFromRequest($id_kandang, $id_siklus_ayam, $kandang, $siklus);

            $this->Pencatatan_harianModel->insert($data);

            echo '<script>
                alert("Sukses Tambah Data Pencatatan Harian");
                window.location="' . base_url('pencatatan_harian') . '";
            </script>';
        } else {
            echo '<script>
                alert("Data Kandang atau Siklus Tidak Ditemukan");
                window.location="' . base_url('pencatatan_harian/create') . '";
            </script>';
        }
    }

    public function edit($id)
    {
        $pencatatan = $this->Pencatatan_harianModel->getById($id);
        if (!$pencatatan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan.');
        }

        $kandangMap = $this->buildKandangMap();
        $siklusMap = $this->buildSiklusMap();

        $data = [
            'title' => 'Edit Pencatatan Harian',
            'pencatatan' => $pencatatan,
            'kandangMap' => $kandangMap,
            'siklusMap' => $siklusMap,
        ];
        $header['title'] = 'Edit Pencatatan Harian';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('pencatatan_harian/edit', $data);
        echo view('partial/footer');
    }

    // Fungsi untuk memperbarui data
    public function update($id = null)
    {
        $id = $id ?? $this->request->getPost('id_pencatatan_harian');
        $id_kandang = $this->request->getPost('id_kandang');
        $id_siklus_ayam = $this->request->getPost('id_siklus_ayam');
        $kandang = $this->KandangModel->find($id_kandang);
        $siklus = $this->Siklus_ayamModel->find($id_siklus_ayam);

        if (!$kandang || !$siklus) {
            return redirect()->to(base_url('pencatatan_harian'))->with('error', 'Data Kandang atau Siklus Tidak Ditemukan.');
        }

        $data = $this->buildDataFromRequest($id_kandang, $id_siklus_ayam, $kandang, $siklus);

        $this->Pencatatan_harianModel->update($id, $data);

        return redirect()->to(base_url('pencatatan_harian'))->with('message', 'Data berhasil diperbarui.');
    }

    // Fungsi untuk menghapus data
    public function delete($id)
    {
        $this->Pencatatan_harianModel->deleteById($id);
        return redirect()->to(base_url('pencatatan_harian'))->with('message', 'Data berhasil dihapus.');
    }

    private function buildDataFromRequest($id_kandang, $id_siklus_ayam, $kandang, $siklus): array
    {
        $utuh_butir = (int) $this->request->getPost('utuh_butir_pencatatan');
        $retak_butir = (int) $this->request->getPost('retak_butir_pencatatan');
        $putih_butir = (int) $this->request->getPost('putih_butir_pencatatan');
        $utuh_kg = (float) $this->request->getPost('utuh_kg_pencatatan');
        $retak_kg = (float) $this->request->getPost('retak_kg_pencatatan');
        $putih_kg = (float) $this->request->getPost('putih_kg_pencatatan');

        return [
            'id_kandang' => $id_kandang,
            'id_siklus_ayam' => $id_siklus_ayam,
            'nama_kandang_pencatatan' => $kandang['nama_kandang'],
            'minggu_siklus_pencatatan' => $siklus['minggu_siklus'],
            'tanggal_pencatatan' => $this->request->getPost('tanggal_pencatatan'),
            'tambahan_ayam' => (int) $this->request->getPost('tambahan_ayam'),
            'ayam_mati' => (int) $this->request->getPost('ayam_mati'),
            'utuh_butir_pencatatan' => $utuh_butir,
            'utuh_kg_pencatatan' => $utuh_kg,
            'retak_butir_pencatatan' => $retak_butir,
            'retak_kg_pencatatan' => $retak_kg,
            'putih_butir_pencatatan' => $putih_butir,
            'putih_kg_pencatatan' => $putih_kg,
            'total_butir_pencatatan' => $utuh_butir + $retak_butir + $putih_butir,
            'total_kg_pencatatan' => $utuh_kg + $retak_kg + $putih_kg,
        ];
    }

    private function buildKandangMap(): array
    {
        $kandangMap = [];
        foreach ($this->KandangModel->findAll() as $kandang) {
            $kandangMap[$kandang['id_kandang']] = $kandang['nama_kandang'];
        }
        return $kandangMap;
    }

    private function buildSiklusMap(): array
    {
        $siklusMap = [];
        foreach ($this->Siklus_ayamModel->findAll() as $siklus) {
            $siklusMap[$siklus['id_siklus']] = "Siklus {$siklus['minggu_siklus']} (Kandang: {$siklus['nama_kandang_siklus']})";
        }
        return $siklusMap;
    }
}
