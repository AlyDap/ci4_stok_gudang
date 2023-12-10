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
       <!-- Tombol Edit -->
       <span type="button" class="badge rounded-pill text-bg-warning" style="padding-top: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editData(<?= $row['kode_gudang']; ?>,`<?= $row['nama_gudang']; ?>`,`<?= $row['alamat']; ?>`,`<?= $row['jenis']; ?>`,`<?= $row['status']; ?>`)" id="btn-edit">
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
      <select class="form-select" size="2" aria-label="Size 3 select example" id="jenis" name="jenis">
       <option selected value="kecil">kecil</option>
       <option value="besar">besar</option>
      </select>
     </div>
     <div class="mb-3">
      <label for="status" class="col-form-label">Status</label>
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

<script>
 // datatables
 new DataTable('#example');

 // Tambah & Edit Gudang


 const btnAdd = document.getElementById('btn-add');
 const btnClose = document.getElementsByName('btn-close');
 const btnEdit = document.querySelector('#btn-edit');
 const btnForm = document.querySelector('#btn-form');

 const modalExample = document.querySelector('#exampleModal');
 const modelTitle = document.querySelector('#exampleModalLabel');

 const elKode = document.querySelector('#kode_gudang');
 const elNama = document.querySelector('#nama_gudang');
 const elAlamat = document.querySelector('#alamat');
 const elJenis = document.querySelector('#jenis');
 const elStatus = document.querySelector('#status');

 btnAdd.addEventListener('click', function() {

  modelTitle.innerHTML = 'Tambah Data';
  elKode.value = "";
  elNama.value = "";
  elAlamat.value = "";
  elJenis.value = "kecil";
  elStatus.value = "aktif";
  btnForm.innerHTML = 'Tambah';
 });

 function editData(kode, nama_gudang, alamat, jenis, status) {
  modelTitle.innerHTML = 'Edit Gudang';
  elKode.value = kode;
  elNama.value = nama_gudang;
  elAlamat.value = alamat;
  elJenis.value = jenis;
  elStatus.value = status;
  btnForm.innerHTML = 'Update';
 }
</script>


<?= $this->endSection('content') ?>