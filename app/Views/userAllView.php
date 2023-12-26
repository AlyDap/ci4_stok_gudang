<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>

<!-- <?php echo session()->get('username'); ?>
<?= session()->get('id_user'); ?> -->

<?php
// foreach ($useraktif as $key => $value) {
//  echo $key . ' -> ' . $value . '<br>';
// }
// output:
// id_user -> 1
// username -> ali ....

// echo $useraktif->email;
// output: ali@gmail.com
?>

<div class="row">
 <div class="col-sm-6 mb-3 mb-sm-0">
  <div class="card">
   <div class="row g-0">
    <div class="col-md-3">
     <img src="<?= base_url('gambar_user/' . $useraktif->foto_user) ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-9">
     <div class="card-body">
      <!-- <h3><?= $useraktif->username ?></h3> -->
      <!-- <h3 class="card-title"><?= $useraktif->username ?></h3> -->
      <!-- AKAN MEMBUAT TABEL VIEW UNTUK PASSWORD USER bukan MD5
           DAN MENAMBAH FIELD baru untuk password nya -->
      <!-- <p class="card-text">Email : </p> -->
      <div class="">
       <?php
       // dd($infouser);
       foreach ($infouser as $key => $value) {
       ?>
        <div class="row">
         <div class="col" style=" max-width: 125px;">
          <?= $key ?>
         </div>
         <div class="col" style=" margin-right: 0px; padding-right: 0px; max-width: 10px;">
          :
         </div>
         <div class="col">
          <?= $value ?>
         </div>
        </div>
       <?php
        // echo $key . ' -> ' . $value . '<br>';
       }
       ?>
      </div>
      <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
     </div>
    </div>
   </div>
  </div>
 </div>
 <div class="col-sm-6">
  <div class="card">
   <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
   </div>
  </div>
 </div>
</div>

<?= $this->endSection('content') ?>