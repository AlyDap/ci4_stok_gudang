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
        $data = ['kotak' => 'ada'];
        if (session('jenis') == 'besar') {
            $data = [
                'title' => 'Dashboard Besar'
            ];
            return view('dashboardView', $data);
        }
        if (session('jenis') == 'kecil') {
            $data = [
                'title' => 'Dashboard Kecil'
            ];

            return view('dashboardView2', $data);
        }
        // return view('loginView');
        return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
    }
    public function produk()
    {
        $data = ['kotak' => 'tidak'];

        // return redirect()->to(base_url('LoginController'));
        // if (session('jenis') != 'd') return redirect()->to('/loginController');
        $data = [
            'title' => 'Produk Besar'
        ];
        if (session('jenis') == 'besar') {
            return view('adminBesar/produkView', $data);
        }
        // if (session('jenis') == 'kecil') return view('dashboardView2');
        // return view('loginView');
        return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
    }
    public function transaksi()
    {
        $data = ['kotak' => 'tidak'];
        // return redirect()->to(base_url('LoginController'));
        // if (session('jenis') != 'd') return redirect()->to('/loginController');
        $data = [
            'title' => 'Transaksi Besar'
        ];
        if (session('jenis') == 'besar') {
            return view('adminBesar/transaksiView', $data);
        }
        // if (session('jenis') == 'kecil') return view('dashboardView2');
        // return view('loginView');
        return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
    }
    public function data()
    {
        if (session('jenis') == 'besar') {
            return view('adminBesar/data');
        }
        // if (session('jenis') == 'kecil') return view('dashboardView2');
        // return view('loginView');
        return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
    }
}
