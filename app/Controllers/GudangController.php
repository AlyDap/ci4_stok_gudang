<?php
// app/Controllers/GudangController.php

namespace App\Controllers;

use App\Models\GudangModel;
use CodeIgniter\Controller;

class GudangController extends BaseController
{
 protected $gudangModell;

 public function __construct()
 {
  $this->gudangModell = new GudangModel();
  // $this->gudangModell = new \App\Models\GudangModel();
  $this->cekOtorisasi();
 }

 public function cekOtorisasi()
 {
  if (session('jenis') != 'besar') {
   redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548')->send();
   exit(); // Menghentikan eksekusi setelah redirect
  }
 }

 public function index()
 {
  $data = [
   'title' => 'Kelola Gudang'
  ];
  $data['gudang'] = $this->gudangModell->findAll();
  return view('adminBesar/gudangView', $data);
 }

 public function store()
 {
  $id = $this->request->getVar('kode_gudang');
  $foto = $this->request->getVar('foto_gudang');
  $foto2 = $this->request->getVar('foto_gudang2');

  if ($id == '') {
   if ($foto == '') {
    $foto = 'default-gudang.png';
   }

   $data = [
    'kode_gudang' => $this->request->getPost('kode_gudang'),
    'nama_gudang' => $this->request->getPost('nama_gudang'),
    'jenis' => $this->request->getPost('jenis'),
    'alamat' => $this->request->getPost('alamat'),
    'foto_gudang' => $foto,
    'status' => $this->request->getPost('status'),
   ];
   $this->gudangModell->insert($data);
  } else {
   if ($foto == '') {
    $foto = $foto2;
   }

   $this->update($id, $foto);
  }
  return redirect()->to(base_url('GudangController'));
 }

 public function update($id, $foto)
 {
  $data = [
   'nama_gudang' => $this->request->getVar('nama_gudang'),
   'jenis' => $this->request->getVar('jenis'),
   'alamat' => $this->request->getVar('alamat'),
   'foto_gudang' => $foto, // Menggunakan nilai dari $foto yang diterima sebagai parameter
   'status' => $this->request->getVar('status'),
  ];
  $this->gudangModell->update($id, $data);
 }
}
