<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>
<!-- KURANG MEREK PADA KOLOM NYA -->

<?php
if ($jenis == 'besar') {
?>
 <div class="" style="text-align: center; display: content;">
  <h2 id="stok-sendiri">Stok Barang <?= $nama_gudang; ?></h2>
  <h2 id="stok-semua">Stok Barang Semua Gudang</h2>
 </div>
 <div class="mb-2 d-flex justify-content-between">
  <!-- <div class="" style="margin-bottom: -10px;"> -->
  <a class="btn btn-warning px-3" href="<?= base_url('DashboardController'); ?>" style="padding-top: 1rem;">
   <i class="fi fi-rr-left text-xl"></i>
  </a>
  <!-- </div> -->
  <div class="btn-input-pilihan">
   <button class="btn btn-warning" type="button" id="btn-stok-sendiri" class="right-0">
    <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
    Stok Gudang Saya
   </button>
   <button class="btn btn-primary" type="button" id="btn-stok-semua" class="right-0">
    <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
    Stok Semua Gudang
   </button>
  </div>
 </div>
<?php } ?>

<!-- Back kecil -->
<?php
if ($jenis == 'kecil') {
?>
 <div class="" style="text-align: center; display: content;">
  <h2>Stok Barang <?= $nama_gudang; ?></h2>
 </div>
 <div class="mb-2 d-flex justify-content-between">
  <!-- <div class="" style="margin-bottom: -10px;"> -->
  <a class="btn btn-warning px-3" href="<?= base_url('DashboardController'); ?>" style="padding-top: 1rem;">
   <i class="fi fi-rr-left text-xl"></i>
  </a>
 <?php } ?>
 <!-- DIV BUTTON -->

 <!-- lihat tabel / grafik -->
 <div class="btn-hasli-pilihan" style="text-align: right; display: content; margin-bottom: 9px;">
  <a href="#" class="btn btn-warning" type="button" id="tabel-stok" class="right-0">
   <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
   Lihat Tabel
  </a>
  <button class="btn btn-primary" type="button" id="grafik-stok" class="right-0">
   <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
   Lihat Grafik
  </button>
 </div>

 <?php
 if ($jenis == 'kecil') {
 ?>
 </div>
<?php } ?>


<!-- GUDANG SENDIRI -->
<div class="gudang-sendiri">
 <?php if (!empty($stok)) :
  $no = 1;
 ?>
  <div class="table-responsive">
   <table class="table" id="example1">
    <thead>
     <tr>
      <th scope="col">No</th>
      <th scope="col">Merek</th>
      <th scope="col">Nama barang</th>
      <th scope="col">Satuan</th>
      <th scope="col">Jumlah</th>
     </tr>
    </thead>
    <tbody>
     <?php foreach ($stok as $row) : ?>
      <tr>
       <th scope="row"> <?= $no++; ?> </th>
       <td> <?= $row['nama_merek']; ?> </td>
       <td> <?= $row['nama_barang']; ?> </td>
       <td> <?= $row['satuan']; ?> </td>
       <td> <?= $row['jumlah']; ?> </td>
      </tr>
     <?php endforeach; ?>
    </tbody>
   </table>
  </div>
 <?php else : ?>
  <div class="table-responsive">
   <table class="table" id="example1">
    <thead>
     <tr>
      <th scope="col">TIDAK ADA STOK DATA BARANG</th>
     </tr>
    </thead>
    <tbody>
     <tr>
      <td>Stok Barang tidak tersedia</td>
     </tr>
    </tbody>
   </table>
  </div>
 <?php endif; ?>
</div>

<!-- GUDANG SEMUA -->
<?php
if ($jenis == 'besar') {
?>
 <div class="gudang-semua">
  <?php if (!empty($stok_semua)) :
   $no = 1;
  ?>
   <div class="table-responsive">
    <table class="table" id="example2">
     <thead>
      <tr>
       <th scope="col">No</th>
       <th scope="col">Nama Gudang</th>
       <th scope="col">Merek</th>
       <th scope="col">Nama barang</th>
       <th scope="col">Satuan</th>
       <th scope="col">Jumlah</th>
      </tr>
     </thead>
     <tbody>
      <?php foreach ($stok_semua as $row) : ?>
       <tr>
        <th scope="row"> <?= $no++; ?> </th>
        <td> <?= $row['nama_gudang']; ?> </td>
        <td> <?= $row['nama_merek']; ?> </td>
        <td> <?= $row['nama_barang']; ?> </td>
        <td> <?= $row['satuan']; ?> </td>
        <td> <?= $row['jumlah']; ?> </td>
       </tr>
      <?php endforeach; ?>
     </tbody>
    </table>
   </div>
  <?php else : ?>
   <div class="table-responsive">
    <table class="table" id="example1">
     <thead>
      <tr>
       <th scope="col">TIDAK ADA STOK DATA BARANG</th>
      </tr>
     </thead>
     <tbody>
      <tr>
       <td>Stok Barang tidak tersedia</td>
      </tr>
     </tbody>
    </table>
   </div>
  <?php endif; ?>
 </div>
<?php } ?>

<script>
 // datatables
 new DataTable('#example1');
 new DataTable('#example2');
 // judul
 const headerStokSendiri = document.getElementById('stok-sendiri')
 // tombol
 const btnTabel = document.querySelector('#tabel-stok')
 const btnGrafik = document.querySelector('#grafik-stok')
 const btnStokSendiri = document.querySelector('#btn-stok-sendiri')

 // div
 const divStokSendiri = document.querySelectorAll('.gudang-sendiri')
 <?php
 if ($jenis == 'besar') {
 ?>
  const btnStokSemua = document.querySelector('#btn-stok-semua')
  const headerStokSemua = document.getElementById('stok-semua')
  const divStokSemua = document.querySelectorAll('.gudang-semua')
 <?php } ?>

 headerStokSendiri.style.display = 'block'
 <?php
 if ($jenis == 'besar') {
 ?>
  headerStokSemua.style.display = 'none'
  divStokSemua.forEach(element => {
   element.style.display = 'none'
  });
 <?php } ?>

 btnStokSendiri.addEventListener('click', function() {
  headerStokSendiri.style.display = 'block'
  divStokSendiri.forEach(element => {
   element.style.display = 'block'
  });
  <?php
  if ($jenis == 'besar') {
  ?>
   headerStokSemua.style.display = 'none'
   divStokSemua.forEach(element => {
    element.style.display = 'none'
   });
  <?php } ?>
 })

 <?php
 if ($jenis == 'besar') {
 ?>
  btnStokSemua.addEventListener('click', function() {
   headerStokSendiri.style.display = 'none'
   divStokSendiri.forEach(element => {
    element.style.display = 'none'
   });
   headerStokSemua.style.display = 'block'
   divStokSemua.forEach(element => {
    element.style.display = 'block'
   });
  })

 <?php } ?>
 // Tambah & Edit Barang
</script>


<br>
<?= $this->endSection('content') ?>