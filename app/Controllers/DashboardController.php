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

 public function penggantiSession()
 {
  $id = session()->get('id_user');
  $userSaatIni = $this->userModell->getUserSaatIni($id);
  $isiKodeNama = '';
  $isiIdGambar = '';
  $isiIdNama = '';
  $isiKodeGambar = '';
  $isiKodeJenis = '';
  if ($userSaatIni) {
   $kode = $userSaatIni->kode_gudang;
   $isiIdGambar = $userSaatIni->foto_user;
   $isiIdNama = $userSaatIni->username;
   $kodeSaatIni = $this->gudangModell->getKodeGudangSaatIni($kode);
   if ($kodeSaatIni) {
    $isiKodeNama = $kodeSaatIni->nama_gudang;
    $isiKodeGambar = $kodeSaatIni->foto_gudang;
    $isiKodeJenis = $kodeSaatIni->jenis;
    $data = [
     'isiIdGambar' => $isiIdGambar,
     'isiKodeNama' => $isiKodeNama,
     'isiIdNama' => $isiIdNama,
     'isiKodeGambar' => $isiKodeGambar,
     'isiKodeJenis' => $isiKodeJenis,
    ];
    return $data;
   }
  }
 }

 public function index()
 {
  // Memanggil fungsi penggantiSession untuk mendapatkan nilai-nilai yang dikembalikan
  $dataPenggantiSession = $this->penggantiSession();
  // Mengakses nilai-nilai yang dikembalikan
  $isiIdGambar = $dataPenggantiSession['isiIdGambar'];
  $isiKodeNama = $dataPenggantiSession['isiKodeNama'];
  $isiIdNama = $dataPenggantiSession['isiIdNama'];
  $isiKodeGambar = $dataPenggantiSession['isiKodeGambar'];
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];

  $data = [
   'jumlahBarang' => '',
   // 'nama_gudang' => $isiKodeNama,
   // 'foto_gudang' => $isiKodeGambar,
  ];
  if ($isiKodeJenis == 'besar') {
   $data = [
    'title' => 'Dashboard Besar',
    'jBarang' => $this->barangModell->jumlahBarang(),
    'jGudang' => $this->gudangModell->jumlahGudang(),
    'jMerek' => $this->merekModell->jumlahMerek(),
    'jSupplier' => $this->supplierModell->jumlahSupplier(),
    'jUser' => $this->userModell->jumlahUser(),
    'collg' => 'col-lg-2',
    'nama_gudang' => $isiKodeNama,
    'foto_gudang' => $isiKodeGambar,
    'foto_user' => $isiIdGambar,
    'username' => $isiIdNama,
    'jenis' => $isiKodeJenis,
   ];
   return view('dashboardView', $data);
  } else if ($isiKodeJenis == 'kecil') {
   $data = [
    'title' => 'Dashboard Kecil',
    'jBarang' => $this->barangModell->jumlahBarangOn(),
    'jGudang' => $this->gudangModell->jumlahGudangOn(),
    'jMerek' => $this->merekModell->jumlahMerekOn(),
    'jSupplier' => $this->supplierModell->jumlahSupplierOn(),
    'jUser' => $this->userModell->jumlahUserOn(),
    'collg' => 'col-lg-3',
    'nama_gudang' => $isiKodeNama,
    'foto_gudang' => $isiKodeGambar,
    'foto_user' => $isiIdGambar,
    'username' => $isiIdNama,
    'jenis' => $isiKodeJenis,
   ];
   return view('dashboardView', $data);
  } else {
   // return view('loginView');
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
  }
 }
 public function produk()
 {
  $dataPenggantiSession = $this->penggantiSession();
  // Mengakses nilai-nilai yang dikembalikan
  $isiIdGambar = $dataPenggantiSession['isiIdGambar'];
  $isiKodeNama = $dataPenggantiSession['isiKodeNama'];
  $isiIdNama = $dataPenggantiSession['isiIdNama'];
  $isiKodeGambar = $dataPenggantiSession['isiKodeGambar'];
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  $data = [
   'title' => 'Produk Besar',
   'nama_gudang' => $isiKodeNama,
   'foto_gudang' => $isiKodeGambar,
   'foto_user' => $isiIdGambar,
   'username' => $isiIdNama,
   'jenis' => $isiKodeJenis,
  ];
  if ($isiKodeJenis == 'besar') {
   return view('adminBesar/produkView', $data);
  } else {
   // if ($isiKodeJenis == 'kecil') return view('dashboardView2');
   // return view('loginView');
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
  }
 }
 public function transaksi()
 {
  $dataPenggantiSession = $this->penggantiSession();
  // Mengakses nilai-nilai yang dikembalikan
  $isiIdGambar = $dataPenggantiSession['isiIdGambar'];
  $isiKodeNama = $dataPenggantiSession['isiKodeNama'];
  $isiIdNama = $dataPenggantiSession['isiIdNama'];
  $isiKodeGambar = $dataPenggantiSession['isiKodeGambar'];
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  $data = [
   'title' => 'Transaksi Besar',
   'nama_gudang' => $isiKodeNama,
   'foto_gudang' => $isiKodeGambar,
   'foto_user' => $isiIdGambar,
   'username' => $isiIdNama,
   'jenis' => $isiKodeJenis,
  ];
  if ($isiKodeJenis == 'besar') {
   return view('adminBesar/transaksiView', $data);
  } else {
   // if ($isiKodeJenis == 'kecil') return view('dashboardView2');
   // return view('loginView');
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
  }
 }
 public function data()
 {
  $dataPenggantiSession = $this->penggantiSession();
  // Mengakses nilai-nilai yang dikembalikan
  $isiIdGambar = $dataPenggantiSession['isiIdGambar'];
  $isiKodeNama = $dataPenggantiSession['isiKodeNama'];
  $isiIdNama = $dataPenggantiSession['isiIdNama'];
  $isiKodeGambar = $dataPenggantiSession['isiKodeGambar'];
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  if ($isiKodeJenis == 'besar') {
   return view('adminBesar/data');
  } else {
   // if ($isiKodeJenis == 'kecil') return view('dashboardView2');
   // return view('loginView');
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
  }
 }
}
