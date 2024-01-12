<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <title>Print</title>
 <style>
  body {
   text-align: center;
   margin: 20px;
  }

  table {
   width: 80%;
   margin: auto;
   border-collapse: collapse;
  }

  th,
  td {
   border: 1px solid #dddddd;
   text-align: left;
   padding: 8px;
  }

  th {
   background-color: #f2f2f2;
   text-align: center;
  }

  .rata-kanan {
   text-align: right;
  }

  @page {
   margin: 10px;
  }
 </style>
</head>

<body onload="print()">
 <div class="card">
  <div class="card-body">
   <center>
    <h3 id="detail-barang-judul">Data Barang</h3>
    <!-- <hr> -->
   </center>
   <div class="lihat-tabel-sendiri">
    <?php if (!empty($barang)) :
     $noo = 1;
    ?>
     <table class="table">
      <thead>
       <tr>
        <th scope="col">No</th>
        <th scope="col">Merek</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Satuan</th>
        <th scope="col">Harga Beli</th>
        <th scope="col">Harga Jual</th>
        <th scope="col">Status</th>
        <th scope="col">Foto</th>
       </tr>
      </thead>
      <tbody>
       <?php foreach ($barang as $row) : ?>
        <tr>
         <th scope="row"> <?= $noo++; ?> </th>
         <td> <?= $row['nama_merek']; ?> </td>
         <td> <?= $row['nama_barang']; ?> </td>
         <td> <?= $row['satuan']; ?> </td>
         <td class="rata-kanan"><?= number_format($row['harga_beli'], 0, ',', '.'); ?></td>
         <td class="rata-kanan"><?= number_format($row['harga_jual_satuan'], 0, ',', '.'); ?></td>
         <td> <?= $row['status']; ?> </td>
         <td><img src="<?= base_url('gambar_barang/') ?><?= $row['foto_barang']; ?>" alt="<?= base_url('gambar_barang/') ?><?= $row['foto_barang']; ?>" width="50"> </td>
        </tr>
       <?php endforeach; ?>
      </tbody>
     </table>
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
         <td>Tidak ada data barang</td>
        </tr>
       </tbody>
      </table>
     </div>
    <?php endif; ?>
   </div>
   <?php if (!empty($barang)) {
   ?>
   <?php
   } ?>
  </div>
 </div>
</body>

</html>