<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $header['title'] = 'Home';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('home');
        echo view('partial/footer');
        echo view('partial/animasipreload');
    }
}
