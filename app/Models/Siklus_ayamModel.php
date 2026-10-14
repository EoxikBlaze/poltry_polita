<?php

namespace App\Models;

use CodeIgniter\Model;

class Siklus_ayamModel extends Model
{
    protected $table = 'siklus_ayam';
    protected $primaryKey = 'id_siklus';
    protected $allowedFields = ['id_kandang', 'minggu_siklus', 'nama_kandang_siklus', 'tanggal_mulai', 'tanggal_selesai', 'jumlah_ayam', 'total_telor_utuh', 'jumlah_ikat'];
    protected $returnType = 'array';

    public function getSiklus_ayam($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }
    public function getSiklus_ayamwithKandang()
    {
        return $this->db->table('siklus_ayam')
            ->select('siklus_ayam.*, kandang.id_kandang')
            ->join('kandang', 'siklus_ayam.id_kandang = kandang.id_kandang')
            ->get()
            ->getResultArray();
    }
    public function addSiklus_ayam($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }
    public function updateSiklus_ayam($id, $data)
    {
        return $this->update($id, $data);
    }
    public function deleteSiklus_ayam($id)
    {
        return $this->delete($id);
    }
}