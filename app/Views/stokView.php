<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!--  
Kurang:
select untuk sum setiap kudang berdasarkan barang
setiap select gudang maka grafik akan berubah
-->
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
   <button class="btn btn-primary mx-1" type="button" id="btn-stok-semua" class="right-0">
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
 <div class="btn-hasli-pilihan input-group" style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 9px;">
  <div class="pilih-gudang">
   <!-- <span class="input-group-text" id="basic-addon3">Pilih Gudang</span> -->
   <select class="form-select" id="kode_gudang" name="kode_gudang" onclick="viewgrafik()">
    <option value="semua">Semua Gudang</option>
    <?php foreach ($gudang as $g) { ?>
     <option value="<?= $g['kode_gudang'] ?>"><?= $g['nama_gudang'] ?></option>
    <?php } ?>
   </select>
  </div>
  <a href="#" class="btn btn-warning mx-2" type="button" id="tabel-stok" class="right-0">
   Lihat Tabel
  </a>
  <button class="btn btn-primary" type="button" id="grafik-stok" class="right-0">
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

 <!-- TABEL SENDIRI -->
 <div class="lihat-tabel-sendiri">
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

 <!-- TABEL SEMUA -->
 <?php
 if ($jenis == 'besar') {
 ?>
  <div class="lihat-tabel-semua">
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
  <!-- GRAFIK SENDIRI -->
  <div class="lihat-grafik-sendiri">
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
  <!-- GRAFIK SEMUA -->
 </div>
 <div class="lihat-grafik-semua">

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
  const headerStokSemua = document.getElementById('stok-semua')

  // tombol
  const btnStokSendiri = document.querySelector('#btn-stok-sendiri')
  const btnStokSemua = document.querySelector('#btn-stok-semua')
  const btnTabel = document.querySelector('#tabel-stok')
  const btnGrafik = document.querySelector('#grafik-stok')

  // div
  const divLihatTabel = document.querySelectorAll('.lihat-tabel')
  const divLihatGrafik = document.querySelectorAll('.lihat-grafik')
  const divLihatTabelSendiri = document.querySelectorAll('.lihat-tabel-sendiri')
  const divLihatTabelSemua = document.querySelectorAll('.lihat-tabel-semua')
  const divLihatGrafikSendiri = document.querySelectorAll('.lihat-grafik-sendiri')
  const divLihatGrafikSemua = document.querySelectorAll('.lihat-grafik-semua')

  // cek inputan select gudang
  const pilihGudang = document.querySelectorAll('.pilih-gudang')
  const btnpilihGudang = document.querySelector('#kode_gudang')
  // variabel perubahan
  var pilihan = 'sendiri'
  var hasil = 'tabel'
  var perubahan = pilihan + hasil;

  headerStokSendiri.style.display = 'block'
  headerStokSemua.style.display = 'none'

  // sembuyinkan tabelsemua saat pertamakali muncul
  divLihatTabelSemua.forEach(element => {
   element.style.display = 'none'
  });
  // sembuyinkan grafik saat pertamakali muncul
  divLihatGrafik.forEach(element => {
   element.style.display = 'none'
  })
  // sembuyikan inputan select
  pilihGudang.forEach(e => {
   e.style.display = 'none'
  })


  function tombol() {
   if (perubahan == 'sendiritabel') {
    // tampilkan
    headerStokSendiri.style.display = 'block'
    divLihatTabel.forEach(element => {
     element.style.display = 'block'
    });
    divLihatTabelSendiri.forEach(element => {
     element.style.display = 'block'
    });
    // sembunyikan
    headerStokSemua.style.display = 'none'
    divLihatTabelSemua.forEach(element => {
     element.style.display = 'none'
    });
    divLihatGrafik.forEach(element => {
     element.style.display = 'none'
    });
    pilihGudang.forEach(e => {
     e.style.display = 'none'
    })

   } else if (perubahan == 'sendirigrafik') {
    // tampilkan
    headerStokSendiri.style.display = 'block'
    divLihatGrafik.forEach(element => {
     element.style.display = 'block'
    });
    divLihatGrafikSendiri.forEach(element => {
     element.style.display = 'block'
    });
    // sembunyikan
    headerStokSemua.style.display = 'none'
    divLihatTabel.forEach(element => {
     element.style.display = 'none'
    });
    divLihatGrafikSemua.forEach(element => {
     element.style.display = 'none'
    });
    pilihGudang.forEach(e => {
     e.style.display = 'none'
    })

   } else if (perubahan == 'semuatabel') {
    // tampilkan
    headerStokSemua.style.display = 'block'
    divLihatTabel.forEach(element => {
     element.style.display = 'block'
    });
    divLihatTabelSemua.forEach(element => {
     element.style.display = 'block'
    });
    // sembunyikan
    headerStokSendiri.style.display = 'none'
    divLihatGrafik.forEach(element => {
     element.style.display = 'none'
    });
    divLihatTabelSendiri.forEach(element => {
     element.style.display = 'none'
    });
    pilihGudang.forEach(e => {
     e.style.display = 'none'
    })

   } else if (perubahan == 'semuagrafik') {
    // tampilkan
    headerStokSemua.style.display = 'block'
    divLihatGrafik.forEach(element => {
     element.style.display = 'block'
    });
    divLihatGrafikSemua.forEach(element => {
     element.style.display = 'block'
    });
    pilihGudang.forEach(e => {
     e.style.display = 'block'
    })
    // sembunyikan
    headerStokSendiri.style.display = 'none'
    divLihatTabel.forEach(element => {
     element.style.display = 'none'
    });
    divLihatGrafikSendiri.forEach(element => {
     element.style.display = 'none'
    });

   }
  }


  // Stok Gudang Saya
  btnStokSendiri.addEventListener('click', function() {
   pilihan = 'sendiri'
   perubahan = pilihan + hasil
   console.log(perubahan)
   tombol()
  })
  // Stok Semua Gudang 
  btnStokSemua.addEventListener('click', function() {
   pilihan = 'semua'
   perubahan = pilihan + hasil
   console.log(perubahan)
   tombol()
  })
  // LIHAT TABEL
  btnTabel.addEventListener('click', function() {
   hasil = 'tabel'
   perubahan = pilihan + hasil
   console.log(perubahan)
   tombol()
   selectElement.value = ''
   viewgrafik()
  })
  // LIHAT GRAFIK
  btnGrafik.addEventListener('click', function() {
   hasil = 'grafik'
   perubahan = pilihan + hasil
   console.log(perubahan)
   tombol()
   selectElement.value = 'semua'
   viewgrafik()
  })
 <?php } ?>
</script>

<!-- grafik -->
<script>
 // Mendapatkan elemen select
 let selectElement = document.getElementById('kode_gudang');

 // Menambahkan event listener untuk mendengarkan perubahan pada select
 selectElement.addEventListener('change', function() {
  // Mengambil value yang dipilih
  let selectedValue = selectElement.value;

  // Melakukan sesuatu dengan selectedValue, misalnya mencetak ke console
  console.log('Pilihan select:', selectedValue);
 });

 function viewgrafik() {
  let selectedValue2 = selectElement.value;
  $.ajax({
   type: "POST",
   url: "<?= base_url('StokController/viewGrafikStokPerGudang') ?>",
   data: {
    selectedValue2: selectedValue2,
   },
   dataType: "JSON",
   success: function(response) {
    if (response.data) {
     $('.lihat-grafik-semua').html(response.data);
     console.log(response.data);
    }
   }
  })
 }
</script>


<br>
<?= $this->endSection('content') ?>