<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah
 Gudang</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Gudang Baru</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <form method="post" action="<?= base_url('/GudangController/save'); ?>">
    <div class="modal-body">
     <input type="hidden" class="form-control" id="kode_gudang" name="kode_gudang">
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
       <option selected value="Kecil">Kecil</option>
       <option value="Besar">Besar</option>
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
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary">Save</button>
    </div>
   </form>
  </div>
 </div>
</div>


<br>
<h2>Daftar Gudang</h2>

<?php if (!empty($gudang)): ?>
 <table class="table">
  <thead>
   <tr>
    <th scope="col">Kode Gudang</th>
    <th scope="col">Nama Gudang</th>
    <th scope="col">Jenis</th>
    <th scope="col">Alamat</th>
    <th scope="col">Status</th>
   </tr>
  </thead>
  <tbody>
   <?php foreach ($gudang as $row): ?>
    <tr>
     <th scope="row">
      <?= $row['kode_gudang']; ?>
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
    </tr>
   <?php endforeach; ?>
  </tbody>
 </table>
<?php else: ?>
 <p>Tidak ada data gudang.</p>
<?php endif; ?>



<?= $this->endSection('content') ?>