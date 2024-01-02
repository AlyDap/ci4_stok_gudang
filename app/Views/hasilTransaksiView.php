 <!-- <div class="col-sm-6"> -->
 <div class="card">
  <div class="card-body">
   <h5 id="detail-barang-judul">Detail Transaksi Barang Masuk</h5>
   <div class="lihat-tabel-sendiri">
    <?php if (!empty($data_detail_masuk)) :
     $noo = 1;
    ?>
     <div class="table-responsive">
      <table class="table" id="example2">
       <thead>
        <tr>
         <th scope="col">No</th>
         <th scope="col">Nama Barang</th>
         <th scope="col">Satuan</th>
         <th scope="col">Jumlah</th>
         <th scope="col">Harga</th>
         <th scope="col">Total Harga</th>
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
  </div>
 </div>
 <!-- </div> -->