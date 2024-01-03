<?php
// app/Controllers/UserController.php

namespace App\Controllers;

use App\Models\GudangModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends BaseController
{
 protected $gudangModell;
 protected $userModell;

 public function __construct()
 {
  $this->gudangModell = new GudangModel();
  $this->userModell = new UserModel();
  // $this->gudangModell = new \App\Models\GudangModel();
  $this->cekOtorisasi();
  $this->cekUserOn();
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
 public function cekUserOn()
 {
  $userOn = $this->userModell->getUserOn(session('id_user'));
  if (empty($userOn)) {
   session()->destroy();
   redirect()->to(base_url('LoginController'))->send();
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
   'title' => 'Kelola User',
   'user2' => $this->userModell->getNamaGudang(),
   'gudangaktif' => $this->userModell->getGudangAktif(),
   'nama_gudang' => $isiKodeNama,
   'foto_gudang' => $isiKodeGambar,
   'foto_user' => $isiIdGambar,
   'username' => $isiIdNama,
   'jenis' => $isiKodeJenis,
  ];
  $data['user'] = $this->userModell->findAll();
  return view('adminBesar/userView', $data);
 }

 public function store()
 {
  $id = $this->request->getVar('id_user');
  $foto2 = $this->request->getVar('foto_user2');
  // ambil gambar
  $gambar = $this->request->getFile('foto_user');
  // ambil nama file
  $namagambar = $gambar->getName();
  // dd($namagambar);
  // buat md5 password
  $passwordmd5 = $this->request->getPost('password');
  if (is_string($passwordmd5) && !empty($passwordmd5)) {
   $passwordmd5 = md5($passwordmd5);
  }


  if ($namagambar == '') {
   $namagambar = 'default-user.png';
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
   // atau bisa juga id user + nama gambar
   // Membuat nama file unik dengan timestamp
   $namagambar = date('YmdHis') . '_' . generate_random_string(8) . '_' . $namagambar;

   // Pindahkan file ke folder public/foto_user dengan nama unik
   $gambar->move('gambar_user', $namagambar);
  }

  if ($id == '') { // Jika id tidak ada maka jalankan perintah add

   $data = [
    'id_user' => $this->request->getPost('id_user'),
    'username' => $this->request->getPost('username'),
    'password' => $passwordmd5,
    'no_hp' => $this->request->getPost('no_hp'),
    'email' => $this->request->getPost('email'),
    'foto_user' => $namagambar,
    'kode_gudang' => $this->request->getPost('kode_gudang'),
    'status' => $this->request->getPost('status'),
   ];
   $this->userModell->insert($data);
   // 
  } else { // Jika id ada maka jalankan perintah update

   $this->update($id);
  }
  return redirect()->to(base_url('UserController'));
 }

 public function update($id)
 {
  $data = [
   'kode_gudang' => $this->request->getVar('kode_gudang'),
   'status' => $this->request->getVar('status'),
  ];
  $this->userModell->update($id, $data);
 }

 public function getGudangById($kodeGudang)
 {
  $dataGudang = $this->userModell->getGudangId($kodeGudang);

  return $this->response->setJSON($dataGudang);
 }
}
