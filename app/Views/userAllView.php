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
       <div class="col">
        <input type="file" name="foto_user" id="input_foto" class="form-control form-control-sm" accept=".jpg,.jpeg,.png">
       </div>

       <!-- IMG HASIL FOTO -->
       <div class="text-center mb-2">
        <img src="" alt="Foto User" id="hasil_foto" style="min-width: 100px;max-width: 321px;">
       </div>
      </div>
      <!-- BUTTON -->
      <div class="row text-center">
       <div class="col">
        <a href="#" class="btn btn-outline-primary" id="btn-update-profil">Update</a>
       </div>
       <div class="col">
        <a href="#" class="btn btn-outline-warning" id="btn-reset-profil">Reset</a>
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
        <a href="#" class="btn btn-outline-primary" id="btn-update-password">Update</a>
       </div>
       <div class="col">
        <a href="#" class="btn btn-outline-warning" id="btn-reset-password">Reset</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<script>
 // div
 const eprofil = document.querySelectorAll('.edit-profil');
 const epassword = document.querySelectorAll('.edit-password');

 // btn 3 di atas
 const btnEdit = document.getElementById('btn-edit-profil');
 const btnPass = document.getElementById('btn-edit-password');
 const btnBatal = document.getElementById('btn-edit-batal');

 //  foto
 const elFoto = document.querySelector('#input_foto');
 const elHasilFoto = document.querySelector('#hasil_foto');
 const elHiddenFoto = document.getElementById('foto_user1');

 // edit profil
 const elNama = document.querySelector('#username');
 const elNoHP = document.querySelector('#no_hp');
 const elEmail = document.querySelector('#email');

 // btn di bawah edit profil
 const btnUpdateProfil = document.querySelector('#btn-update-profil');
 const btnResetProfil = document.querySelector('#btn-reset-profil');

 // edit password
 const elPasswordLama = document.querySelector('#passwordlama');
 const elPasswordBaru = document.querySelector('#passwordbaru');
 const elPasswordKonfirmasi = document.querySelector('#passwordkonfirmasi');

 // btn di bawah edit password
 const btnUpdatePassword = document.querySelector('#btn-update-password');
 const btnResetPassword = document.querySelector('#btn-reset-password');

 const elusername = '<?= $useraktif->username ?>'
 console.log(elusername)

 // div edit profil & password
 eprofil.forEach(element => {
  element.style.display = 'none'
 })
 epassword.forEach(element => {
  element.style.display = 'none'
 })

 function isiProfil() {
  elNama.value = '<?= $useraktif->username ?>'
  elNoHP.value = '<?= $useraktif->no_hp ?>'
  elEmail.value = '<?= $useraktif->email ?>'
  elFoto.value = ''
  elHasilFoto.src = '<?= base_url('gambar_user/' . $useraktif->foto_user) ?>'
 }

 // btn edit profil
 btnEdit.addEventListener('click', function() {
  eprofil.forEach(element => {
   element.style.display = 'block'
  })
  epassword.forEach(element => {
   element.style.display = 'none'
  })
  // isi input
  isiProfil()
 })

 // btn reset profil
 btnResetProfil.addEventListener('click', function() {
  isiProfil()
 })

 // btn edit password
 btnPass.addEventListener('click', function() {
  eprofil.forEach(element => {
   element.style.display = 'none'
  })
  epassword.forEach(element => {
   element.style.display = 'block'
  })
 })

 // btn batal edit
 btnBatal.addEventListener('click', function() {
  eprofil.forEach(element => {
   element.style.display = 'none'
  })
  epassword.forEach(element => {
   element.style.display = 'none'
  })
 })


 // Mendengarkan perubahan pada input file
 elFoto.addEventListener('change', function() {
  const file = elFoto.files[0]; // Mengambil file yang dipilih

  // Memeriksa apakah file telah dipilih
  if (file) {
   const reader = new FileReader();

   // Saat file selesai dibaca
   reader.onload = function(event) {
    elHasilFoto.src = event.target.result; // Menampilkan gambar yang dipilih pada elemen img
   };

   // Membaca file sebagai URL data
   reader.readAsDataURL(file);
  } else {
   elHasilFoto.src = previousImageUrl; // Jika tidak ada file yang dipilih, kosongkan elemen img
  }
 });
</script>

<?= $this->endSection('content') ?>