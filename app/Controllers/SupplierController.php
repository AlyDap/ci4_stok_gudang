<?php
// app/Controllers/SupplierController.php

namespace App\Controllers;

use App\Models\SupplierModel;
use App\Models\GudangModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class SupplierController extends BaseController
{
 protected $supplierModell;
 protected $gudangModell, $userModell;


 public function __construct()
 {
  $this->supplierModell = new SupplierModel();
  $this->gudangModell = new GudangModel();
  $this->userModell = new UserModel();
  // $this->supplierModell = new \App\Models\SupplierModel();
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
  if (session('jenis') != 'besar') {
   redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548')->send();
   exit(); // Menghentikan eksekusi setelah redirect
  }
 }
 public function cekOtorisasiKecil()
 {
  if (session('jenis') != 'kecil') {
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
   'title' => 'Kelola Supplier',
   'nama_gudang' => $isiKodeNama,
   'foto_gudang' => $isiKodeGambar,
   'foto_user' => $isiIdGambar,
   'username' => $isiIdNama,
   'jenis' => $isiKodeJenis,
  ];
  if (session('jenis') == 'besar') {
   $data['supplier'] = $this->supplierModell->findAll();
  } else if (session('jenis') == 'kecil') {
   $data['supplier'] = $this->supplierModell->getSupplierOn();
  }
  return view('adminBesar/supplierView', $data);
 }

 public function store()
 {
  $this->cekOtorisasiBesar();
  $id = $this->request->getVar('id_supplier');

  if ($id == '') { // Jika id tidak ada maka jalankan perintah add

   $data = [
    'id_supplier' => $this->request->getPost('id_supplier'),
    'nama_supplier' => $this->request->getPost('nama_supplier'),
    'email' => $this->request->getPost('email'),
    'no_hp' => $this->request->getPost('no_hp'),
    'alamat' => $this->request->getPost('alamat'),
    'deskripsi' => $this->request->getPost('deskripsi'),
    'status' => $this->request->getPost('status'),
   ];
   $this->supplierModell->insert($data);
   // 
  } else { // Jika id ada maka jalankan perintah update


   $this->update($id);
  }
  return redirect()->to(base_url('SupplierController'));
 }

 public function update($id)
 {
  $data = [
   'nama_supplier' => $this->request->getVar('nama_supplier'),
   'email' => $this->request->getVar('email'),
   'no_hp' => $this->request->getVar('no_hp'),
   'alamat' => $this->request->getVar('alamat'),
   'deskripsi' => $this->request->getPost('deskripsi'),
   'status' => $this->request->getVar('status'),
  ];
  $this->supplierModell->update($id, $data);
 }
}
