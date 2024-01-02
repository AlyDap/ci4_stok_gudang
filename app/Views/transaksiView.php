<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="" style="text-align: center; display: content;">
 <h2 id="judul">Transaksi Barang Masuk
 </h2>
</div>

<div class="mb-2 d-flex justify-content-between">
 <!-- <div class="" style="margin-bottom: -10px;"> -->
 <a class="btn btn-warning" type="button" href="<?= base_url('BarangController'); ?>" class="right-0">
  <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
  Kembali </a>
 <!-- </div> -->
 <div class="">

  <button class="btn btn-primary" type="button">
   <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
   Lihat Stok Masuk
  </button>

  <a class="btn btn-warning" type="button" class="right-0">
   <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
   Lihat Stok Keluar
  </a>
 </div>
</div>
<div class="btn-hasli-pilihan input-group" style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 9px;">
 <a href="#" class="btn btn-outline-primary mx-2" type="button" id="tabel-stok" class="right-0">
  Tambah Stok Masuk
 </a>
 <a href="#" class="btn btn-outline-warning" type="button" id="grafik-stok" class="right-0">
  Tambah Stok Keluar
 </a>
</div>

<div class="row">
 <div class="col-sm-6 mb-3 mb-sm-0">
  <div class="card">
   <div class="card-body">
    <h5 id="barang-judul">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
   </div>
  </div>
 </div>
 <div class="col-sm-6">
  <div class="card">
   <div class="card-body">
    <h5 id="detail-barang-judul">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
   </div>
  </div>
 </div>
</div>


<script>
 // datatables
 new DataTable('#example1');

 new DataTable('#example2');
</script>
<?= $this->endSection('content') ?>