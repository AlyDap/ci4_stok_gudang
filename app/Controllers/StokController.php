<?php
// app/Controllers/StokController.php

namespace App\Controllers;

use App\Models\GudangModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use App\Models\MerekModel;
use CodeIgniter\Controller;

class StokController extends BaseController
{
 protected $barangModell, $merekModell;
 protected $gudangModell, $userModell;

 public function __construct()
 {
  $this->barangModell = new BarangModel();
  $this->gudangModell = new GudangModel();
  $this->userModell = new UserModel();
  $this->merekModell = new MerekModel();
  // $this->barangModell = new \App\Models\MerekModel();
  $this->cekOtorisasi();
 }

 public function cekOtorisasi()
 {
  if (!session()->has('id_user')) {
   redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548')->send();
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
  ];
  if ($isiKodeJenis == 'besar') {
   // $data['barang'] = $this->barangModell->getBarangBarang();
  } else if ($isiKodeJenis == 'kecil') {
   // $data['barang'] = $this->barangModell->getBarangBarangOn();
  }
  return view('stokView', $data);
 }
}