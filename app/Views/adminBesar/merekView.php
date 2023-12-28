<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>


<div class="" style="text-align: center; display: content;">
 <h2>Daftar Merek
 </h2>
</div>
<div class="mb-2 d-flex justify-content-between">
 <!-- <div class="" style="margin-bottom: -10px;"> -->
 <a class="btn btn-warning px-3" href="<?= base_url('DashboardController'); ?>" style="padding-top: 1rem;">
  <i class="fi fi-rr-left text-xl"></i>
 </a>
 <!-- </div> -->
 <div class="">
  <?php
  if (session('jenis') == 'besar') {
  ?>
   <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn-add" class="right-0">
    <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
    Tambah Merek
   </button>
  <?php } ?>
 </div>
</div>


<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 <i class="fi fi-rr-plus" style="font-size: 2rem;"></i>
</button> -->

<?php if (!empty($merek)) :
 $no = 1;
?>
 <div class="table-responsive">
  <table class="table" id="example">
   <thead>
    <tr>
     <th scope="col">No</th>
     <th scope="col">Nama Merek</th>
     <th scope="col">Kategori Produk</th>
     <th scope="col">Pemilik</th>
     <th scope="col">Status</th>
     <th scope="col">Aksi</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach ($merek as $row) : ?>
     <tr>
      <th scope="row">
       <?= $no++; ?>
      </th>
      <td>
       <?= $row['nama_merek']; ?>
      </td>
      <td>
       <?= $row['kategori_produk']; ?>
      </td>
      <td>
       <?= $row['pemilik']; ?>
      </td>
      <td>
       <?= $row['status']; ?>
      </td>
      <td>
       <!-- Tombol Info -->
       <span type="button" class="badge rounded-pill text-bg-primary" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="infoData(<?= $row['id_merek']; ?>,`<?= $row['nama_merek']; ?>`,`<?= $row['kategori_produk']; ?>`,`<?= $row['deskripsi']; ?>`,`<?= $row['logo']; ?>`,`<?= $row['pemilik']; ?>`,`<?= $row['status']; ?>`)" id="btn-info">
        <i class="fi fi-rr-info"></i>
       </span>
       <!-- Tombol Edit -->
       <?php
       if (session('jenis') == 'besar') {
       ?>
        <span type="button" class="badge rounded-pill text-bg-warning" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editData(<?= $row['id_merek']; ?>,`<?= $row['nama_merek']; ?>`,`<?= $row['kategori_produk']; ?>`,`<?= $row['deskripsi']; ?>`,`<?= $row['logo']; ?>`,`<?= $row['pemilik']; ?>`,`<?= $row['status']; ?>`)" id="btn-edit">
         <i class="fi fi-rr-edit"></i>
        </span>
       <?php } ?>
      </td>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 </div>
<?php else : ?>
 <p>Tidak ada data Merek.</p>
<?php endif; ?>

<!-- TAMBAH Merek -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Merek Baru</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="btn-close"></button>
   </div>
   <form method="post" action="<?= base_url('/MerekController/store'); ?>" enctype="multipart/form-data">
    <div class="modal-body">

     <input type="hidden" class="form-control" id="id_merek" name="id_merek" value="">

     <div class="mb-3">
      <label for="nama_merek" class="col-form-label">Nama Merek</label>
      <input type="text" required class="form-control" id="nama_merek" name="nama_merek" placeholder="masukan nama merek ...">
     </div>

     <div class="mb-3">
      <label for="kategori_produk" class="col-form-label">Kategori Produk</label>
      <input type="text" required class="form-control" id="kategori_produk" name="kategori_produk" placeholder="masukan kategori produk ...">
     </div>

     <div class="mb-3">
      <label for="pemilik" class="col-form-label">Pemilik</label>
      <input type="text" required class="form-control" id="pemilik" name="pemilik" placeholder="masukan kategori produk ...">
     </div>

     <div class="mb-3">
      <label for="deskripsi" class="col-form-label">Deskripsi</label>
      <br>
      <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"></textarea>
     </div>

     <div class="mb-3">
      <label for="logo" class="col-form-label">Logo</label>
      <!-- save nama foto merek lama -->
      <input type="hidden" class="form-control" id="logo1" name="logo2" value="">

      <div class="inputgambarmerek">
       <!-- <br> -->
       <input type="file" name="logo" id="input_foto" class="cursor-pointer" accept=".jpg,.jpeg,.png">
      </div>

      <div class="hasilgambarmerek">
       <!-- <br> -->
       <img src="" alt="Foto Merek" id="hasil_foto" style="min-width: 100px;max-width: 321px;">
      </div>
     </div>

     <div class="mb-3">
      <label for="status" class="col-form-label">Status</label>
      <input type="text" class="form-control" id="status-text" readonly>
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
    </div>
   </form>
  </div>
 </div>
</div>
<br>

<!-- KURANG
tombol reset saat edit belum bisa
-->

<script>
 // datatables
 new DataTable('#example');

 // Tambah & Edit Merek


 const btnAdd = document.getElementById('btn-add');
 const btnClose = document.getElementsByName('btn-close');
 const btnEdit = document.querySelector('#btn-edit');
 const btnForm = document.querySelector('#btn-form');
 const btnInfo = document.querySelector('#btn-info');
 const btnReset = document.querySelector('#btn-reset');
 const btnReset2 = document.querySelector('#btn-reset2');

 const modalExample = document.querySelector('#exampleModal');
 const modelTitle = document.querySelector('#exampleModalLabel');

 const elKode = document.querySelector('#id_merek');
 const elNama = document.querySelector('#nama_merek');
 const elKategori = document.querySelector('#kategori_produk');
 const elDeskripsi = document.querySelector('#deskripsi');
 const elPemilik = document.querySelector('#pemilik');
 const elStatus = document.querySelector('#status');
 const elFoto = document.querySelector('#input_foto');
 const elHasilFoto = document.querySelector('#hasil_foto');

 const elHiddenFoto = document.getElementById('logo1');
 const elStatusText = document.querySelector('#status-text');

 let reNama, reKategori, reDeskripsi, reFoto, reStatus, rePemilik, reHiddenFoto, reHasilFoto = "";

 function hapusReadOnly() {
  elKode.removeAttribute('readonly');
  elNama.removeAttribute('readonly');
  elKategori.removeAttribute('readonly');
  elDeskripsi.removeAttribute('readonly');
  elPemilik.removeAttribute('readonly');
 }

 function beriReadOnly() {
  elKode.setAttribute('readonly', true);
  elNama.setAttribute('readonly', true);
  elKategori.setAttribute('readonly', true);
  elDeskripsi.setAttribute('readonly', true);
  elPemilik.setAttribute('readonly', true);
 }

 function clearForm() {
  elKode.value = "";
  elNama.value = "";
  elKategori.value = "";
  elDeskripsi.value = "";
  elPemilik.value = "";
  elStatus.value = "aktif";
  elFoto.value = "";
  btnForm.innerHTML = 'Tambah';
  elHasilFoto.src = "";
 }

 btnAdd.addEventListener('click', function() {
  btnForm.style.display = 'block';
  btnReset.style.display = 'block';
  btnReset2.style.display = 'none';

  elStatusText.style.display = 'none';
  elStatus.style.display = 'block';
  elFoto.style.display = 'block';

  modelTitle.innerHTML = 'Tambah Merek';

  clearForm();
  hapusReadOnly();
 });

 btnReset.addEventListener('click', function() {
  clearForm();
 })

 function editData(kode, nama_merek, kategori, deskripsi, logo, pemilik, status) {
  btnForm.style.display = 'block';
  btnReset.style.display = 'none';
  btnReset2.style.display = 'block';

  elStatusText.style.display = 'none';
  elStatus.style.display = 'block';
  elFoto.style.display = 'block';

  modelTitle.innerHTML = 'Edit Merek';
  elKode.value = kode;
  elNama.value = nama_merek;
  elKategori.value = kategori;
  elDeskripsi.value = deskripsi;
  elPemilik.value = pemilik;
  elStatus.value = status;
  btnForm.innerHTML = 'Update';
  elHiddenFoto.value = logo;
  console.log(elHiddenFoto.value);

  hapusReadOnly();

  elHasilFoto.src = ambilGambar(logo);

  reNama = nama_merek;
  reKategori = kategori;
  reDeskripsi = deskripsi;
  rePemilik = pemilik;
  reStatus = status;
  reHiddenFoto = logo;
  reHasilFoto = ambilGambar(logo);
 }

 function ambilGambar(foto_saja) {
  // Menyimpan URL gambar sebelumnya
  let previousImageUrl = ''; // Inisialisasi variabel untuk menyimpan URL gambar sebelumnya

  // Menetapkan URL gambar sebelumnya ke elemen img
  previousImageUrl = foto_saja;

  // Menggabungkan base_url dan previousImageUrl dalam pathGambarMerek
  let pathGambarMerek = '<?= base_url('gambar_merek/') ?>' + previousImageUrl;

  console.log(pathGambarMerek); // Untuk memeriksa pathGambarMerek dalam konsol
  return pathGambarMerek;
 }

 function infoData(kode, nama_merek, kategori, deskripsi, logo, pemilik, status) {
  btnForm.style.display = 'none';
  btnReset.style.display = 'none';
  btnReset2.style.display = 'none';

  elStatusText.style.display = 'block';
  elStatus.style.display = 'none';
  elFoto.style.display = 'none';

  modelTitle.innerHTML = 'Info Merek';
  elKode.value = kode;
  elNama.value = nama_merek;
  elKategori.value = kategori;
  elDeskripsi.value = deskripsi;
  elPemilik.value = pemilik;
  elStatusText.value = status;

  beriReadOnly();

  elHasilFoto.src = ambilGambar(logo);
 }

 function resetData() {
  elNama.value = reNama;
  elKategori.value = reKategori;
  elDeskripsi.value = reDeskripsi;
  elPemilik.value = rePemilik;
  elStatus.value = reStatus;
  elHiddenFoto.value = reHiddenFoto;
  elHasilFoto.src = reHasilFoto;
  // hapus inputan pada type file foto
  elFoto.value = "";
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


<?= $this->endSection('content') ?>