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
      <button type="button" class="btn btn-outline-primary" id="btn-edit-profil">Edit Profil</button>
     </div>
     <div class="col">
      <button type="button" class="btn btn-outline-warning" id="btn-edit-password">Edit Password</button>
     </div>
     <div class="col">
      <button type="button" class="btn btn-outline-danger" id="btn-edit-batal">Batal</button>
     </div>
    </div>
   </div>

   <!-- EDIT PROFIL -->
   <form action="<?= base_url('/UserAllController/storeProfil'); ?>" method="post" enctype="multipart/form-data">
    <div class="card-body edit-profil">
     <div class="card">
      <div class="card-body">
       <!-- USERNAME -->
       <div class="row username">
        <div class="col" style=" max-width: 125px;">
         <label for="username" class="col-form-label-sm">Username</label>
        </div>
        <div class="col">
         <input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Silahkan masukan username Anda" required autofocus>
        </div>
        <div class="col" style="max-width: 35px; margin-top: 5px;">
         <!-- <small style="color: blue;" id="masihutuh"><i>masih utuh</i></small> -->
         <!-- <small style="color: red;" id="sudahada"><i class="fi fi-rr-circle-xmark"></i></small>
         <small style="color: green;" id="belumada"><i> belum ada</i></small> -->
         <!-- <small> -->
         <i class="fi fi-rr-circle-xmark" id="sudahada" style="color: red;margin: 0px;"></i>
         <i class="fi fi-rr-check-circle" id="belumada" style="color: green;margin: 0px;"></i>
         <!-- </small> -->
        </div>
       </div>
       <!-- NO HP -->
       <div class="row no_hp">
        <div class="col" style=" max-width: 125px;">
         <label for="no_hp" class="col-form-label-sm">No HP</label>
        </div>
        <div class="col">
         <input type="text" name="no_hp" id="no_hp" class="form-control form-control-sm" placeholder="Silahkan masukan No HP Anda" required>
        </div>
       </div>
       <!-- EMAIL -->
       <div class="row email">
        <div class="col" style=" max-width: 125px;">
         <label for="email" class="col-form-label-sm">Email</label>
        </div>
        <div class="col">
         <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="Silahkan masukan email Anda" required>
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
         <button type="button" class="btn btn-outline-primary" id="btn-update-profil" data-bs-toggle="modal" data-bs-target="#exampleModal">Update</button>
        </div>
        <div class="col">
         <button type="button" class="btn btn-outline-warning" id="btn-reset-profil">Reset</button>
        </div>
       </div>
      </div>
     </div>
    </div>

    <!-- modal edit -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Info</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
        Setelah Data diupdate <br>
        Anda diminta untuk login kembali
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
        <button type="submit" class="btn btn-outline-primary">Yes</button>
       </div>
      </div>
     </div>
    </div>
   </form>

   <!-- EDIT PASSWORD -->
   <div class="card-body edit-password">
    <div class="card">
     <div class="card-body">
      <form action="<?= base_url('/UserAllController/storePassword'); ?>" method="post">
       <!-- PASSWORD LAMA-->
       <div class="row password">
        <div class="col" style=" max-width: 125px;">
         <label for="passwordlama" class="col-form-label-sm">Password Lama</label>
        </div>
        <div class="col">
         <input type="password" name="passwordlama" id="passwordlama" class="form-control form-control-sm" placeholder="Silahkan masukan password lama Anda" required autofocus>
        </div>
       </div>
       <!-- PASSWORD BARU-->
       <div class="row password">
        <div class="col" style=" max-width: 125px;">
         <label for="passwordbaru" class="col-form-label-sm">Password Baru</label>
        </div>
        <div class="col">
         <input type="password" name="passwordbaru" id="passwordbaru" class="form-control form-control-sm" placeholder="Silahkan masukan password baru Anda" required>
        </div>
       </div>
       <!-- PASSWORD KONFIRMASI-->
       <div class="row password">
        <div class="col" style=" max-width: 125px;">
         <label for="passwordkonfirmasi" class="col-form-label-sm">Konfirmasi</label>
        </div>
        <div class="col">
         <input type="password" name="passwordkonfirmasi" id="passwordkonfirmasi" class="form-control form-control-sm" placeholder="Konfirmasi password baru Anda" required>
        </div>
       </div>
       <!-- BUTTON -->
       <div class="row text-center">
        <div class="col">
         <button type="submit" class="btn btn-outline-primary" id="btn-update-password">Update</button>
        </div>
        <div class="col">
         <button type="button" class="btn btn-outline-warning" id="btn-reset-password">Reset</button>
        </div>
       </div>
      </form>
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

 // small info user
 // const masihUtuh = document.getElementById('masihutuh');
 const sudahAda = document.getElementById('sudahada');
 const belumAda = document.getElementById('belumada');
 sudahAda.style.display = 'none';
 belumAda.style.display = 'block';
 const usernameInput = document.getElementById('username');
 // Mendengarkan perubahan pada input username
 usernameInput.addEventListener('input', function() {
  const enteredUsername = this.value.trim(); // Mendapatkan nilai dari input dan menghapus spasi kosong di awal dan akhir

  // Lakukan validasi sesuai dengan aturan yang Anda tentukan
  if (enteredUsername.length < 5) {
   // Contoh validasi: username harus memiliki panjang minimal 5 karakter
   // Lakukan tindakan yang sesuai jika validasi tidak terpenuhi
   console.log('Username harus memiliki minimal 5 karakter');
   sudahAda.style.display = 'block';
   belumAda.style.display = 'none';
   btnUpdateProfil.disabled = true;
   alert('Password Lama yang Anda masukan Salah!');

   // Anda bisa menambahkan pesan kesalahan atau tindakan lain di sini
  } else {
   // Lakukan tindakan yang sesuai jika validasi terpenuhi
   console.log('Username valid');
   sudahAda.style.display = 'none';
   belumAda.style.display = 'block';
   btnUpdateProfil.disabled = false;

   // Anda bisa melakukan tindakan seperti mengubah warna input menjadi hijau, dll.
  }
 });


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
  elHiddenFoto.value = '<?= $useraktif->foto_user ?>'
  elFoto.value = ''
  elHasilFoto.src = '<?= base_url('gambar_user/' . $useraktif->foto_user) ?>'
 }

 function clearPassword() {
  elPasswordLama.value = ''
  elPasswordBaru.value = ''
  elPasswordKonfirmasi.value = ''
 }

 isiProfil();
 // btn edit profil
 btnEdit.addEventListener('click', function() {
  eprofil.forEach(element => {
   element.style.display = 'block'
  })
  epassword.forEach(element => {
   element.style.display = 'none'
  })
  // isi input
  // isiProfil()
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
 // btn reset password
 btnResetPassword.addEventListener('click', function() {
  clearPassword()
 })

 // btn batal edit
 btnBatal.addEventListener('click', function() {
  eprofil.forEach(element => {
   element.style.display = 'none'
  })
  epassword.forEach(element => {
   element.style.display = 'none'
  })
  isiProfil()
  clearPassword()
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

<script>
 // proses cek pasword lama
 // Mendapatkan nilai input password lama
 const passwordLama = document.getElementById('passwordlama').value;
 // jQuery
 $(document).ready(function() {
  $('#btn-update-password').click(function(e) {
   e.preventDefault(); // Mencegah form dari pengiriman default

   const passwordLama = document.getElementById('passwordlama').value;
   const passwordBaru = document.getElementById('passwordbaru').value;

   // Kirim data ke server menggunakan AJAX
   $.ajax({
    url: 'UserAllController/checkPasswordLama', // Ganti dengan URL endpoint di controller Anda
    method: 'POST',
    data: {
     passwordLama: passwordLama,
     passwordBaru: passwordBaru
    }, // Kirim data password lama
    success: function(response) {
     if (response === 'success') {
      // Jika respons dari server adalah 'success', maka password lama sesuai
      // Lakukan update tabel atau tindakan lain yang sesuai di sini
      alert('Password berhasil dirubah silahkan login kembali!');
      window.location.href = "<?= base_url('/LoginController/logOut'); ?>"; // Redirect ke halaman login setelah update
     } else {
      // Jika respons dari server adalah selain 'success', tampilkan alert
      alert('Password Lama yang Anda masukan Salah!');
     }
    },
    error: function() {
     // Menangani error jika terjadi
     alert('Terjadi kesalahan saat mengirim data.');
    }
   });
  });
 });
</script>

<script>
 //script untuk password kosong dan harus sama
 const passwordLamaInput = document.getElementById('passwordlama');
 const passwordBaruInput = document.getElementById('passwordbaru');
 const passwordKonfirmasiInput = document.getElementById('passwordkonfirmasi');
 const updateButton = document.getElementById('btn-update-password');
 updateButton.disabled = true;

 function checkInputs() {
  const passwordLama = passwordLamaInput.value;
  const passwordBaru = passwordBaruInput.value;
  const passwordKonfirmasi = passwordKonfirmasiInput.value;

  if (passwordLama !== '' && passwordBaru !== '' && passwordKonfirmasi !== '' && passwordBaru === passwordKonfirmasi) {
   updateButton.disabled = false;
  } else {
   updateButton.disabled = true;
  }
 }

 // Memeriksa setiap input saat nilainya berubah
 passwordLamaInput.addEventListener('input', checkInputs);
 passwordBaruInput.addEventListener('input', checkInputs);
 passwordKonfirmasiInput.addEventListener('input', checkInputs);
</script>

<?= $this->endSection('content') ?>