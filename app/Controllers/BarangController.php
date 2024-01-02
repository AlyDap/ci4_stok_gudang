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

  $id = $this->request->getVar('kode_barang');
  $foto2 = $this->request->getVar('foto_barang2');
  // ambil gambar
  $gambar = $this->request->getFile('foto_barang');
  // ambil nama file
  $namagambar = $gambar->getName();
  // dd($namagambar);

  if ($namagambar == '') {
   $namagambar = 'default-barang.png';
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

   // Pindahkan file ke folder public/foto_barang dengan nama unik
   $gambar->move('gambar_barang', $namagambar);
  }

  if ($id == '') { // Jika id tidak ada maka jalankan perintah add

   $data = [
    'kode_barang' => $this->request->getPost('kode_barang'),
    'nama_barang' => $this->request->getPost('nama_barang'),
    'satuan' => $this->request->getPost('satuan'),
    'harga_beli' => $this->request->getPost('harga_beli'),
    'harga_jual_satuan' => $this->request->getPost('harga_jual_satuan'),
    'harga_jual_bijian' => $this->request->getPost('harga_jual_bijian'),
    'jumlah_per_satuan' => $this->request->getPost('jumlah_per_satuan'),
    'foto_barang' => $namagambar,
    'id_merek' => $this->request->getPost('id_merek'),
    'status' => $this->request->getPost('status'),
   ];
   $this->barangModell->insert($data);

   // masukan jumlah stok barang baru
   $kodeBaru = $this->barangModell->getKodeTerbaru();
   $kodeBaru = $kodeBaru->kode_barang;

   $semuaKodeGudang = $this->gudangModell->getSemuaKodeGudang();
   if (!empty($semuaKodeGudang)) {
    foreach ($semuaKodeGudang as $row) {
     $data = [
      'kode_barang' => $kodeBaru,
      'satuan' => $this->request->getPost('satuan'),
      'jumlah' => '0',
      'kode_gudang' => $row['kode_gudang'],
     ];
     $this->barangModell->inputStokBaru($data);
    }
   }

   // 
  } else { // Jika id ada maka jalankan perintah update

   // cek file gambar default atau tidak
   $cekgambar = $this->barangModell->find($id);

   // cek jika gambar tidak default
   if ($cekgambar['foto_barang'] != 'default-barang.png') {

    $gambarlama = $this->request->getVar('foto_barang2');
    // cek gambar apakah gambar diupdate atau tidak
    if ($cekgambar['foto_barang'] != $gambarlama) {

     // hapus file foto merek di local storage
     unlink('gambar_barang/' . $cekgambar['foto_barang']);
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
   'nama_barang' => $this->request->getPost('nama_barang'),
   'satuan' => $this->request->getPost('satuan'),
   'harga_beli' => $this->request->getPost('harga_beli'),
   'harga_jual_satuan' => $this->request->getPost('harga_jual_satuan'),
   'harga_jual_bijian' => $this->request->getPost('harga_jual_bijian'),
   'jumlah_per_satuan' => $this->request->getPost('jumlah_per_satuan'),
   'foto_barang' => $namagambar,
   'id_merek' => $this->request->getPost('id_merek'),
   'status' => $this->request->getPost('status'),
  ];
  $this->barangModell->update($id, $data);
 }
}
