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
   'usersaatini' => $this->userModell->getUserSaatIni($id),
  ];
  // $data['user'] = $this->userModell->findAll();
  return view('userAllView', $data);
 }

 public function storeProfil()
 {

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
 // cek username
 public function checkUsername()
 {
  $id = session()->get('id_user');
  $username = $this->userModell->getUserSaatIni($id);
  $cekusertabel = '';
  if ($username) {
   $cekusertabel = $username->username;
  }

  // $cekUsername = $_POST['cekUsername'];
  // $noHp = $_POST['noHp'];
  // $email = $_POST['email'];
  $cekUsername = $this->request->getVar('cekUsername');
  $noHp = $this->request->getVar('noHp');
  $email = $this->request->getVar('email');
  $hiddenFoto = $this->request->getVar('hiddenFoto');
  // $gambarlama = $hiddenFoto;

  // Mengambil file foto dari request
  $foto = $this->request->getFile('foto');
  if ($foto) {
   $namaFoto = $foto->getName();
  } else {
   $namaFoto = '';
  }
  // $foto->move('path/to/destination', $foto->getRandomName());

  // cek foto kosong/tidak yang akan di move
  if ($namaFoto == '') {
   $namaFoto = 'default-user.png';
  } else {
   function generate_random_string($length = 8)
   {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
     $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
   }
   $namaFoto = date('YmdHis') . '_' . generate_random_string(8) . '_' . $namaFoto;
   $foto->move('gambar_user', $namaFoto);
  }
  // cek file gambar default atau tidak yang akan di unlink
  $cekgambar = $this->userModell->find($id);
  $cekgambarlog = $cekgambar['foto_user'];
  // cek jika gambar tidak default
  if ($cekgambar['foto_user'] != 'default-user.png') {
   $gambarlama = $hiddenFoto;
   // cek gambar apakah gambar diupdate atau tidak
   if ($cekgambar['foto_user'] != $gambarlama) {
    // hapus file foto merek di local storage
    unlink('gambar_user/' . $cekgambar['foto_user']);
   } else {
    $namaFoto = $gambarlama;
   }
  }

  $cekjumlahuser = $this->userModell->getHitungUsername($cekUsername);
  $hasilcekjumlahuser = $cekjumlahuser->hitung;
  // log_message('info', 'Nilai $id: ' . print_r($id, true));
  // log_message('info', 'Nilai $hasilcekjumlahuser: ' . print_r($hasilcekjumlahuser, true));
  // log_message('info', 'Nilai $cekUsername: ' . print_r($cekUsername, true));
  log_message('info', 'Nilai $gambarlama: ' . print_r($gambarlama, true));
  log_message('info', 'Nilai $cekgambarlog: ' . print_r($cekgambarlog, true));
  if ($cekUsername != $cekusertabel) {
   // mengecek pada writable logs lalu search nama variabelnya
   if ($hasilcekjumlahuser == '0') {
    $this->storeUsername($cekUsername, $noHp, $email, $namaFoto);
    echo 'success';
   } else {
    echo 'invalid';
   }
  } else {
   $this->storeUsername($cekUsername, $noHp, $email, $namaFoto);
   echo 'hahah';
  }
 }

 public function storeUsername($cekUsername, $noHp, $email, $namaFoto)
 {
  $data = [
   'username' => $cekUsername,
   'no_hp' => $noHp,
   'email' => $email,
   'foto_user' => $namaFoto,
  ];

  $id = session()->get('id_user');
  $this->userModell->update($id, $data);
 }
}
