<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
   <a class="btn btn-danger" type="button" href="<?= base_url('BarangController'); ?>" class="right-0">
    <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
    Lihat Barang
   </a>
  </div>
 </div>
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
<?php } ?>

<!-- Back kecil -->
<?php
if ($jenis == 'kecil') {
?>
 <div class="" style="text-align: center; display: content;">
  <h2>Stok Barang </h2>
 </div>
 <div class="mb-2 d-flex justify-content-between">
  <!-- <div class="" style="margin-bottom: -10px;"> -->
  <a class="btn btn-warning px-3" href="<?= base_url('DashboardController'); ?>" style="padding-top: 1rem;">
   <i class="fi fi-rr-left text-xl"></i>
  </a>
  <div class="">
   <a class="btn btn-danger" type="button" href="<?= base_url('BarangController'); ?>" class="right-0">
    <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
    Lihat Barang
   </a>
  </div>
 </div>
<?php } ?>

<!-- gudang sendiri dan semuanya -->
<div class="lihat-tabel">

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
    <table class="table">
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
     <table class="table">
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
</div>


<!-- grafik_stok_pergudang -->
<?php
if ($jenis == 'besar') {
?>
 <div class="lihat-grafik">
  <?php if (!empty($grafik_stok_pergudang)) {
   foreach ($grafik_stok_pergudang as $key => $value) {
    $barang1[] = $value['nama_barang'];
    $jumlah1[] = $value['jumlah'];
   }
  ?>
   <!-- masih dalam if -->
   <canvas id="myChart1"></canvas>

   <script>
    $(document).ready(function() {
     const ctx1 = document.getElementById('myChart1');
     // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
     new Chart(ctx1, {
      type: 'bar',
      data: {
       labels: <?= json_encode($barang1); ?>,
       datasets: [{
        label: 'Stok Tersedia',
        data: <?= json_encode($jumlah1); ?>,
        borderWidth: 1
       }]
      },
      options: {
       scales: {
        y: {
         beginAtZero: true
        }
       }
      }
     });
    });
   </script>

  <?php
  } else { ?>
   <p>Tidak ada Stok Gudang</p>
  <?php } ?>
 </div>
<?php } ?>


<script>
 // datatables
 new DataTable('#example1');
 <?php
 if ($jenis == 'besar') {
 ?>
  new DataTable('#example2');
  // judul
  const headerStokSendiri = document.getElementById('stok-sendiri')
  // tombol
  const btnTabel = document.querySelector('#tabel-stok')
  const btnGrafik = document.querySelector('#grafik-stok')
  const btnStokSendiri = document.querySelector('#btn-stok-sendiri')

  // div
  const divLihatTabel = document.querySelectorAll('.lihat-tabel')
  const divLihatGrafik = document.querySelectorAll('.lihat-grafik')
  const divStokSendiri = document.querySelectorAll('.gudang-sendiri')
  const btnStokSemua = document.querySelector('#btn-stok-semua')
  const headerStokSemua = document.getElementById('stok-semua')
  const divStokSemua = document.querySelectorAll('.gudang-semua')


  headerStokSendiri.style.display = 'block'

  headerStokSemua.style.display = 'none'
  divStokSemua.forEach(element => {
   element.style.display = 'none'
  });


  btnStokSendiri.addEventListener('click', function() {
   headerStokSendiri.style.display = 'block'
   divStokSendiri.forEach(element => {
    element.style.display = 'block'
   });

   headerStokSemua.style.display = 'none'
   divStokSemua.forEach(element => {
    element.style.display = 'none'
   });

  })


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


  // sembuyinkan grafik saat pertamakali muncul
  divLihatGrafik.forEach(element => {
   element.style.display = 'none'
  })
  // tombol pada lihat tabel dan grafik
  btnGrafik.addEventListener('click', function() {
   divLihatGrafik.forEach(element => {
    element.style.display = 'block'
   })
   divLihatTabel.forEach(element => {
    element.style.display = 'none'
   })
  })
  btnTabel.addEventListener('click', function() {
   divLihatTabel.forEach(element => {
    element.style.display = 'block'
   })
   divLihatGrafik.forEach(element => {
    element.style.display = 'none'
   })
  })
 <?php } ?>


 // KHSUSUS JENIS BESAR
 // var pilihan='sendiri' / 'semua'
 // var hasil='tabel' / 'grafik'
 // var perubahan=pilihan+hasil;

 // javascript akan dijalankan ulang jika:
 // saat 'stok gudang saya' diklik maka pilihan='sendiri'
 // saat 'stok semua gudang' diklik maka pilihan='semua'
 // 'lihat tabel' hasil = tabel
 // 'lihat grafik' hasil = grafik

 // var perubahan akan membawa data untuk selanjutnya menampilkan tabel / gudang 
 // baik yang sendiri maupun semua
</script>


<br>
<?= $this->endSection('content') ?>