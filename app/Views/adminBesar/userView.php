<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>


<div class="" style="text-align: center; display: content;">
 <h2>Daftar User
 </h2>
</div>
<div class="mb-2 d-flex justify-content-between">
 <!-- <div class="" style="margin-bottom: -10px;"> -->
 <a class="btn btn-warning px-3" href="<?= base_url('DashboardController'); ?>" style="padding-top: 1rem;">
  <i class="fi fi-rr-left text-xl"></i>
 </a>
 <!-- </div> -->
 <div class="">

  <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-add" class="right-0">
   <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
   Tambah User
  </button>
 </div>

</div>


<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 <i class="fi fi-rr-plus" style="font-size: 2rem;"></i>
</button> -->

<?php if (!empty($user)) :
 $no = 1;
?>
 <div class="table-responsive">
  <table class="table" id="example">
   <thead>
    <tr>
     <th scope="col">No</th>
     <th scope="col">Username</th>
     <th scope="col">No HP</th>
     <th scope="col">Email</th>
     <th scope="col">Gudang</th>
     <th scope="col">Status</th>
     <th scope="col">Aksi</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach ($user2 as $row) : ?>
     <tr>
      <th scope="row">
       <?= $no++; ?>
      </th>
      <td>
       <?= $row['username']; ?>
      </td>
      <td>
       <?= $row['no_hp']; ?>
      </td>
      <td>
       <?= $row['email']; ?>
      </td>
      <td>
       <?= $row['nama_gudang']; ?>
      </td>
      <td>
       <?= $row['status']; ?>
      </td>
      <td>
       <!-- Tombol Info -->
       <span type="button" class="badge rounded-pill text-bg-primary" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="infoData(<?= $row['id_user']; ?>,`<?= $row['username']; ?>`,`<?= $row['kode_gudang']; ?>`,`<?= $row['password']; ?>`,`<?= $row['foto_user']; ?>`,`<?= $row['no_hp']; ?>`,`<?= $row['email']; ?>`,`<?= $row['status']; ?>`)" id="btn-info">
        <i class="fi fi-rr-info"></i>
       </span>
       <!-- Tombol Edit -->
       <span type="button" class="badge rounded-pill text-bg-warning" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editData(<?= $row['id_user']; ?>,`<?= $row['username']; ?>`,`<?= $row['kode_gudang']; ?>`,`<?= $row['status']; ?>`)" id="btn-edit">
        <i class="fi fi-rr-edit"></i>
       </span>
      </td>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 </div>
<?php else : ?>
 <p>Tidak ada data gudang.</p>
<?php endif; ?>

<!-- TAMBAH USER -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">User Baru</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="btn-close"></button>
   </div>
   <form method="post" action="<?= base_url('/UserController/store'); ?>" enctype="multipart/form-data">
    <div class="modal-body">

     <input type="hidden" class="form-control" id="id_user" name="id_user" value="">

     <div class="mb-3">
      <label for="username" class="col-form-label">Username</label>
      <input type="text" required class="form-control" id="username" name="username" placeholder="masukan nama user ...">
     </div>

     <div class="mb-3 hilang">
      <label for="password" id="labelPas" class="col-form-label">Password</label>
      <input type="password" required class="form-control" id="password" name="password" placeholder="masukan password user ...">
     </div>

     <div class="mb-3">
      <label for="kode_gudang" class="col-form-label">Gudang</label>
      <input type="text" class="form-control" id="gudang-text" disabled>
      <select class="form-select" required size="2" aria-label="Size 3 select example" id="kode_gudang" name="kode_gudang">
       <?php foreach ($gudangaktif as $ga) { ?>
        <option value="<?= $ga['kode_gudang'] ?>"><?= $ga['nama_gudang'] ?></option>
       <?php } ?>
      </select>
     </div>

     <div class="mb-3 hilang">
      <label for="no_hp" class="col-form-label">No HP</label>
      <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="masukan no_hp user ...">
     </div>
     <div class="mb-3 hilang">
      <label for="email" class="col-form-label">email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="masukan email user ...">
     </div>

     <div class="mb-3">
      <label for="foto_user" id="labelFot" class="col-form-label">Foto User</label>
      <!-- save nama foto user lama -->
      <input type="hidden" class="form-control" id="foto_user1" name="foto_user2" value="">

      <div class="inputgambaruser">
       <!-- <br> -->
       <input type="file" name="foto_user" id="input_foto" class="cursor-pointer" accept=".jpg,.jpeg,.png">
      </div>

      <div class="hasilgambaruser">
       <!-- <br> -->
       <img src="" alt="Foto User" id="hasil_foto" style="min-width: 100px;max-width: 321px;">
      </div>
     </div>

     <div class="mb-3">
      <label for="status" class="col-form-label">Status</label>
      <input type="text" required class="form-control" id="status-text" disabled>
      <select class="form-select" aria-label="Default select example" id="status" name="status">
       <option value="aktif" selected>Aktif</option>
       <option value="nonaktif">Nonaktif</option>
      </select>
     </div>

    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="btn-close">Close</button>
     <button type="button" class="btn btn-warning" id="btn-reset">Reset</button>
     <button type="button" class="btn btn-warning" id="btn-reset2">Reset</button>
     <button type="submit" class="btn btn-primary" id="btn-form">Save</button>
     <button type="submit" class="btn btn-primary" id="btn-save">Tambahhh</button>
    </div>
   </form>
  </div>
 </div>
</div>

<!-- KURANG
tombol reset saat edit belum bisa
-->

<script>
 // datatables
 new DataTable('#example');

 // Tambah & Edit Gudang
 // name= id_user username password kode_gudang no_hp email foto_user2(hidden) foto_user(file) status
 // id= gudang-text(disabled) foto_user1(hidden) input_foto(file) hasil_foto(img) status-text(disabled)

 const btnAdd = document.getElementById('btn-add');
 const btnClose = document.getElementsByName('btn-close');
 const btnEdit = document.querySelector('#btn-edit');
 const btnForm = document.querySelector('#btn-form');
 const btnsave = document.querySelector('#btn-save');
 const btnInfo = document.querySelector('#btn-info');
 const btnReset = document.querySelector('#btn-reset');
 const btnReset2 = document.querySelector('#btn-reset2');

 const modalExample = document.querySelector('#exampleModal');
 const modelTitle = document.querySelector('#exampleModalLabel');

 const elKode = document.querySelector('#id_user');
 const elNama = document.querySelector('#username');
 const elPassword = document.querySelector('#password');
 const elkode_gudang = document.querySelector('#kode_gudang');
 const elno_hp = document.querySelector('#no_hp');
 const elemail = document.querySelector('#email');
 const elFoto = document.querySelector('#input_foto');
 const elHasilFoto = document.querySelector('#hasil_foto');
 const elStatus = document.querySelector('#status');

 const elHiddenFoto = document.getElementById('foto_user1');
 const elStatusText = document.querySelector('#status-text');
 const elGudangText = document.querySelector('#gudang-text');

 const hilang = document.querySelectorAll('.hilang');
 const labelPas = document.querySelector('#labelPas');
 const labelFot = document.querySelector('#labelFot');

 let reGudang, reStatus = "";

 function hapusReadOnly() {
  elKode.removeAttribute('readonly');
  elPassword.removeAttribute('readonly');
  elNama.removeAttribute('readonly');
  elkode_gudang.removeAttribute('readonly');
  elno_hp.removeAttribute('readonly');
  elemail.removeAttribute('readonly');
 }

 function beriReadOnly() {
  elKode.setAttribute('readonly', true);
  elNama.setAttribute('readonly', true);
  elPassword.setAttribute('readonly', true);
  elkode_gudang.setAttribute('readonly', true);
  elno_hp.setAttribute('readonly', true);
  elemail.setAttribute('readonly', true);
  elGudangText.setAttribute('readonly', true);
  elStatusText.setAttribute('readonly', true);
 }

 function clearForm() {
  elKode.value = "";
  elNama.value = "";
  elPassword.value = "";
  elkode_gudang.value = '';
  elemail.value = "";
  elno_hp.value = '';
  elFoto.value = "";
  elStatus.value = "aktif";
  // btnForm.innerHTML = 'Tambah';
  elHasilFoto.src = "";
 }

 btnAdd.addEventListener('click', function() {
  btnForm.style.display = 'none';
  btnsave.style.display = 'block';
  btnReset.style.display = 'block';
  btnReset2.style.display = 'none';
  hilang.forEach(element => {
   element.style.display = 'block';
  });
  // hilang.style.display = 'block';

  elStatusText.style.display = 'none';
  elGudangText.style.display = 'none';
  elNama.style.display = 'block';
  elPassword.style.display = 'block';
  elkode_gudang.style.display = 'block';
  elno_hp.style.display = 'block';
  elemail.style.display = 'block';
  elFoto.style.display = 'block';
  elHasilFoto.style.display = 'block';
  elStatus.style.display = 'block';
  labelPas.style.display = 'block';
  labelFot.style.display = 'block';

  modelTitle.innerHTML = 'Tambah User';

  clearForm();
  hapusReadOnly();
 });

 btnReset.addEventListener('click', function() {
  clearForm();
 })

 function editData(kode, username, kode_gudang, status) {
  btnForm.style.display = 'block';
  btnsave.style.display = 'none';
  btnReset.style.display = 'none';
  btnReset2.style.display = 'block';
  hilang.forEach(element => {
   element.style.display = 'none';
  });
  // hilang.style.display = 'none';

  elStatusText.style.display = 'none';
  elGudangText.style.display = 'none';
  elNama.style.display = 'block';
  elPassword.style.display = 'none';
  elkode_gudang.style.display = 'block';
  elno_hp.style.display = 'none';
  elemail.style.display = 'none';
  elFoto.style.display = 'none';
  elHasilFoto.style.display = 'none';
  elStatus.style.display = 'block';
  labelPas.style.display = 'none';
  labelFot.style.display = 'none';

  modelTitle.innerHTML = 'Edit User';
  elKode.value = kode;
  elNama.value = username;
  elkode_gudang.value = kode_gudang;
  elStatus.value = status;
  btnForm.innerHTML = 'Update';

  hapusReadOnly();
  elNama.setAttribute('readonly', true);
  elPassword.setAttribute('readonly', true);

  reGudang = kode_gudang;
  reStatus = status;
 }

 function ambilGambar(foto_saja) {
  // Menyimpan URL gambar sebelumnya
  let previousImageUrl = ''; // Inisialisasi variabel untuk menyimpan URL gambar sebelumnya

  // Menetapkan URL gambar sebelumnya ke elemen img
  previousImageUrl = foto_saja;

  // Menggabungkan base_url dan previousImageUrl dalam pathGambarGudang
  let pathGambarGudang = '<?= base_url('gambar_user/') ?>' + previousImageUrl;

  console.log(pathGambarGudang); // Untuk memeriksa pathGambarGudang dalam konsol
  return pathGambarGudang;
 }

 function infoData(kode, username, kode_gudang, password, foto_user, no_hp, email, status) {
  btnForm.style.display = 'none';
  btnsave.style.display = 'none';
  btnReset.style.display = 'none';
  btnReset2.style.display = 'none';

  hilang.forEach(element => {
   element.style.display = 'block';
  });
  // hilang.style.display = 'block';

  elStatusText.style.display = 'block';
  elGudangText.style.display = 'block';
  elNama.style.display = 'block';
  elPassword.style.display = 'none';
  elkode_gudang.style.display = 'none';
  elno_hp.style.display = 'block';
  elemail.style.display = 'block';
  elFoto.style.display = 'none';
  elHasilFoto.style.display = 'block';
  elStatus.style.display = 'none';
  labelPas.style.display = 'none';
  labelFot.style.display = 'block';

  fetchNamaGudang(kode_gudang);

  modelTitle.innerHTML = 'Info User';
  elKode.value = kode;
  elNama.value = username;
  elPassword.value = password;
  elkode_gudang.value = kode_gudang;
  elno_hp.value = no_hp;
  elemail.value = email;
  // elGudangText.value = kode_gudang;
  // elFoto.value = foto_user;
  elStatusText.value = status;

  beriReadOnly();

  elHasilFoto.src = ambilGambar(foto_user);
 }

 // Fungsi untuk mengambil nama gudang dari kode_gudang menggunakan fetch API
 function fetchNamaGudang(kodeGudang) {
  // Menggunakan fetch atau XMLHttpRequest untuk mengambil data dari server
  fetch('UserController/getGudangById/' + kodeGudang)
   .then(response => response.json())
   .then(data => {
    let elGudangText = document.querySelector('#gudang-text');
    if (data) {
     elGudangText.value = data.nama_gudang;
    } else {
     elGudangText.value = 'Gudang tidak ditemukan';
    }
   })
   .catch(error => {
    console.error('Error:', error);
   });
 }

 function resetData() {
  elkode_gudang.value = reGudang;
  elStatus.value = reStatus;
 }

 btnReset2.addEventListener('click', function() {
  // inputan kembali seperti data awal  
  resetData();
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

<!-- cek kesamaan username  -->


<?= $this->endSection('content') ?>