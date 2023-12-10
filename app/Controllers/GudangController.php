<?php
// app/Controllers/GudangController.php

namespace App\Controllers;

use App\Models\GudangModel;
use CodeIgniter\Controller;

class GudangController extends BaseController
{
 // public function __construct()
 // {
 //  if (session('jenis') != 'besar') {
 //   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
 //  }
 // }


 public function index()
 {
  $data = [
   'title' => 'Dashboard Besar'
  ];
  $model = new GudangModel();
  $data['gudang'] = $model->findAll();
  return view('adminBesar/gudangView', $data);
 }

 public function save()
 {
  $model = new GudangModel();

  $data = [
   'kode_gudang' => $this->request->getPost('kode_gudang'),
   'nama_gudang' => $this->request->getPost('nama_gudang'),
   'jenis' => $this->request->getPost('jenis'),
   'alamat' => $this->request->getPost('alamat'),
   'status' => $this->request->getPost('status'),
  ];

  $model->insert($data);

  return redirect()->to(base_url('GudangController'));
 }
}
