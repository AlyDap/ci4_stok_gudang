<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>

<!-- <?php echo session()->get('username'); ?>
<?= session()->get('id_user'); ?> -->

<?php
// foreach ($useraktif as $key => $value) {
//  echo $key . ' -> ' . $value . '<br>';
// }
// output:
// id_user -> 1
// username -> ali ....

// echo $useraktif->email;
// output: ali@gmail.com
?>

<div class="row">
 <div class="col-sm-6 mb-3 mb-sm-0">
  <div class="card">
   <div class="row g-0">
    <div class="col-md-3 d-flex justify-content-center align-items-center pl-3">
     <img src="<?= base_url('gambar_user/' . $useraktif->foto_user) ?>" class="img-fluid rounded" alt="...">
    </div>
    <div class="col-md-9">
     <div class="card-body">
      <!-- <h3><?= $useraktif->username ?></h3> -->
      <!-- <h3 class="card-title"><?= $useraktif->username ?></h3> -->
      <!-- AKAN MEMBUAT TABEL VIEW UNTUK PASSWORD USER bukan MD5
           SAAT EDIT USERNAME, ADA NOTIF USER SUDAH TERDAFTAR
           DAN MENAMBAH FIELD baru untuk password nya -->
      <!-- <p class="card-text">Email : </p> -->
      <div class="">
       <?php
       // dd($infouser);
       foreach ($infouser as $key => $value) {
       ?>
        <div class="row">
         <div class="col" style=" max-width: 125px;">
          <?= $key ?>
         </div>
         <div class="col" style=" margin-right: 0px; padding-right: 0px; max-width: 10px;">
          :
         </div>
         <div class="col">
          <?= $value ?>
         </div>
        </div>
       <?php
        // echo $key . ' -> ' . $value . '<br>';
       }
       ?>
      </div>
      <p class="card-text"><small class="text-body-secondary">Last updated 27 days ago</small></p>
     </div>
    </div>
   </div>
  </div>
 </div>
 <div class="col-sm-6">
  <div class="card">
   <div class="card-body">
    <h5 class="card-title">Edit Info Akun</h5>
    <p class="card-text">Data Anda tidak benar? Silahkan rubah sekarang.</p>
    <div class="row text-center">
     <div class="col">
      <a href="#" class="btn btn-outline-primary" id="btn-edit-profil">Edit Profil</a>
     </div>
     <div class="col">
      <a href="#" class="btn btn-outline-warning" id="btn-edit-password">Edit Password</a>
     </div>
     <div class="col">
      <a href="#" class="btn btn-outline-danger" id="btn-edit-batal">Batal</a>
     </div>
    </div>
   </div>

   <!-- EDIT PROFIL -->
   <div class="card-body edit-profil">
    <div class="card">
     <div class="card-body">
      <!-- USERNAME -->
      <div class="row username">
       <div class="col" style=" max-width: 125px;">
        <label for="username" class="col-form-label-sm">Username</label>
       </div>
       <div class="col">
        <input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Silahkan masukan username Anda" require autofocus>
       </div>
      </div>
      <!-- NO HP -->
      <div class="row no_hp">
       <div class="col" style=" max-width: 125px;">
        <label for="no_hp" class="col-form-label-sm">No HP</label>
       </div>
       <div class="col">
        <input type="text" name="no_hp" id="no_hp" class="form-control form-control-sm" placeholder="Silahkan masukan No HP Anda" require>
       </div>
      </div>
      <!-- EMAIL -->
      <div class="row email">
       <div class="col" style=" max-width: 125px;">
        <label for="email" class="col-form-label-sm">Email</label>
       </div>
       <div class="col">
        <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="Silahkan masukan email Anda" require>
       </div>
      </div>
      <!-- FOTO USER -->
      <div class="row foto_user">
       <div class="col" style=" max-width: 125px;">
        <label for="foto_user" id="labelFot" class="col-form-label-sm">Foto User</label>
       </div>
       <!-- save nama foto user lama -->
       <input type="hidden" class="form-control" id="foto_user1" name="foto_user2" value="">

       <!-- INPUT  FILE -->
       <div class="inputgambaruser">
        <input type="file" name="foto_user" id="input_foto" class="cursor-pointer" accept=".jpg,.jpeg,.png">
       </div>

       <!-- IMG HASIL FOTO -->
       <div class="hasilgambaruser">
        <img src="" alt="Foto User" id="hasil_foto" style="min-width: 100px;max-width: 321px;">
       </div>
      </div>
      <!-- BUTTON -->
      <div class="row text-center">
       <div class="col">
        <a href="#" class="btn btn-outline-primary">Update</a>
       </div>
       <div class="col">
        <a href="#" class="btn btn-outline-warning">Reset</a>
       </div>
      </div>
     </div>
    </div>
   </div>

   <!-- EDIT PASSWORD -->
   <div class="card-body edit-password">
    <div class="card">
     <div class="card-body">
      <!-- PASSWORD LAMA-->
      <div class="row password">
       <div class="col" style=" max-width: 125px;">
        <label for="passwordlama" class="col-form-label-sm">Password Lama</label>
       </div>
       <div class="col">
        <input type="password" name="password" id="passwordlama" class="form-control form-control-sm" placeholder="Silahkan masukan password lama Anda" require autofocus>
       </div>
      </div>
      <!-- PASSWORD BARU-->
      <div class="row password">
       <div class="col" style=" max-width: 125px;">
        <label for="passwordbaru" class="col-form-label-sm">Password Baru</label>
       </div>
       <div class="col">
        <input type="password" name="password" id="passwordbaru" class="form-control form-control-sm" placeholder="Silahkan masukan password baru Anda" require autofocus>
       </div>
      </div>
      <!-- PASSWORD KONFIRMASI-->
      <div class="row password">
       <div class="col" style=" max-width: 125px;">
        <label for="passwordkonfirmasi" class="col-form-label-sm">Konfirmasi</label>
       </div>
       <div class="col">
        <input type="password" name="password" id="passwordkonfirmasi" class="form-control form-control-sm" placeholder="Konfirmasi password baru Anda" require autofocus>
       </div>
      </div>
      <!-- BUTTON -->
      <div class="row text-center">
       <div class="col">
        <a href="#" class="btn btn-outline-primary">Update</a>
       </div>
       <div class="col">
        <a href="#" class="btn btn-outline-warning">Reset</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<script>
 const eprofil = document.querySelectorAll('.edit-profil');
 const epassword = document.querySelectorAll('.edit-password');

 const btnEdit = document.getElementById('btn-edit-profil');
 const btnPass = document.getElementById('btn-edit-password');
 const btnBatal = document.getElementById('btn-edit-batal');

 eprofil.forEach(element => {
  element.style.display = 'none'
 })
 epassword.forEach(element => {
  element.style.display = 'none'
 })

 btnEdit.addEventListener('click', function() {
  eprofil.forEach(element => {
   element.style.display = 'block'
  })
  epassword.forEach(element => {
   element.style.display = 'none'
  })
 })

 btnPass.addEventListener('click', function() {
  eprofil.forEach(element => {
   element.style.display = 'none'
  })
  epassword.forEach(element => {
   element.style.display = 'block'
  })
 })

 btnBatal.addEventListener('click', function() {
  eprofil.forEach(element => {
   element.style.display = 'none'
  })
  epassword.forEach(element => {
   element.style.display = 'none'
  })
 })
</script>

<?= $this->endSection('content') ?>