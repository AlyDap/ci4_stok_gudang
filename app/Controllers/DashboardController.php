<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        // $session = session();
        // return redirect()->to(base_url('LoginController'));
        // if (session('jenis') != 'd') return redirect()->to('/loginController');
        // var_dump(session('foto_user'));
        if (session('jenis') == 'Besar') {
            $data = [
                'title' => 'Dashboard Besar'
            ];
            return view('dashboardView', $data);
        }
        if (session('jenis') == 'Kecil') {
            $data = [
                'title' => 'Dashboard Besar'
            ];

            return view('dashboardView2', $data);
        }
        // return view('loginView');
        return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
    }
    public function produk()
    {
        // return redirect()->to(base_url('LoginController'));
        // if (session('jenis') != 'd') return redirect()->to('/loginController');
        $data = [
            'title' => 'Produk Besar'
        ];
        if (session('jenis') == 'Besar') return view('adminBesar/produkView', $data);
        // if (session('jenis') == 'Kecil') return view('dashboardView2');
        // return view('loginView');
        return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
    }
    public function transaksi()
    {
        // return redirect()->to(base_url('LoginController'));
        // if (session('jenis') != 'd') return redirect()->to('/loginController');
        $data = [
            'title' => 'Transaksi Besar'
        ];
        if (session('jenis') == 'Besar') return view('adminBesar/transaksiView', $data);
        // if (session('jenis') == 'Kecil') return view('dashboardView2');
        // return view('loginView');
        return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
    }
}
