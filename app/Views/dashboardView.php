<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>


<!-- Cek session dengan var_dump -->
<!-- <?= var_dump(session('foto_user')) ?> -->
<!-- <?= var_dump(session('nama_gudang')) ?> -->


<!-- kotak kotak dashboard -->
<!-- toast belum bisa -->
<div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      Selamat Datang<strong>
        <?= session()->get('username'); ?>
      </strong>
    </div>
    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>150</h3>

        <p>Items</p>
      </div>
      <div class="icon">
        <i class="fi fi-rr-person-dolly" style="font-size: 63px;"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>4<sup style="font-size: 20px"></sup></h3>

        <p>Warehouse</p>
      </div>
      <div class="icon">
        <i class="fi fi-rr-building" style="font-size: 63px;"></i>
      </div>
      <a href="<?= base_url('GudangController'); ?>" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <?php if (session()->get('jenis') == ('besar')) { ?>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>11</h3>


          <p>Users</p>
        </div>
        <div class="icon">
          <i class="fi fi-rr-users-alt" style="font-size: 63px;"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  <?php } ?>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>35</h3>

        <p>Brand</p>
      </div>
      <div class="icon">
        <!-- <i class="ion ion-pie-graph"></i> -->
        <i class="fi fi-rr-file-invoice" style="font-size: 63px;"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
<br>

<br>


<?= $this->endSection('content') ?>