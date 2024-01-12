<?php
// app/Controllers/StokController.php

namespace App\Controllers;

use App\Models\GudangModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use App\Models\MerekModel;
use App\Models\GrafikStokModel;
use CodeIgniter\Controller;

class StokController extends BaseController
{
 protected $barangModell, $merekModell, $grafikStokModel;
 protected $gudangModell, $userModell;
 protected $session, $dataPrint;

 public function __construct()
 {
  $this->barangModell = new BarangModel();
  $this->gudangModell = new GudangModel();
  $this->userModell = new UserModel();
  $this->merekModell = new MerekModel();
  $this->grafikStokModel = new GrafikStokModel();
  // $this->barangModell = new \App\Models\MerekModel();
  $this->cekOtorisasi();
  $this->cekUserOn();
  $this->session = session();
 }

 public function cekOtorisasi()
 {
  if (!session()->has('id_user')) {
   redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548')->send();
   exit(); // Menghentikan eksekusi setelah redirect
  }
 }

 public function cekUserOn()
 {
  $userOn = $this->userModell->getUserOn(session('id_user'));
  if (empty($userOn)) {
   session()->destroy();
   redirect()->to(base_url('LoginController'))->send();
   exit(); // Menghentikan eksekusi setelah redirect
  }
 }

 public function cekOtorisasiBesar()
 {
  $dataPenggantiSession = $this->penggantiSession();
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  if ($isiKodeJenis != 'besar') {
   redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548')->send();
   exit(); // Menghentikan eksekusi setelah redirect
  }
 }
 public function cekOtorisasiKecil()
 {
  $dataPenggantiSession = $this->penggantiSession();
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  if ($isiKodeJenis != 'kecil') {
   redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548')->send();
   exit(); // Menghentikan eksekusi setelah redirect
  }
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
     'isiKodeGudang' => $kode,
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
  $isiKodeGudang = $dataPenggantiSession['isiKodeGudang'];
  $data = [
   'title' => 'Stok Barang',
   'nama_gudang' => $isiKodeNama,
   'foto_gudang' => $isiKodeGambar,
   'foto_user' => $isiIdGambar,
   'username' => $isiIdNama,
   'jenis' => $isiKodeJenis,
   'merekaktif' => $this->merekModell->getMerekOn(),
   'stok' => $this->barangModell->getStokNama($isiKodeGudang),
   'stok_semua' => $this->barangModell->getStokNamaSemua(),
   'gudang' => $this->gudangModell->findAll(),
   'grafik_stok_pergudang' => $this->grafikStokModel->getGrafikJumlahStokPerGudang($isiKodeGudang),
   'grafik_stok_semuagudang' => $this->grafikStokModel->getGrafikJumlahStokSemuaGudang(),
  ];
  if ($isiKodeJenis == 'besar') {
   // $data['barang'] = $this->barangModell->getBarangBarang();
  } else if ($isiKodeJenis == 'kecil') {
   // $data['barang'] = $this->barangModell->getBarangBarangOn();
  }
  $this->session->set('dataPrint', $data);
  return view('stokView', $data);
 }

 public function printStok() // 1 gudang
 {
  $data = $this->session->get('dataPrint');
  return view('printStokV', $data);
 }
 public function printStok2() // semua gudang
 {
  $data = $this->session->get('dataPrint');
  return view('printStok2V', $data);
 }

 // json grafik stok
 public function viewGrafikStokPerGudang()
 {
  $dataPenggantiSession = $this->penggantiSession();
  $isiKodeGudang = $dataPenggantiSession['isiKodeGudang'];
  $selectedValue2 = $this->request->getPost('selectedValue2');
  $Gudang = $this->gudangModell->find($selectedValue2);
  if ($Gudang) {
   $data = [
    'grafik_stok_semuagudang2' => $this->grafikStokModel->getGrafikJumlahStokPerGudang($selectedValue2),
   ];
  } else {
   if ($selectedValue2 == 'semua') {
    $data = [
     'grafik_stok_semuagudang2' => $this->grafikStokModel->getGrafikJumlahStokSemuaGudang(),
    ];
   } else {
    $data = [
     'grafik_stok_semuagudang2' => '',
    ];
   }
  }

  $response = [
   'data' => view('hasilStokView', $data)
  ];
  echo json_encode($response);
 }
}
