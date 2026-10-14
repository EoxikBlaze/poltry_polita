<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaModel extends Model
{
    protected $table = 'data_pekerja';
    protected $primaryKey = 'id_pekerja';
    protected $allowedFields = ['nama_pekerja', 'no_hp_pekerja', 'gajih_pekerja'];
    protected $returnType = 'array';

    public function getAllPekerja()
    {
        return $this->findAll();
    }
}
