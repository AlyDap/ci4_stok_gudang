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
    'foto_gudang' => $namagambar,
    'status' => $this->request->getPost('status'),
   ];
   $this->gudangModell->insert($data);
   // 
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
   'foto_gudang' => $namagambar,
   'status' => $this->request->getVar('status'),
  ];
  $this->gudangModell->update($id, $data);
 }
}
