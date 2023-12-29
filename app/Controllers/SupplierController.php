<?php
// app/Controllers/SupplierController.php

namespace App\Controllers;

use App\Models\SupplierModel;
use CodeIgniter\Controller;

class SupplierController extends BaseController
{
 protected $supplierModell;

 public function __construct()
 {
  $this->supplierModell = new SupplierModel();
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

 public function index()
 {
  $data = [
   'title' => 'Kelola Supplier'
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
