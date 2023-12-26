<?php
// app/Controllers/UserController.php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserAllController extends BaseController
{
 protected $gudangModell;
 protected $userModell;

 public function __construct()
 {
  $this->userModell = new UserModel();
  // $this->gudangModell = new \App\Models\GudangModel();
  $this->cekOtorisasi();
 }

 public function cekOtorisasi()
 {
  if (!session()->has('id_user')) {
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
   // Tidak perlu memanggil `exit()` karena `return` sudah akan menghentikan eksekusi selanjutnya
  }
 }

 public function index()
 {
  $id = session()->get('id_user');
  $data = [
   'title' => 'Kelola User',
   'useraktif' => $this->userModell->getUserId($id),
   'infouser' => $this->userModell->getViewInfoUser($id),
  ];
  // $data['user'] = $this->userModell->findAll();
  return view('userAllView', $data);
 }
}
