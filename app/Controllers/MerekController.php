<?php
// app/Controllers/MerekController.php

namespace App\Controllers;

use App\Models\MerekModel;
use CodeIgniter\Controller;

class MerekController extends BaseController
{
 protected $merekModell;

 public function __construct()
 {
  $this->merekModell = new MerekModel();
  // $this->merekModell = new \App\Models\MerekModel();
  // $this->cekOtorisasi();
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
   'title' => 'Kelola Merek'
  ];
  $data['merek'] = $this->merekModell->findAll();
  return view('adminBesar/merekView', $data);
 }

 public function store()
 {
  $this->cekOtorisasi();

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
  return redirect()->to(base_url('MerekController'));
 }

 public function update($id, $namagambar)
 {
  $this->cekOtorisasi();

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
