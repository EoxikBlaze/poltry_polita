<?php

namespace App\Controllers;

use App\Models\KandangModel;
use App\Models\PekerjaModel;

class Kandang extends BaseController
{
    protected $KandangModel;
    protected $PekerjaModel;

    public function __construct()
    {
        $this->KandangModel = new KandangModel();
        $this->PekerjaModel = new PekerjaModel();
    }

    public function index()
    {
        $kandang = $this->KandangModel->findAll();
        $pekerjaMap = $this->buildPekerjaMap();

        foreach ($kandang as &$kandangData) {
            $kandangData['nama_pekerja'] = $pekerjaMap[$kandangData['id_pekerja']] ?? 'Unknown';
        }
        unset($kandangData);

        $data['title'] = 'Data Kandang';
        $data['getKandang'] = $kandang;
        $header['title'] = 'Data Kandang';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('kandang/index', $data);
        echo view('partial/footer');
        echo view('partial/sort_by');
        echo view('partial/animasipreload');
    }

    public function create()
    {
        $data['title'] = 'Kandang';
        $data['pekerjaMap'] = $this->buildPekerjaMap();
        $header['title'] = 'Kandang';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('kandang/create', $data);
        echo view('partial/footer');
    }

    public function add()
    {
        $id_pekerja = $this->request->getPost('id_pekerja');
        $pekerja = $this->PekerjaModel->find($id_pekerja);

        if (!$pekerja) {
            echo '<script>
                alert("Penanggung jawab tidak ditemukan. Silakan pilih kembali.");
                window.location="' . base_url('kandang/create') . '";
            </script>';
            return;
        }

        $data = [
            'id_pekerja' => $id_pekerja,
            'nama_kandang' => $this->request->getPost('nama_kandang'),
            'lokasi' => $this->request->getPost('lokasi'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'tanggal_pembuatan' => $this->request->getPost('tanggal_pembuatan'),
            'nama_penanggung_jawab' => $pekerja['nama_pekerja'],
        ];

        $this->KandangModel->addKandang($data);
        echo '<script>
            alert("Sukses Tambah Data Kandang");
            window.location="' . base_url('kandang') . '";
        </script>';
    }

    public function update($id = null)
    {
        $id = $id ?? $this->request->getPost('id_kandang');
        $id_pekerja = $this->request->getPost('id_pekerja');
        $pekerja = $this->PekerjaModel->find($id_pekerja);

        if (!$pekerja) {
            echo '<script>
                alert("Penanggung jawab tidak ditemukan. Silakan pilih kembali.");
                window.location="' . base_url('kandang/edit/' . $id) . '";
            </script>';
            return;
        }

        $data = [
            'id_pekerja' => $id_pekerja,
            'nama_kandang' => $this->request->getPost('nama_kandang'),
            'lokasi' => $this->request->getPost('lokasi'),
            'kapasitas' => $this->request->getPost('kapasitas'),
            'tanggal_pembuatan' => $this->request->getPost('tanggal_pembuatan'),
            'nama_penanggung_jawab' => $pekerja['nama_pekerja'],
        ];

        $this->KandangModel->updateKandang($id, $data);
        echo '<script>
            alert("Sukses Edit Data Kandang");
            window.location="' . base_url('kandang') . '";
        </script>';
    }

    public function edit($id)
    {
        $kandang = $this->KandangModel->find($id);
        if (!$kandang) {
            return redirect()->to(base_url('kandang'))->with('error', 'Data tidak ditemukan!');
        }

        $data['title'] = 'Edit Kandang';
        $data['getKandang'] = $kandang;
        $data['pekerjaMap'] = $this->buildPekerjaMap();
        $header['title'] = 'Edit Kandang';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('kandang/edit', $data);
        echo view('partial/footer');
    }

    public function delete($id)
    {
        $getKandang = $this->KandangModel->getKandang($id);
        if ($getKandang) {
            $this->KandangModel->deleteKandang($id);
            echo '<script>
                alert("Hapus Data Kandang Sukses");
                window.location="' . base_url('kandang') . '";
            </script>';
        } else {
            echo '<script>
                alert("Hapus Gagal! Data Kandang ' . addslashes($id) . ' Tidak ditemukan");
                window.location="' . base_url('kandang') . '";
            </script>';
        }
    }

    private function buildPekerjaMap(): array
    {
        $pekerjaMap = [];
        foreach ($this->PekerjaModel->findAll() as $pekerja) {
            $pekerjaMap[$pekerja['id_pekerja']] = $pekerja['nama_pekerja'];
        }
        return $pekerjaMap;
    }
}
