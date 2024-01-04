<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Cek session dengan var_dump -->
<!-- <?= $nama_gudang; ?>
<br>
<?= $foto_gudang; ?>
<br>
<?= var_dump($foto_user) ?>
<br>
<?= var_dump($username) ?> -->


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

<!-- kotak kotak dashboard -->
<div class="row">
 <!-- ITEMS BARANG-->
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
   <a href="<?= base_url('BarangController'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
   <a href="<?= base_url('TransaksiController'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
<h3 class="text-center">Grafik Transaksi Jumlah Barang</h3>
<br>
<!-- GRAFIK MASUK DAN KELUAR -->
<div class="row">
 <!-- grafik masuk -->
 <div class="col-lg-6">
  <div class="card">
   <div class="card-body">
    <h4 id="barang-judul1" class="text-center">Barang Masuk</h4>
    <!-- filter masuk -->
    <div class="input-group mb-3">
     <!-- besar -->
     <?php if ($jenis == 'besar') { ?>
      <select class="form-select" id="kode_gudang1">
       <option selected value="semuagudang">Semua Gudang</option>
       <?php foreach ($gudangaktif as $ga) { ?>
        <option value="<?= $ga['kode_gudang'] ?>"><?= $ga['nama_gudang'] ?></option>
       <?php } ?>
      </select>
     <?php } ?>
     <!-- end besar -->
     <select class="form-select" id="id_merek1">
      <option selected value="semuamerek">Semua Merek</option>
      <?php foreach ($merekaktif as $ma) { ?>
       <option value="<?= $ma['id_merek'] ?>"><?= $ma['nama_merek'] ?></option>
      <?php } ?>
     </select>
     <select class="form-select" id="waktu1">
      <option selected value="all">Seumur Hidup</option>
      <option value="tahun">1 Tahun</option>
      <option value="bulan">3 Bulan</option>
     </select>
    </div>
    <!-- grafik masuk card -->
    <div class="card grafik-masuk-awal">
     <div class="card-body">
      <!-- grafik_stok_pergudang -->
      <?php if (!empty($masuksemua)) {
       foreach ($masuksemua as $key => $value) {
        $barang1[] = $value['nama_barang'];
        $jumlah1[] = $value['jumlah'];
       }
      ?>
       <canvas id="myChart1"></canvas>
       <script>
        $(document).ready(function() {
         const ctx1 = document.getElementById("myChart1");
         // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
         new Chart(ctx1, {
          type: 'polarArea',
          data: {
           labels: <?= json_encode($barang1); ?>,
           datasets: [{
            label: 'Jumlah Stok Masuk',
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
       <p>Tidak ada stok yang masuk</p>
      <?php } ?>
     </div>
    </div>
    <div class="coba-grafik"></div>
   </div>
  </div>
 </div>

 <!-- grafik keluar -->
 <div class="col-lg-6">
  <div class="card">
   <div class="card-body">
    <h4 id="barang-judul2" class="text-center">Barang Keluar</h4>
    <!-- filter keluar -->
    <div class="input-group mb-3">
     <!-- besar -->
     <?php if ($jenis == 'besar') { ?>
      <select class="form-select" id="kode_gudang2">
       <option selected value="semuagudang">Semua Gudang</option>
       <?php foreach ($gudangaktif as $ga) { ?>
        <option value="<?= $ga['kode_gudang'] ?>"><?= $ga['nama_gudang'] ?></option>
       <?php } ?>
      </select>
     <?php } ?>
     <!-- end besar -->
     <select class="form-select" id="id_merek2">
      <option selected value="semuamerek">Semua Merek</option>
      <?php foreach ($merekaktif as $ma) { ?>
       <option value="<?= $ma['id_merek'] ?>"><?= $ma['nama_merek'] ?></option>
      <?php } ?>
     </select>
     <select class="form-select" id="waktu2">
      <option selected value="all">Seumur Hidup</option>
      <option value="tahun">1 Tahun</option>
      <option value="bulan">3 Bulan</option>
     </select>
    </div>
    <!-- grafik keluar card -->
    <div class="card">
     <div class="card-body">
      <!-- grafik_stok_pergudang -->
      <?php if (!empty($keluarsemua)) {
       foreach ($keluarsemua as $key => $value) {
        $barang2[] = $value['nama_barang'];
        $jumlah2[] = $value['jumlah'];
       }
      ?>
       <canvas id="myChart2"></canvas>
       <script>
        $(document).ready(function() {
         const ctx2 = document.getElementById("myChart2");
         // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
         new Chart(ctx2, {
          type: 'polarArea',
          data: {
           labels: <?= json_encode($barang2); ?>,
           datasets: [{
            label: 'Jumlah Stok Keluar',
            data: <?= json_encode($jumlah2); ?>,
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
       <p>Tidak ada stok yang masuk</p>
      <?php } ?>
     </div>
    </div>
   </div>
  </div>
 </div>
 <h2>Jadi dalam grafik, jumlah barang yang masuk/keluar dalam waktu yang ditentukan ada berapa</h2>
</div>


<br>
<script>
 <?php if ($jenis == 'besar') { ?>
  const filGudang1 = document.querySelector('#kode_gudang1')
 <?php } ?>
 const filMerek1 = document.querySelector('#id_merek1')
 const filWaktu1 = document.querySelector('#waktu1')
 const grafMasukAwal = document.querySelectorAll('.grafik-masuk-awal')

 <?php if ($jenis == 'besar') { ?>
  $('#kode_gudang1').on('change', function() {
   console.log('gudang:' + filGudang1.value)
   viewgrafikmasuk()
  })
 <?php } ?>
 $('#id_merek1').on('change', function() {
  console.log(filMerek1.value)
  viewgrafikmasuk()
 })
 $('#waktu1').on('change', function() {
  console.log(filWaktu1.value)
  viewgrafikmasuk()
 })

 // grafikmasuk
 function viewgrafikmasuk() {
  let selectedMerek1 = filMerek1.value;
  let selectedWaktu1 = filWaktu1.value;
  let dataToSend = {
   selectedMerek1: selectedMerek1,
   selectedWaktu1: selectedWaktu1,
  };

  <?php if ($jenis == 'besar') { ?>
   let selectedGudang1 = filGudang1.value;
   dataToSend.selectedGudang1 = selectedGudang1;
  <?php } ?>

  $.ajax({
   type: "POST",
   url: "<?= base_url('DashboardController/viewGrafikBarangMasuk') ?>",
   data: dataToSend,
   dataType: "JSON",
   success: function(response) {
    if (response.data) {
     $('.coba-grafik').html(response.data);
     console.log(response.data);
    }
   }
  });

  // hilangkan grafik masuk awal
  grafMasukAwal.forEach(e => {
   e.style.display = 'none';
  })
 }
</script>


<?= $this->endSection('content') ?>