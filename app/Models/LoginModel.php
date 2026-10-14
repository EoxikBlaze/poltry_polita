<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_lengkap', 'nomor_telepon', 'username', 'password', 'level'];
    protected $returnType = 'array';
}
