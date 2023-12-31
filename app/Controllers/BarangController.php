<?php
// app/Controllers/BarangController.php

namespace App\Controllers;

use App\Models\GudangModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use App\Models\MerekModel;
use CodeIgniter\Controller;

class BarangController extends BaseController
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
   'title' => 'Kelola Barang',
   'nama_gudang' => $isiKodeNama,
   'foto_gudang' => $isiKodeGambar,
   'foto_user' => $isiIdGambar,
   'username' => $isiIdNama,
   'jenis' => $isiKodeJenis,
   'merekaktif' => $this->merekModell->getMerekOn(),
  ];
  if ($isiKodeJenis == 'besar') {
   $data['barang'] = $this->barangModell->getBarangBarang();
  } else if ($isiKodeJenis == 'kecil') {
   $data['barang'] = $this->barangModell->getBarangBarangOn();
  }
  return view('adminBesar/barangView', $data);
 }

 public function store()
 {
  $this->cekOtorisasiBesar();

  $id = $this->request->getVar('id_merek');
  $foto2 = $this->request->getVar('logo2');
  // ambil gambar
  $gambar = $this->request->getFile('logo');
  // ambil nama file
  $namagambar = $gambar->getName();
  // dd($namagambar);

  if ($namagambar == '') {
   $namagambar = 'default-merek.png';
  } else {
   // Create a function to generate a random alphanumeric string
   function generate_random_string($length = 8)
   {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
     $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
   }
   // atau bisa juga id merek + nama gambar
   // Membuat nama file unik dengan timestamp
   $namagambar = date('YmdHis') . '_' . generate_random_string(8) . '_' . $namagambar;

   // Pindahkan file ke folder public/logo dengan nama unik
   $gambar->move('gambar_merek', $namagambar);
  }

  if ($id == '') { // Jika id tidak ada maka jalankan perintah add

   $data = [
    'id_merek' => $this->request->getPost('id_merek'),
    'nama_merek' => $this->request->getPost('nama_merek'),
    'kategori_produk' => $this->request->getPost('kategori_produk'),
    'deskripsi' => $this->request->getPost('deskripsi'),
    'logo' => $namagambar,
    'pemilik' => $this->request->getPost('pemilik'),
    'status' => $this->request->getPost('status'),
   ];
   $this->merekModell->insert($data);
   // 
  } else { // Jika id ada maka jalankan perintah update

   // cek file gambar default atau tidak
   $cekgambar = $this->merekModell->find($id);

   // cek jika gambar tidak default
   if ($cekgambar['logo'] != 'default-merek.png') {

    $gambarlama = $this->request->getVar('logo2');
    // cek gambar apakah gambar diupdate atau tidak
    if ($cekgambar['logo'] != $gambarlama) {

     // hapus file foto merek di local storage
     unlink('gambar_merek/' . $cekgambar['logo']);
    } else {
     $namagambar = $gambarlama;
    }
   }
   // if ($namagambar == '') {
   //  $namagambar = $foto2;
   // }

   $this->update($id, $namagambar);
  }
  return redirect()->to(base_url('BarangController'));
 }

 public function update($id, $namagambar)
 {

  $data = [
   'nama_merek' => $this->request->getVar('nama_merek'),
   'kategori_produk' => $this->request->getVar('kategori_produk'),
   'deskripsi' => $this->request->getVar('deskripsi'),
   'logo' => $namagambar,
   'pemilik' => $this->request->getPost('pemilik'),
   'status' => $this->request->getVar('status'),
  ];
  $this->merekModell->update($id, $data);
 }
}
