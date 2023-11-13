<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>


<!-- Cek session dengan var_dump -->
<!-- <?= var_dump(session('foto_user')) ?> -->
<!-- <?= var_dump(session('nama_gudang')) ?> -->


<div class="row">
 <div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-info">
   <div class="inner">
    <h3>150</h3>

    <p>New Orders</p>
   </div>
   <div class="icon">
    <i class="ion ion-bag"></i>
   </div>
   <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
 </div>
 <!-- ./col -->
 <div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
   <div class="inner">
    <h3>53<sup style="font-size: 20px">%</sup></h3>

    <p>Bounce Rate</p>
   </div>
   <div class="icon">
    <i class="ion ion-stats-bars"></i>
   </div>
   <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
 </div>
 <div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-warning">
   <div class="inner">
    <h3>44</h3>

    <p>User Registrations</p>
   </div>
   <div class="icon">
    <i class="ion ion-person-add"></i>
   </div>
   <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
 </div>
 <div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-danger">
   <div class="inner">
    <h3>65</h3>

    <p>Merek</p>
   </div>
   <div class="icon">
    <i class="ion ion-pie-graph"></i>
   </div>
   <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
 </div>
</div>
<br>
<p class="h1">h1. Login 1 Berhasil</p>
<p class="h2">h2. Login 1 Berhasil</p>
<p class="h3">h3. Login 1 Berhasil</p>
<p class="h4">h4. Login 1 Berhasil</p>
<p class="h5">h5. Login 1 Berhasil</p>
<p class="h6">h6. Login 1 Berhasil</p>
<h1 class="display-1">Setelah width 991 px</h1>
<h1 class="display-2">Navbar yang di atas </h1>
<h1 class="display-3">pindah ke samping</h1>
<h1 class="display-4">Display 4</h1>
<h1 class="display-5">Display 5</h1>
<h1 class="display-6">Display 6</h1>
<h1>Login 1 Berhasil</h1>
<br>


<?= $this->endSection('content') ?>