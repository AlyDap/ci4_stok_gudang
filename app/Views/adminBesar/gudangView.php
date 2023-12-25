<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>


<div class="" style="text-align: center; display: content;">
 <h2>Daftar Gudang
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
   Tambah Gudang
  </button>
 </div>

</div>


<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 <i class="fi fi-rr-plus" style="font-size: 2rem;"></i>
</button> -->

<?php if (!empty($gudang)) :
 $no = 1;
?>
 <div class="table-responsive">
  <table class="table" id="example">
   <thead>
    <tr>
     <th scope="col">No</th>
     <th scope="col">Nama Gudang</th>
     <th scope="col">Jenis</th>
     <th scope="col">Alamat</th>
     <th scope="col">Status</th>
     <th scope="col">Aksi</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach ($gudang as $row) : ?>
     <tr>
      <th scope="row">
       <?= $no++; ?>
      </th>
      <td>
       <?= $row['nama_gudang']; ?>
      </td>
      <td>
       <?= $row['jenis']; ?>
      </td>
      <td>
       <?= $row['alamat']; ?>
      </td>
      <td>
       <?= $row['status']; ?>
      </td>
      <td>
       <!-- Tombol Info -->
       <span type="button" class="badge rounded-pill text-bg-primary" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="infoData(<?= $row['kode_gudang']; ?>,`<?= $row['nama_gudang']; ?>`,`<?= $row['alamat']; ?>`,`<?= $row['jenis']; ?>`,`<?= $row['foto_gudang']; ?>`,`<?= $row['keterangan']; ?>`,`<?= $row['status']; ?>`)" id="btn-info">
        <i class="fi fi-rr-info"></i>
       </span>
       <!-- Tombol Edit -->
       <span type="button" class="badge rounded-pill text-bg-warning" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editData(<?= $row['kode_gudang']; ?>,`<?= $row['nama_gudang']; ?>`,`<?= $row['alamat']; ?>`,`<?= $row['jenis']; ?>`,`<?= $row['foto_gudang']; ?>`,`<?= $row['keterangan']; ?>`,`<?= $row['status']; ?>`)" id="btn-edit">
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

<!-- TAMBAH GUDANG -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Gudang Baru</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="btn-close"></button>
   </div>
   <form method="post" action="<?= base_url('/GudangController/store'); ?>" enctype="multipart/form-data">
    <div class="modal-body">

     <input type="hidden" class="form-control" id="kode_gudang" name="kode_gudang" value="">

     <div class="mb-3">
      <label for="nama_gudang" class="col-form-label">Nama Gudang</label>
      <input type="text" required class="form-control" id="nama_gudang" name="nama_gudang" placeholder="masukan nama gudang ...">
     </div>

     <div class="mb-3">
      <label for="alamat" class="col-form-label">Alamat</label>
      <input type="text" required class="form-control" id="alamat" name="alamat" placeholder="masukan alamat gudang ...">
     </div>

     <div class="mb-3">
      <label for="jenis" class="col-form-label">Jenis Gudang</label>
      <input type="text" required class="form-control" id="jenis-text" disabled>
      <select class="form-select" size="2" aria-label="Size 3 select example" id="jenis" name="jenis">
       <option selected value="kecil">kecil</option>
       <option value="besar">besar</option>
      </select>
     </div>

     <div class="mb-3">
      <label for="keterangan" class="col-form-label">Keterangan</label>
      <br>
      <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
     </div>

     <div class="mb-3">
      <label for="foto_gudang" class="col-form-label">Foto Gudang</label>
      <!-- save nama foto gudang lama -->
      <input type="hidden" class="form-control" id="foto_gudang1" name="foto_gudang2" value="">

      <div class="inputgambargudang">
       <!-- <br> -->
       <input type="file" name="foto_gudang" id="input_foto" class="cursor-pointer" accept=".jpg,.jpeg,.png">
      </div>

      <div class="hasilgambargudang">
       <!-- <br> -->
       <img src="" alt="Foto Gudang" id="hasil_foto" style="min-width: 100px;max-width: 321px;">
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


 const btnAdd = document.getElementById('btn-add');
 const btnClose = document.getElementsByName('btn-close');
 const btnEdit = document.querySelector('#btn-edit');
 const btnForm = document.querySelector('#btn-form');
 const btnInfo = document.querySelector('#btn-info');
 const btnReset = document.querySelector('#btn-reset');
 const btnReset2 = document.querySelector('#btn-reset2');

 const modalExample = document.querySelector('#exampleModal');
 const modelTitle = document.querySelector('#exampleModalLabel');

 const elKode = document.querySelector('#kode_gudang');
 const elNama = document.querySelector('#nama_gudang');
 const elAlamat = document.querySelector('#alamat');
 const elJenis = document.querySelector('#jenis');
 const elFoto = document.querySelector('#input_foto');
 const elHasilFoto = document.querySelector('#hasil_foto');
 const elStatus = document.querySelector('#status');
 const elKeterangan = document.querySelector('#keterangan');

 const elHiddenFoto = document.getElementById('foto_gudang1');
 const elStatusText = document.querySelector('#status-text');
 const elJenisText = document.querySelector('#jenis-text');

 let reNama, reAlamat, reJenis, reFoto, reStatus, reKeterangan, reHiddenFoto, reHasilFoto = "";

 function hapusReadOnly() {
  elKode.removeAttribute('readonly');
  elNama.removeAttribute('readonly');
  elAlamat.removeAttribute('readonly');
  elKeterangan.removeAttribute('readonly');
 }

 function beriReadOnly() {
  elKeterangan.setAttribute('readonly', true);
  elKode.setAttribute('readonly', true);
  elNama.setAttribute('readonly', true);
  elAlamat.setAttribute('readonly', true);
  elJenisText.setAttribute('readonly', true);
  elStatusText.setAttribute('readonly', true);
 }

 function clearForm() {
  elKode.value = "";
  elNama.value = "";
  elAlamat.value = "";
  elJenis.value = "kecil";
  elFoto.value = "";
  elStatus.value = "aktif";
  btnForm.innerHTML = 'Tambah';
  elHasilFoto.src = "";
  elKeterangan.value = 'Ini adalah gudang cabang ... ';
 }

 btnAdd.addEventListener('click', function() {
  btnForm.style.display = 'block';
  btnReset.style.display = 'block';
  btnReset2.style.display = 'none';

  elStatusText.style.display = 'none';
  elJenisText.style.display = 'none';
  elJenis.style.display = 'block';
  elStatus.style.display = 'block';
  elFoto.style.display = 'block';

  modelTitle.innerHTML = 'Tambah Gudang';

  clearForm();
  hapusReadOnly();
 });

 btnReset.addEventListener('click', function() {
  clearForm();
 })

 elJenis.addEventListener('change', function() {
  if (elJenis.value === 'kecil') {
   elKeterangan.value = 'Ini adalah gudang cabang ... ';
  } else if (elJenis.value === 'besar') {
   elKeterangan.value = 'Ini adalah gudang utama ... ';
  }
 })

 function editData(kode, nama_gudang, alamat, jenis, foto_gudang, keterangan, status) {
  btnForm.style.display = 'block';
  btnReset.style.display = 'none';
  btnReset2.style.display = 'block';

  elStatusText.style.display = 'none';
  elJenisText.style.display = 'none';
  elJenis.style.display = 'block';
  elStatus.style.display = 'block';
  elFoto.style.display = 'block';

  modelTitle.innerHTML = 'Edit Gudang';
  elKode.value = kode;
  elNama.value = nama_gudang;
  elAlamat.value = alamat;
  elJenis.value = jenis;
  elKeterangan.value = keterangan;
  elStatus.value = status;
  btnForm.innerHTML = 'Update';
  elHiddenFoto.value = foto_gudang;
  console.log(elHiddenFoto.value);

  hapusReadOnly();

  elHasilFoto.src = ambilGambar(foto_gudang);

  reNama = nama_gudang;
  reAlamat = alamat;
  reJenis = jenis;
  reKeterangan = keterangan;
  reStatus = status;
  reHiddenFoto = foto_gudang;
  reHasilFoto = ambilGambar(foto_gudang);
 }

 function ambilGambar(foto_saja) {
  // Menyimpan URL gambar sebelumnya
  let previousImageUrl = ''; // Inisialisasi variabel untuk menyimpan URL gambar sebelumnya

  // Menetapkan URL gambar sebelumnya ke elemen img
  previousImageUrl = foto_saja;

  // Menggabungkan base_url dan previousImageUrl dalam pathGambarGudang
  let pathGambarGudang = '<?= base_url('gambar_gudang/') ?>' + previousImageUrl;

  console.log(pathGambarGudang); // Untuk memeriksa pathGambarGudang dalam konsol
  return pathGambarGudang;
 }

 function infoData(kode, nama_gudang, alamat, jenis, foto_gudang, keterangan, status) {
  btnForm.style.display = 'none';
  btnReset.style.display = 'none';
  btnReset2.style.display = 'none';

  elStatusText.style.display = 'block';
  elJenisText.style.display = 'block';
  elJenis.style.display = 'none';
  elStatus.style.display = 'none';
  elFoto.style.display = 'none';

  modelTitle.innerHTML = 'Info Gudang';
  elKode.value = kode;
  elNama.value = nama_gudang;
  elAlamat.value = alamat;
  elJenisText.value = jenis;
  // elFoto.value = foto_gudang;
  elStatusText.value = status;
  elKeterangan.value = keterangan;

  beriReadOnly();

  elHasilFoto.src = ambilGambar(foto_gudang);
 }

 function resetData() {
  elNama.value = reNama;
  elAlamat.value = reAlamat;
  elJenis.value = reJenis;
  elKeterangan.value = reKeterangan;
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