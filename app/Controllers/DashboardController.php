<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        // return redirect()->to(base_url('LoginController'));
        // if (session('jenis') != 'd') return redirect()->to('/loginController');
        $data = [
            'title' => 'Dashboard Besar'
        ];
        if (session('jenis') == 'Besar') return view('dashboardView',$data);
        if (session('jenis') == 'Kecil') return view('dashboardView2');
        // return view('loginView');
        return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
    }

    
}
