<?php
namespace App\Controllers;

use App\Models\KandangModel;

class Monitoring extends BaseController
{
    protected $kandangModel;

    public function __construct()
    {
        $this->kandangModel = new KandangModel();
    }
    public function index()
    {
        $data['getKandang'] = $this->kandangModel->findAll();
        $data['title'] = 'Monitoring';

        $header['title'] = 'Monitoring';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('monitoring/index', $data);
        echo view('partial/footer');
    }
}