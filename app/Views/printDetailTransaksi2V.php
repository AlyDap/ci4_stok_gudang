<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <title>Print A4</title>
 <!-- bootstrap -->
 <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">

 <!-- Normalize or reset CSS with your favorite library -->
 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css"> -->
 <link rel="stylesheet" href="<?= base_url() ?>/paper-css-master/normalize.min.css">

 <!-- Load paper.css for happy printing -->
 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css"> -->
 <link rel="stylesheet" href="<?= base_url() ?>/paper-css-master/paper.css">

 <!-- Set page size here: A5, A4 or A3 -->
 <!-- Set also "landscape" if you need -->
 <style>
  .rata-kanan {
   text-align: right;
  }

  @page {
   size: A4
  }
 </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4" onload="updateClock()">

 <!-- Each sheet element should have the class "sheet" -->
 <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
 <section class="sheet padding-10mm">

  <!-- <div class="col-sm-6"> -->
  <div class="card">
   <div class="card-body">
    <center>
     <h5 id="detail-barang-judul">Detail Transaksi Barang Keluar</h5>
     <hr>
    </center>
    <div class="rata-kanan">
     <!-- <h6>
      Waktu Cetak:
      <span id="waktu" class="jam">
      </span>
      WIB
     </h6> -->
     <h6>
      Waktu Cetak
      <span id="tanggal"></span>
     </h6>
    </div>
    <div class="lihat-tabel-sendiri">
     <?php if (!empty($data_detail_keluar)) :
      $noo = 1;
     ?>
      <h6>No Transaksi Barang Keluar: <?= $data_rekap_keluar->no_barang_keluar ?> </h6>
      <h6>Waktu Transaksi: <?= $data_rekap_keluar->tanggal_keluar ?> </h6>
      <h6>User: <?= $data_rekap_keluar->username ?> </h6>
      <h6>Gudang: <?= $data_rekap_keluar->nama_gudang ?> </h6>
      <!-- <div class="table-responsive"> -->
      <table class="table">
       <thead>
        <tr>
         <th scope="col">No</th>
         <th scope="col">Nama Barang</th>
         <th scope="col">Satuan</th>
         <th scope="col">Jumlah</th>
         <th scope="col">Harga</th>
         <th scope="col">Total</th>
        </tr>
       </thead>
       <tbody>
        <?php foreach ($data_detail_keluar as $row) : ?>
         <tr>
          <th scope="row"> <?= $noo++; ?> </th>
          <td> <?= $row['nama_barang']; ?> </td>
          <td> <?= $row['satuan']; ?> </td>
          <td> <?= $row['jumlah']; ?> </td>
          <td class="rata-kanan"><?= number_format($row['harga'], 0, ',', '.'); ?></td>
          <td class="rata-kanan"><?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
         </tr>
        <?php endforeach; ?>
        <tr>
         <td></td>
         <td></td>
         <td></td>
         <th colspan="2" class="rata-kanan">Total Harga</th>
         <th class="rata-kanan">Rp<?= number_format($data_rekap_keluar->total_harga, 0, ',', '.'); ?></th>
        </tr>
       </tbody>
      </table>
      <!-- </div> -->
     <?php else : ?>
      <div class="table-responsive">
       <table class="table">
        <thead>
         <tr>
          <th scope="col">DATA TIDAK DITEMUKAN</th>
         </tr>
        </thead>
        <tbody>
         <tr>
          <td>Tidak ada transaksi</td>
         </tr>
        </tbody>
       </table>
      </div>
     <?php endif; ?>
    </div>
    <?php if (!empty($data_detail_keluar)) {
    ?>
    <?php
    } ?>
   </div>
  </div>
  <!-- </div> -->

 </section>
 <script src="<?= base_url('js/moment.min.js'); ?>"></script>

 <!-- id.js untuk waktu Indonesia -->
 <script src="<?= base_url('js/id.js'); ?>"></script>
 <!-- waktu -->
 <script>
  document.getElementById('tanggal').innerHTML = moment().locale('id').format('dddd DD MMMM YYYY');
  // document.getElementById('tanggal').innerHTML = moment().locale('id').format('YYYY-MM-DD HH:mm:ss');

  function updateClock() {
   window.print()
   // document.getElementById('waktu').innerHTML = jam + ':' + menit + ':' + detik;
   // document.querySelector(".jam").innerHTML = moment().locale('id').format('HH:mm:ss');
   // setTimeout(updateClock, 1000);
  };
 </script>
</body>

</html>