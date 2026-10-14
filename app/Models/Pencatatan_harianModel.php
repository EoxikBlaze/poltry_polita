<?php

namespace App\Models;

use CodeIgniter\Model;

class Pencatatan_harianModel extends Model
{
    protected $table = 'pencatatan_harian';
    protected $primaryKey = 'id_pencatatan_harian';
    protected $allowedFields = [
        'id_kandang',
        'id_siklus_ayam',
        'nama_kandang_pencatatan',
        'minggu_siklus_pencatatan',
        'tanggal_pencatatan',
        'tambahan_ayam',
        'ayam_mati',
        'utuh_butir_pencatatan',
        'utuh_kg_pencatatan',
        'retak_butir_pencatatan',
        'retak_kg_pencatatan',
        'putih_butir_pencatatan',
        'putih_kg_pencatatan',
        'total_butir_pencatatan',
        'total_kg_pencatatan'
    ];
    protected $returnType = 'array';
    public function getPencatatanHarian($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }
    public function getAllPencatatan()
    {
        return $this->findAll();
    }
    public function getPencatatanWithKandang()
    {
        return $this->db->table($this->table)
            ->select('pencatatan_harian.*, kandang.nama_kandang, siklus_ayam.minggu_siklus') // Menambahkan data dari tabel terkait
            ->join('kandang', 'pencatatan_harian.id_kandang = kandang.id_kandang')
            ->join('siklus_ayam', 'pencatatan_harian.id_siklus_ayam = siklus_ayam.id_siklus')
            ->get()
            ->getResultArray();
    }
    public function addPencatatanHarian($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }
    public function updatePencatatanHarian($id, $data)
    {
        return $this->update($id, $data);
    }
    public function deletePencatatanHarian($id)
    {
        return $this->delete($id);
    }
    public function getById($id)
    {
        return $this->where('id_pencatatan_harian', $id)->first();
    }

    // Fungsi untuk menghapus data
    public function deleteById($id)
    {
        return $this->delete($id);
    }
}
