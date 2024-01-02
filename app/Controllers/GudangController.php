<?php
// app/Controllers/GudangController.php

namespace App\Controllers;

use App\Models\GudangModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use CodeIgniter\Controller;

class GudangController extends BaseController
{
 protected $gudangModell, $userModell, $barangModell;

 public function __construct()
 {
  $this->gudangModell = new GudangModel();
  $this->userModell = new UserModel();
  $this->barangModell = new BarangModel();
  // $this->gudangModell = new \App\Models\GudangModel();
  $this->cekOtorisasi();
 }

 public function cekOtorisasi()
 {
  $dataPenggantiSession = $this->penggantiSession();
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  if ($isiKodeJenis != 'besar') {
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
   'title' => 'Kelola Gudang',
   'nama_gudang' => $isiKodeNama,
   'foto_gudang' => $isiKodeGambar,
   'foto_user' => $isiIdGambar,
   'username' => $isiIdNama,
   'jenis' => $isiKodeJenis,
  ];
  $data['gudang'] = $this->gudangModell->findAll();
  return view('adminBesar/gudangView', $data);
 }

 public function store()
 {
  $id = $this->request->getVar('kode_gudang');
  $foto2 = $this->request->getVar('foto_gudang2');
  // ambil gambar
  $gambar = $this->request->getFile('foto_gudang');
  // ambil nama file
  $namagambar = $gambar->getName();
  // dd($namagambar);

  if ($namagambar == '') {
   $namagambar = 'default-gudang.png';
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
   // atau bisa juga id gudang + nama gambar
   // Membuat nama file unik dengan timestamp
   $namagambar = date('YmdHis') . '_' . generate_random_string(8) . '_' . $namagambar;

   // Pindahkan file ke folder public/foto_gudang dengan nama unik
   $gambar->move('gambar_gudang', $namagambar);
  }

  if ($id == '') { // Jika id tidak ada maka jalankan perintah add

   $data = [
    'kode_gudang' => $this->request->getPost('kode_gudang'),
    'nama_gudang' => $this->request->getPost('nama_gudang'),
    'jenis' => $this->request->getPost('jenis'),
    'alamat' => $this->request->getPost('alamat'),
    'keterangan' => $this->request->getPost('keterangan'),
    'foto_gudang' => $namagambar,
    'status' => $this->request->getPost('status'),
   ];
   $this->gudangModell->insert($data);

   // input stok_barang pada gudang baru
   $kodeBaru = $this->gudangModell->getKodeTerbaru();
   $kodeBaru = $kodeBaru->kode_gudang;

   $semuaKodeBarang = $this->barangModell->findAll();
   if (!empty($semuaKodeBarang)) {
    foreach ($semuaKodeBarang as $row) {
     $data = [
      'kode_barang' => $row['kode_barang'],
      'satuan' => $row['satuan'],
      'jumlah' => '0',
      'kode_gudang' => $kodeBaru,
     ];
     $this->barangModell->inputStokBaru($data);
    }
   }
  } else { // Jika id ada maka jalankan perintah update

   // cek file gambar default atau tidak
   $cekgambar = $this->gudangModell->find($id);

   // cek jika gambar tidak default
   if ($cekgambar['foto_gudang'] != 'default-gudang.png') {

    $gambarlama = $this->request->getVar('foto_gudang2');
    // cek gambar apakah gambar diupdate atau tidak
    if ($cekgambar['foto_gudang'] != $gambarlama) {

     // hapus file foto gudang di local storage
     unlink('gambar_gudang/' . $cekgambar['foto_gudang']);
    } else {
     $namagambar = $gambarlama;
    }
   }
   // if ($namagambar == '') {
   //  $namagambar = $foto2;
   // }

   $this->update($id, $namagambar);
  }
  return redirect()->to(base_url('GudangController'));
 }

 public function update($id, $namagambar)
 {
  $data = [
   'nama_gudang' => $this->request->getVar('nama_gudang'),
   'jenis' => $this->request->getVar('jenis'),
   'alamat' => $this->request->getVar('alamat'),
   'keterangan' => $this->request->getPost('keterangan'),
   'foto_gudang' => $namagambar,
   'status' => $this->request->getVar('status'),
  ];
  $this->gudangModell->update($id, $data);
 }
}
