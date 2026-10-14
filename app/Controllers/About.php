<?php
namespace App\Controllers;
class About extends BaseController
{
    public function index()
    {
        $header['title'] = 'About Us';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('about/index');
        echo view('partial/footer');
    }
}