<?php
// app/Controllers/TransaksiController.php

namespace App\Controllers;

use App\Models\GudangModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use App\Models\MerekModel;
use App\Models\SupplierModel;
use App\Models\GrafikStokModel;
use App\Models\TransaksiMasukModel;
use App\Models\TransaksiMasukDetailModel;
use App\Models\TransaksiKeluarModel;
use App\Models\TransaksiKeluarDetailModel;
use CodeIgniter\Controller;

class TransaksiController extends BaseController
{
 protected $barangModell, $merekModell, $grafikStokModel;
 protected $gudangModell, $userModell, $supplierModell;
 protected $transaksiMasukModell, $transaksiMasukDetailModell;
 protected $transaksiKeluarModell, $transaksiKeluarDetailModell;

 public function __construct()
 {
  $this->barangModell = new BarangModel();
  $this->gudangModell = new GudangModel();
  $this->userModell = new UserModel();
  $this->merekModell = new MerekModel();
  $this->supplierModell = new SupplierModel();
  $this->grafikStokModel = new GrafikStokModel();
  $this->transaksiMasukModell = new TransaksiMasukModel();
  $this->transaksiMasukDetailModell = new TransaksiMasukDetailModel();
  $this->transaksiKeluarModell = new TransaksiKeluarModel();
  $this->transaksiKeluarDetailModell = new TransaksiKeluarDetailModel();
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
   'title' => 'Transaksi',
   'nama_gudang' => $isiKodeNama,
   'foto_gudang' => $isiKodeGambar,
   'foto_user' => $isiIdGambar,
   'username' => $isiIdNama,
   'jenis' => $isiKodeJenis,
   'isiKodeGudang' => $isiKodeGudang,
   'transaksiMasuk' => $this->transaksiMasukModell->getTransaksiMasuk(),
   'transaksiMasukDetail' => $this->transaksiMasukDetailModell->getTransaksiMasukDetail(),
   'transaksiKeluar' => $this->transaksiKeluarModell->getTransaksiKeluar(),
   'transaksiKeluarDetail' => $this->transaksiKeluarDetailModell->getTransaksiKeluarDetail(),
   'supplierOn' => $this->supplierModell->getSupplierOn(),
   'barangOn' => $this->barangModell->getBarangOn(),
  ];
  if ($isiKodeJenis == 'besar') {
   // $data['barang'] = $this->barangModell->getBarangBarang();
  } else if ($isiKodeJenis == 'kecil') {
   // $data['barang'] = $this->barangModell->getBarangBarangOn();
  }
  return view('transaksiView', $data);
 }

 // json tabel detail transaksi masuk
 public function viewDetailTransaksiMasuk()
 {
  $dataPenggantiSession = $this->penggantiSession();
  $isiKodeGudang = $dataPenggantiSession['isiKodeGudang'];
  $viewTransaksiMasuk = $this->request->getPost('viewTransaksiMasuk');
  if (!empty($viewTransaksiMasuk)) {
   $data = [
    'data_detail_masuk' => $this->transaksiMasukDetailModell->getTransaksiMasukDetailById($viewTransaksiMasuk),
    'data_rekap_masuk' => $this->transaksiMasukModell->getTransaksiMasukById($viewTransaksiMasuk),
   ];
  } else {
   $data = [
    'data_detail_masuk' => '',
   ];
  }

  $response = [
   'data' => view('hasilTransaksiView', $data)
  ];
  echo json_encode($response);
 }
 public function viewDetailTransaksiKeluar()
 {
  $dataPenggantiSession = $this->penggantiSession();
  $isiKodeGudang = $dataPenggantiSession['isiKodeGudang'];
  $viewTransaksiKeluar = $this->request->getPost('viewTransaksiKeluar');
  if (!empty($viewTransaksiKeluar)) {
   $data = [
    'data_detail_keluar' => $this->transaksiKeluarDetailModell->getTransaksiKeluarDetailById($viewTransaksiKeluar),
    'data_rekap_keluar' => $this->transaksiKeluarModell->getTransaksiKeluarById($viewTransaksiKeluar),
   ];
  } else {
   $data = [
    'data_detail_keluar' => '',
   ];
  }

  $response = [
   'data' => view('hasilTransaksiView2', $data)
  ];
  echo json_encode($response);
 }
 public function storeMasuk()
 {
 }
 public function storeKeluar()
 {
 }
}
