 <!-- <div class="col-sm-6"> -->
 <div class="card">
  <div class="card-body">
   <h5 id="detail-barang-judul">Detail Transaksi Barang Masuk</h5>
   <div class="lihat-tabel-sendiri">
    <?php if (!empty($data_detail_masuk)) :
     $noo = 1;
    ?>
     <h6>No Transaksi Barang Masuk: <?= $data_rekap_masuk->no_barang_masuk ?> </h6>
     <h6>Waktu: <?= $data_rekap_masuk->tanggal_masuk ?> </h6>
     <h6>User: <?= $data_rekap_masuk->username ?> </h6>
     <h6>Supplier: <?= $data_rekap_masuk->nama_supplier ?> </h6>
     <h6>Gudang: <?= $data_rekap_masuk->nama_gudang ?> </h6>
     <div class="table-responsive">
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
        <?php foreach ($data_detail_masuk as $row) : ?>
         <tr>
          <th scope="row"> <?= $noo++; ?> </th>
          <td> <?= $row['nama_barang']; ?> </td>
          <td> <?= $row['satuan']; ?> </td>
          <td> <?= $row['jumlah']; ?> </td>
          <td> <?= $row['harga']; ?> </td>
          <td> <?= $row['total_harga']; ?> </td>
         </tr>
        <?php endforeach; ?>
        <tr>
         <td></td>
         <td></td>
         <td></td>
         <th colspan="2" class="text-right">Total Harga</th>
         <th><?= $data_rekap_masuk->total_harga ?> </th>
        </tr>
       </tbody>
      </table>
     </div>
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
   <?php if (!empty($data_detail_masuk)) {
   ?>
    <a class="btn btn-warning px-3" target="_blank" href="<?= base_url('TransaksiController/PrintDetailTransaksi'); ?>" style="padding-top: 1rem;">
     <i class="fi fi-rr-print text-xl"></i>
    </a>
   <?php
   } ?>
  </div>
 </div>
 <!-- </div> -->