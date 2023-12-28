<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\GudangModel;
use App\Models\MerekModel;
use App\Models\SupplierModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
 protected $barangModell, $merekModell, $supplierModell, $transaksiModell, $gudangModell, $userModell;

 public function __construct()
 {
  $this->barangModell = new BarangModel();
  $this->merekModell = new MerekModel();
  $this->supplierModell = new SupplierModel();
  // $this->transaksiModell = new TransaksiModel();
  $this->gudangModell = new GudangModel();
  $this->userModell = new UserModel();
 }

 public function index()
 {
  $data = ['jumlahBarang' => ''];
  if (session('jenis') == 'besar') {
   $data = [
    'title' => 'Dashboard Besar',
    'jBarang' => $this->barangModell->jumlahBarang(),
    'jGudang' => $this->gudangModell->jumlahGudang(),
    'jMerek' => $this->merekModell->jumlahMerek(),
    'jSupplier' => $this->supplierModell->jumlahSupplier(),
    'jUser' => $this->userModell->jumlahUser(),
    'collg' => 'col-lg-2',
   ];
   return view('dashboardView', $data);
  } else if (session('jenis') == 'kecil') {
   $data = [
    'title' => 'Dashboard Kecil',
    'jBarang' => $this->barangModell->jumlahBarangOn(),
    'jGudang' => $this->gudangModell->jumlahGudangOn(),
    'jMerek' => $this->merekModell->jumlahMerekOn(),
    'jSupplier' => $this->supplierModell->jumlahSupplierOn(),
    'jUser' => $this->userModell->jumlahUserOn(),
    'collg' => 'col-lg-3',
   ];
   return view('dashboardView', $data);
  } else {
   // return view('loginView');
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
  }
 }
 public function produk()
 {
  // return redirect()->to(base_url('LoginController'));
  // if (session('jenis') != 'd') return redirect()->to('/loginController');
  $data = [
   'title' => 'Produk Besar'
  ];
  if (session('jenis') == 'besar') {
   return view('adminBesar/produkView', $data);
  } else {
   // if (session('jenis') == 'kecil') return view('dashboardView2');
   // return view('loginView');
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
  }
 }
 public function transaksi()
 {
  // return redirect()->to(base_url('LoginController'));
  // if (session('jenis') != 'd') return redirect()->to('/loginController');
  $data = [
   'title' => 'Transaksi Besar'
  ];
  if (session('jenis') == 'besar') {
   return view('adminBesar/transaksiView', $data);
  } else {
   // if (session('jenis') == 'kecil') return view('dashboardView2');
   // return view('loginView');
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
  }
 }
 public function data()
 {
  if (session('jenis') == 'besar') {
   return view('adminBesar/data');
  } else {
   // if (session('jenis') == 'kecil') return view('dashboardView2');
   // return view('loginView');
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
  }
 }
}
