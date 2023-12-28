<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>


<div class="" style="text-align: center; display: content;">
 <h2>Daftar Supplier
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
    Tambah Supplier
   </button>
  <?php } ?>
 </div>

</div>


<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 <i class="fi fi-rr-plus" style="font-size: 2rem;"></i>
</button> -->

<?php if (!empty($supplier)) :
 $no = 1;
?>
 <div class="table-responsive">
  <table class="table" id="example">
   <thead>
    <tr>
     <th scope="col">No</th>
     <th scope="col">Nama Supplier</th>
     <th scope="col">Email</th>
     <th scope="col">No HP</th>
     <th scope="col">Status</th>
     <th scope="col">Aksi</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach ($supplier as $row) : ?>
     <tr>
      <th scope="row">
       <?= $no++; ?>
      </th>
      <td>
       <?= $row['nama_supplier']; ?>
      </td>
      <td>
       <?= $row['email']; ?>
      </td>
      <td>
       <?= $row['no_hp']; ?>
      </td>
      <td>
       <?= $row['status']; ?>
      </td>
      <td>
       <!-- Tombol Info -->
       <span type="button" class="badge rounded-pill text-bg-primary" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="infoData(<?= $row['id_supplier']; ?>,`<?= $row['nama_supplier']; ?>`,`<?= $row['email']; ?>`,`<?= $row['no_hp']; ?>`,`<?= $row['alamat']; ?>`,`<?= $row['deskripsi']; ?>`,`<?= $row['status']; ?>`)" id="btn-info">
        <i class="fi fi-rr-info"></i>
       </span>
       <!-- Tombol Edit -->
       <?php
       if (session('jenis') == 'besar') {
       ?>
        <span type="button" class="badge rounded-pill text-bg-warning" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editData(<?= $row['id_supplier']; ?>,`<?= $row['nama_supplier']; ?>`,`<?= $row['email']; ?>`,`<?= $row['no_hp']; ?>`,`<?= $row['alamat']; ?>`,`<?= $row['deskripsi']; ?>`,`<?= $row['status']; ?>`)" id="btn-edit">
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
 <p>Tidak ada data supplier.</p>
<?php endif; ?>

<!-- TAMBAH Supplier -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Supplier Baru</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" name="btn-close"></button>
   </div>
   <form method="post" action="<?= base_url('/SupplierController/store'); ?>">
    <div class="modal-body">

     <input type="hidden" class="form-control" id="id_supplier" name="id_supplier" value="">

     <div class="mb-3">
      <label for="nama_supplier" class="col-form-label">Nama Supplier</label>
      <input type="text" required autofocus class="form-control" id="nama_supplier" name="nama_supplier" placeholder="masukan nama supplier ...">
     </div>

     <div class="mb-3">
      <label for="email" class="col-form-label">Email</label>
      <input type="text" required class="form-control" id="email" name="email" placeholder="masukan email supplier ...">
     </div>
     <div class="mb-3">
      <label for="no_hp" class="col-form-label">No HP</label>
      <input type="text" required class="form-control" id="no_hp" name="no_hp" placeholder="masukan no hp supplier ...">
     </div>
     <div class="mb-3">
      <label for="alamat" class="col-form-label">Alamat</label>
      <input type="text" required class="form-control" id="alamat" name="alamat" placeholder="masukan alamat supplier ...">
     </div>

     <div class="mb-3">
      <label for="deskripsi" class="col-form-label">Deskripsi</label>
      <br>
      <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"></textarea>
     </div>

     <div class="mb-3">
      <label for="status" class="col-form-label">Status</label>
      <input type="text" class="form-control" id="status-text" disabled>
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

 // Tambah & Edit Supplier


 const btnAdd = document.getElementById('btn-add');
 const btnClose = document.getElementsByName('btn-close');
 const btnEdit = document.querySelector('#btn-edit');
 const btnForm = document.querySelector('#btn-form');
 const btnInfo = document.querySelector('#btn-info');
 const btnReset = document.querySelector('#btn-reset');
 const btnReset2 = document.querySelector('#btn-reset2');

 const modalExample = document.querySelector('#exampleModal');
 const modelTitle = document.querySelector('#exampleModalLabel');

 const elKode = document.querySelector('#id_supplier');
 const elNama = document.querySelector('#nama_supplier');
 const elEmail = document.querySelector('#email');
 const elNoHP = document.querySelector('#no_hp');
 const elAlamat = document.querySelector('#alamat');
 const elDeskripsi = document.querySelector('#deskripsi');
 const elStatus = document.querySelector('#status');

 const elStatusText = document.querySelector('#status-text');

 let reNama, reEmail, reNoHP, reAlamat, reDeskripsi, reStatus;

 function hapusReadOnly() {
  elNama.removeAttribute('readonly');
  elEmail.removeAttribute('readonly');
  elNoHP.removeAttribute('readonly');
  elAlamat.removeAttribute('readonly');
  elDeskripsi.removeAttribute('readonly');
 }

 function beriReadOnly() {
  elNama.setAttribute('readonly', true);
  elEmail.setAttribute('readonly', true);
  elNoHP.setAttribute('readonly', true);
  elAlamat.setAttribute('readonly', true);
  elDeskripsi.setAttribute('readonly', true);
 }

 function clearForm() {
  elKode.value = "";
  elNama.value = "";
  elEmail.value = "";
  elNoHP.value = "";
  elAlamat.value = "";
  elDeskripsi.value = "";
  elStatus.value = "aktif";
  btnForm.innerHTML = 'Tambah';
 }

 btnAdd.addEventListener('click', function() {
  btnForm.style.display = 'block';
  btnReset.style.display = 'block';
  btnReset2.style.display = 'none';

  elStatusText.style.display = 'none';
  elStatus.style.display = 'block';

  modelTitle.innerHTML = 'Tambah Supplier';

  clearForm();
  hapusReadOnly();
 });

 btnReset.addEventListener('click', function() {
  clearForm();
 })

 function editData(kode, nama_supplier, email, no_hp, alamat, deskripsi, status) {
  btnForm.style.display = 'block';
  btnReset.style.display = 'none';
  btnReset2.style.display = 'block';

  elStatusText.style.display = 'none';
  elStatus.style.display = 'block';

  modelTitle.innerHTML = 'Edit Supplier';
  elKode.value = kode;
  elNama.value = nama_supplier;
  elEmail.value = email;
  elNoHP.value = no_hp;
  elAlamat.value = alamat;
  elDeskripsi.value = deskripsi;
  elStatus.value = status;
  btnForm.innerHTML = 'Update';

  hapusReadOnly();

  reNama = nama_supplier;
  reEmail = email;
  reNoHP = no_hp;
  reAlamat = alamat;
  reDeskripsi = deskripsi;
  reStatus = status;
 }

 function infoData(kode, nama_supplier, email, no_hp, alamat, deskripsi, status) {
  btnForm.style.display = 'none';
  btnReset.style.display = 'none';
  btnReset2.style.display = 'none';

  elStatusText.style.display = 'block';
  elStatus.style.display = 'none';

  modelTitle.innerHTML = 'Info Supplier';
  elKode.value = kode;
  elNama.value = nama_supplier;
  elEmail.value = email;
  elNoHP.value = no_hp;
  elAlamat.value = alamat;
  elDeskripsi.value = deskripsi;
  elStatusText.value = status;

  beriReadOnly();
 }

 function resetData() {
  elNama.value = reNama;
  elEmail.value = reEmail;
  elNoHP.value = reNoHP;
  elAlamat.value = reAlamat;
  elDeskripsi.value = reDeskripsi;
  elStatus.value = reStatus;
 }

 btnReset2.addEventListener('click', function() {
  // inputan kembali seperti data awal  
  resetData();
 })
</script>


<?= $this->endSection('content') ?>