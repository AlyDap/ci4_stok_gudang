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

 public function storeProfil()
 {

  // cek username apakah masih sama / beda / jika beda apakah user sudah ada
  $cekuser = $this->userModell->getHitungUsername(session()->get('username'));
  $cekusertabel = session()->get('username');
  $cekuserinput = $this->request->getPost('username');
  if ($cekuserinput != $cekusertabel) {
   // dd($cekuser);
   if ($cekuser == '1') {
    // respon notofikasi pada tampilan bahwa user sudah terdaftar
    # isi code

   }
  }

  $gambar = $this->request->getFile('foto_user');
  $namagambar = $gambar->getName();
  $id = session()->get('id_user');
  $cekgambar = $this->userModell->find($id);
  $gambarlama = $this->request->getVar('foto_user2');
  // menangani gambar diinput/tidak

  if ($namagambar == '') {
   // $namagambar = 'default-user.png';
   // menangani tidak ubah foto saat edit
   $namagambar = $gambarlama;
  } else {
   $gambarlama = $namagambar;

   function generate_random_string($length = 8)
   {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
     $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
   }
   $namagambar = date('YmdHis') . '_' . generate_random_string(8) . '_' . $namagambar;
   $gambar->move('gambar_user', $namagambar);
  }

  if ($cekgambar['foto_user'] != 'default-user.png') {

   // cek gambar apakah gambar diupdate atau tidak
   if ($cekgambar['foto_user'] != $gambarlama) {

    // hapus file foto user di local storage
    unlink('gambar_user/' . $cekgambar['foto_user']);
   } else {
    $namagambar = $gambarlama;
   }
  }

  $data = [
   'username' => $this->request->getPost('username'),
   'no_hp' => $this->request->getPost('no_hp'),
   'email' => $this->request->getPost('email'),
   'foto_user' => $namagambar,
  ];
  $this->userModell->update($id, $data);

  return redirect()->to(base_url('LoginController/logOut'));
 }

 // cek password lama
 public function checkPasswordLama()
 {
  $cekPass = $this->userModell->find(session()->get('id_user'));
  // dd($cekPass['password']);
  $passwordTabel = $cekPass['password'];

  $passwordLamaFromClient = $_POST['passwordLama'];

  if (is_string($passwordLamaFromClient) && !empty($passwordLamaFromClient)) {
   $passwordLamaFromClient = md5($passwordLamaFromClient);
  }

  if ($passwordLamaFromClient === $passwordTabel) {
   echo 'success';
   $passwordBaruFromClient = $_POST['passwordBaru'];
   // dd($passwordBaruFromClient);
   $this->storePassword($passwordBaruFromClient);
  } else {
   echo 'invalid';
  }
 }

 public function storePassword($passwordBaruFromClient)
 {
  $id = session()->get('id_user');
  if (is_string($passwordBaruFromClient) && !empty($passwordBaruFromClient)) {
   $passwordBaruFromClient = md5($passwordBaruFromClient);
  }
  $data = [
   'password' => $passwordBaruFromClient,
  ];
  $this->userModell->update($id, $data);

  return redirect()->to(base_url('LoginController/logOut'));
 }
}
