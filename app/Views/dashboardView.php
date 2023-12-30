<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>


<!-- Cek session dengan var_dump -->
<!-- <?= $nama_gudang; ?>
<br>
<?= $foto_gudang; ?>
<br>
<?= var_dump($foto_user) ?>
<br>
<?= var_dump($username) ?> -->


<!-- kotak kotak dashboard -->
<!-- toast belum bisa -->
<div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
 <div class="d-flex">
  <div class="toast-body">
   Selamat Datang<strong>
    <?= $username ?>
   </strong>
  </div>
  <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
 </div>
</div>

<div class="row">
 <!-- ITEMS -->
 <div class="<?= $collg ?> col-6">
  <!-- small box -->
  <div class="small-box bg-info">
   <div class="inner">
    <h3><?= $jBarang->jumlah; ?></h3>
    <p>Items</p>
   </div>
   <div class="icon">
    <i class="fi fi-rr-box-alt" style="font-size: 63px;"></i>
   </div>
   <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
 </div>
 <!-- BRAND MEREK -->
 <div class="<?= $collg ?> col-6">
  <!-- small box -->
  <div class="small-box bg-success">
   <div class="inner">
    <h3><?= $jMerek->jumlah; ?></h3>
    <p>Brand</p>
   </div>
   <div class="icon">
    <!-- <i class="ion ion-pie-graph"></i> -->
    <i class="fi fi-rr-file-invoice" style="font-size: 63px;"></i>
   </div>
   <a href="<?= base_url('MerekController'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
 </div>
 <!-- SUPPLIER -->
 <div class="<?= $collg ?> col-6">
  <!-- small box -->
  <div class="small-box bg-warning">
   <div class="inner">
    <h3><?= $jSupplier->jumlah; ?></h3>
    <p>Supplier</p>
   </div>
   <div class="icon">
    <!-- <i class="ion ion-pie-graph"></i> -->
    <i class="fi fi-rr-person-dolly" style="font-size: 63px;"></i>
   </div>
   <a href="<?= base_url('SupplierController'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
 </div>
 <!-- TRANSACTION -->
 <div class="<?= $collg ?> col-6">
  <!-- small box -->
  <div class="small-box bg-danger">
   <div class="inner">
    <h3>999</h3>
    <p>Transaction</p>
   </div>
   <div class="icon">
    <!-- <i class="ion ion-pie-graph"></i> -->
    <i class="fi fi-rr-chart-histogram" style="font-size: 63px;"></i>
   </div>
   <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
 </div>
 <?php if ($jenis == 'besar') { ?>
  <!-- WAREHOUSE -->
  <div class="col-lg-2 col-6">
   <!-- small box -->
   <div class="small-box bg-light">
    <div class="inner">
     <h3><?= $jGudang->jumlah; ?></h3>
     <p>Warehouse</p>
    </div>
    <div class="icon">
     <i class="fi fi-rr-building" style="font-size: 63px;"></i>
    </div>
    <a href="<?= base_url('GudangController'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
   </div>
  </div>
  <!-- USERS -->
  <div class="col-lg-2 col-6">
   <!-- small box -->
   <div class="small-box bg-secondary">
    <div class="inner">
     <h3><?= $jUser->jumlah; ?></h3>
     <p>Users</p>
    </div>
    <div class="icon">
     <i class="fi fi-rr-users-alt" style="font-size: 63px;"></i>
    </div>
    <a href="<?= base_url('UserController'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
   </div>
  </div>
 <?php } ?>
</div>
<br>

<br>


<?= $this->endSection('content') ?>