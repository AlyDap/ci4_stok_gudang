<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>


<div class="" style="text-align: center; display: content;">
 <h2>Daftar Gudang
 </h2>
</div>
<div class="mb-2 d-flex justify-content-between">
 <div class="bg-primary px-2 rounded" style="padding-top: 8px;">
  <a href="<?= base_url('DashboardController'); ?>">
   <i class="fi fi-rr-left text-xl"></i>
  </a>
 </div>
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
       <span type="button" class="badge rounded-pill text-bg-primary" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="infoData(<?= $row['kode_gudang']; ?>,`<?= $row['nama_gudang']; ?>`,`<?= $row['alamat']; ?>`,`<?= $row['jenis']; ?>`,`<?= $row['foto_gudang']; ?>`,`<?= $row['status']; ?>`)" id="btn-info">
        <i class="fi fi-rr-info"></i>
       </span>
       <!-- Tombol Edit -->
       <span type="button" class="badge rounded-pill text-bg-warning" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editData(<?= $row['kode_gudang']; ?>,`<?= $row['nama_gudang']; ?>`,`<?= $row['alamat']; ?>`,`<?= $row['jenis']; ?>`,`<?= $row['foto_gudang']; ?>`,`<?= $row['status']; ?>`)" id="btn-edit">
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
   <form method="post" action="<?= base_url('/GudangController/store'); ?>">
    <div class="modal-body">

     <input type="hidden" class="form-control" id="kode_gudang" name="kode_gudang" value="">

     <div class="mb-3">
      <label for="nama_gudang" class="col-form-label">Nama Gudang</label>
      <input type="text" required class="form-control" id="nama_gudang" name="nama_gudang">
     </div>

     <div class="mb-3">
      <label for="alamat" class="col-form-label">Alamat</label>
      <input type="text" required class="form-control" id="alamat" name="alamat">
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
      <label for="foto_gudang" class="col-form-label">Foto Gudang</label>
      <div class="inputgambargudang">
       <!-- <br> -->
       <input type="file" name="foto_gudang" id="input_foto" class="cursor-pointer" accept=".jpg,.jpeg,.png">
      </div>

      <div class="hasilgambargudang">
       <!-- <br> -->
       <img src="" alt="Foto Gudang" name="foto_gudang" id="hasil_foto" style="min-width: 100px;max-width: 321px;">
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
     <button type="submit" class="btn btn-primary" id="btn-form">Save</button>
    </div>
   </form>
  </div>
 </div>
</div>

<!-- KURANG
MAU MENAMBAH INPUT TYPE TEXT UNTUK JENIS DAN STATUS YANG HANYA DITAMPILKAN SAAT KLIK INFO
LALU TIDAK MENAMPILKAN SELECT JENIS DAN STATUS PADA SAAT KLIK INFO
JADI HANYA MENAMPILKAN INPUT TYPE TEXT PADA KLIK INFO KECUALI GAMBAR YANG HANYA TAMPIL IMG

BELUM BISA TAMPIL GAMBAR SAAT KLIK INFO DAN KLIK IKON UPDATE
IMG BELUM BISA MASUK KE STORAGE
TETAPI HANYA TEXT NYA SAJA
NANTI TEXT PADA IMG AKAN DIRANDOM AGAR NAMA TIDAK ADA YANG SAMA

MAU TAMBAH DESKRIPSI GUDANG YANG HANYA TAMPIL PADA SAAT KLIK ICON INFO/EDIT/ADD
SAAT KLIK JENIS GUDANG BESAR MAKA PLACEHOLDER DESKRIPSI GUDANG AKAN MENJADI:
"INI ADALAH GUDANG UTAMA..."
SAAT KLIK JENIS GUDANG KECIL MAKA PLACEHOLDER DESKRIPSI GUDANG AKAN MENJADI:
"INI ADALAH GUDANG CABANG..."
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

 const modalExample = document.querySelector('#exampleModal');
 const modelTitle = document.querySelector('#exampleModalLabel');

 const elKode = document.querySelector('#kode_gudang');
 const elNama = document.querySelector('#nama_gudang');
 const elAlamat = document.querySelector('#alamat');
 const elJenis = document.querySelector('#jenis');
 const elFoto = document.querySelector('#input_foto');
 const elHasilFoto = document.querySelector('#hasil_foto');
 const elStatus = document.querySelector('#status');

 const elStatusText = document.querySelector('#status-text');
 const elJenisText = document.querySelector('#jenis-text');


 btnAdd.addEventListener('click', function() {
  btnForm.style.display = 'block';
  elStatusText.style.display = 'none';
  elJenisText.style.display = 'none';
  elJenis.style.display = 'block';
  elStatus.style.display = 'block';
  elFoto.style.display = 'block';

  modelTitle.innerHTML = 'Tambah Gudang';
  elKode.value = "";
  elNama.value = "";
  elAlamat.value = "";
  elJenis.value = "kecil";
  elFoto.value = "";
  elStatus.value = "aktif";
  btnForm.innerHTML = 'Tambah';
  elHasilFoto.src = "";

  elKode.removeAttribute('readonly');
  elNama.removeAttribute('readonly');
  elAlamat.removeAttribute('readonly');
 });

 function editData(kode, nama_gudang, alamat, jenis, foto_gudang, status) {
  btnForm.style.display = 'block';
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
  // elFoto.value = foto_gudang;
  elStatus.value = status;
  btnForm.innerHTML = 'Update';

  elKode.removeAttribute('readonly');
  elNama.removeAttribute('readonly');
  elAlamat.removeAttribute('readonly');

  elHasilFoto.src = ambilGambar(foto_gudang);
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

 function infoData(kode, nama_gudang, alamat, jenis, foto_gudang, status) {
  btnForm.style.display = 'none';
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

  elKode.setAttribute('readonly', true);
  elNama.setAttribute('readonly', true);
  elAlamat.setAttribute('readonly', true);
  elJenisText.setAttribute('readonly', true);
  elStatusText.setAttribute('readonly', true);

  elHasilFoto.src = ambilGambar(foto_gudang);
 }


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