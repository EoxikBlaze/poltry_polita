<?php

namespace App\Controllers;

use App\Models\KandangModel;
use App\Models\PekerjaModel;
use App\Models\Pencatatan_harianModel;
use App\Models\Siklus_ayamModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $kandangModel = new KandangModel();
        $siklusModel = new Siklus_ayamModel();
        $pencatatanModel = new Pencatatan_harianModel();
        $pekerjaModel = new PekerjaModel();

        $data = [
            'title' => 'Dashboard',
            'jumlahKandang' => count($kandangModel->findAll()),
            'jumlahSiklus' => count($siklusModel->findAll()),
            'jumlahPekerja' => count($pekerjaModel->findAll()),
            'pencatatan' => $pencatatanModel->findAll(),
        ];

        $header['title'] = 'Dashboard';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('dashboard/index', $data);
        echo view('partial/footer');
        echo view('partial/animasipreload');
    }
}
