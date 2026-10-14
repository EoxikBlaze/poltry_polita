<?php

namespace App\Models;

use CodeIgniter\Model;

class KandangModel extends Model
{
    protected $table = 'kandang';
    protected $primaryKey = 'id_kandang';
    protected $allowedFields = ['id_pekerja', 'nama_penanggung_jawab', 'lokasi', 'kapasitas', 'tanggal_pembuatan', 'nama_kandang'];
    protected $returnType = 'array';

    public function getKandang($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }
    public function getKandangwithPekerja()
    {
        return $this->db->table('kandang')
            ->select('kandang.*, pekerja.id_pekerja, pekerja.nama_pekerja') // Menambahkan kolom nama_pekerja
            ->join('pekerja', 'kandang.id_pekerja = pekerja.id_pekerja')
            ->get()
            ->getResultArray();
    }
    public function addKandang($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }
    public function updateKandang($id, $data)
    {
        return $this->update($id, $data);
    }
    public function deleteKandang($id)
    {
        return $this->delete($id);
    }
}
