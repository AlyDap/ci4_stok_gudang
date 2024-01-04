<?= $this->extend('navbarView') ?>
<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- TAMPILAN GUDANG KECIL DAN BESAR MASIH SAMA -->
<div class="" style="text-align: center; display: content;">
 <h2 id="judul">Transaksi Barang
 </h2>
</div>

<div class="mb-2 d-flex justify-content-between">
 <!-- <div class="" style="margin-bottom: -10px;"> -->
 <a class="btn btn-warning" type="button" href="<?= base_url('DashboardController'); ?>" class="right-0">
  <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
  Kembali </a>
 <!-- </div> -->
 <div class="">

  <button class="btn btn-primary" type="button" id="stok-masuk">
   <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
   Lihat Stok Masuk
  </button>

  <a class="btn btn-warning" type="button" class="right-0" id="stok-keluar">
   <!-- <i class="fi fi-rr-plus" style="font-size: 1.3rem;\"></i> -->
   Lihat Stok Keluar
  </a>
 </div>
</div>
<div class="btn-hasli-pilihan input-group" style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 9px;">
 <a class="btn btn-outline-primary mx-2" type="button" id="tambah-masuk" class="right-0">
  Tambah Stok Masuk
 </a>
 <a class="btn btn-outline-warning" type="button" id="tambah-keluar" class="right-0">
  Tambah Stok Keluar
 </a>
</div>

<!-- DIV TABEL TRANSAKSI MASUK -->
<div class="row barang-masuk">
 <div class="col-sm-6 mb-3 mb-sm-0 barang-mas">
  <div class="card">
   <div class="card-body">
    <h5 id="barang-judul">Transaksi Barang Masuk</h5>
    <div class="lihat-tabel-sendiri">
     <?php if (!empty($transaksiMasukGudang)) :
      $no = 1;
     ?>
      <div class="table-responsive">
       <table class="table" id="example1">
        <thead>
         <tr>
          <th scope="col">No</th>
          <th scope="col">Id Masuk</th>
          <th scope="col">Waktu</th>
          <th scope="col">Total Harga</th>
          <th scope="col">User</th>
          <th scope="col">Supplier</th>
          <!-- <th scope="col">Gudang</th> -->
          <th scope="col">Aksi</th>
         </tr>
        </thead>
        <tbody>
         <?php foreach ($transaksiMasukGudang as $row) : ?>
          <tr>
           <th scope="row"> <?= $no++; ?> </th>
           <td> <?= $row['no_barang_masuk']; ?> </td>
           <td> <?= $row['tanggal_masuk']; ?> </td>
           <td> <?= $row['total_harga']; ?> </td>
           <td> <?= $row['username']; ?> </td>
           <td> <?= $row['nama_supplier']; ?> </td>
           <!-- <td> <?= $row['nama_gudang']; ?> </td> -->
           <td> <span type="button" class="badge rounded-pill text-bg-primary btn-detail-transaksi" style="padding-top: 5px;">
             <i class="fi fi-rr-info">
              <input type="hidden" class="no-transaksi" value="<?= $row['no_barang_masuk']; ?>">
             </i>
            </span>
           </td>
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
          <th scope="col">TIDAK ADA TRANSAKSI MASUK</th>
         </tr>
        </thead>
        <tbody>
         <tr>
          <td>Data tidak tersedia</td>
         </tr>
        </tbody>
       </table>
      </div>
     <?php endif; ?>
    </div>
   </div>
  </div>
 </div>
 <!-- Masuk ke hasilTransaksiView -->
 <!-- <div class=""> -->

 <div class="col-sm-6 hasilTransaksiView">
 </div>
 <!-- </div> -->

</div>

<!-- DIV TABEL TRANSAKSI KELUAR -->
<div class="row barang-keluar">
 <div class="col-sm-6 mb-3 mb-sm-0 barang-kel">
  <div class="card">
   <div class="card-body">
    <h5 id="barang-judul">Transaksi Barang Keluar</h5>
    <div class="lihat-tabel-sendiri">
     <?php if (!empty($transaksiKeluarGudang)) :
      $no2 = 1;
     ?>
      <div class="table-responsive">
       <table class="table" id="example3">
        <thead>
         <tr>
          <th scope="col">No</th>
          <th scope="col">Id Keluar</th>
          <th scope="col">Waktu</th>
          <th scope="col">Total Harga</th>
          <th scope="col">User</th>
          <!-- <th scope="col">Gudang</th> -->
          <th scope="col">Aksi</th>
         </tr>
        </thead>
        <tbody>
         <?php foreach ($transaksiKeluarGudang as $row) : ?>
          <tr>
           <th scope="row"> <?= $no2++; ?> </th>
           <td> <?= $row['no_barang_keluar']; ?> </td>
           <td> <?= $row['tanggal_keluar']; ?> </td>
           <td> <?= $row['total_harga']; ?> </td>
           <td> <?= $row['username']; ?> </td>
           <!-- <td> <?= $row['nama_gudang']; ?> </td> -->
           <td> <span type="button" class="badge rounded-pill text-bg-primary btn-detail-transaksi2" style="padding-top: 5px;">
             <i class="fi fi-rr-info">
              <input type="hidden" class="no-transaksi2" value="<?= $row['no_barang_keluar']; ?>">
             </i>
            </span>
           </td>
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
          <th scope="col">TIDAK ADA TRANSAKSI KELUAR</th>
         </tr>
        </thead>
        <tbody>
         <tr>
          <td>Data tidak tersedia</td>
         </tr>
        </tbody>
       </table>
      </div>
     <?php endif; ?>
    </div>
   </div>
  </div>
 </div>
 <!-- Masuk ke hasilTransaksiView -->
 <!-- <div class=""> -->

 <div class="col-sm-6 hasilTransaksiView2">
 </div>
 <!-- </div> -->

</div>

<!-- DIV INPUT TRANSAKSI MASUK -->
<div class="card input-masuk">
 <div class="card-body">
  <form method="post" action="<?= base_url('/TransaksiController/storeMasuk'); ?>">
   <h5>Input Stok Masuk</h5>
   <input type="hidden" class="form-control" id="no_barang_masuk1" name="no_barang_masuk" value="">
   <input type="hidden" class="form-control" id="tanggal_masuk1" name="tanggal_masuk" value="">
   <input type="hidden" class="form-control" id="id_user1" name="id_user" value="<?= session('id_user') ?>">
   <input type="hidden" class="form-control" id="kode_gudang1" name="kode_gudang" value="<?= $isiKodeGudang ?>">

   <!-- <h1><?= $isiKodeGudang ?></h1> -->
   <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">Supplier</span>
    <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> -->
    <select class="form-select" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-default" name="id_supplier" id="id_supplier">
     <option selected value="">Pilih Supplier</option>
     <?php if (!empty($supplierOn)) {
      foreach ($supplierOn as $s) {
     ?>
       <option value="<?= $s['id_supplier'] ?>"><?= $s['nama_supplier'] ?></option>
     <?php
      }
     } ?>
    </select>
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">Barang</span>
    <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> -->
    <select class="form-select" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-default" name="kode_barang" id="kode_barang1">
     <option selected value="">Pilih Barang</option>
     <?php if (!empty($barangOnId)) {
      foreach ($barangOnId as $b) {
     ?>
       <option value="<?= $b['kode_barang'] ?>"><?= $b['nama_barang'] ?> (Stok : <?= $b['jumlah_barang'] ?>)</option>
     <?php
      }
     } ?>
    </select>
   </div>

   <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default-2">Satuan</span>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default-2" readonly name="satuan" id="satuan1">
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default-3">Harga</span>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default-3" readonly name="harga" id="harga1">
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default-4">Jumlah</span>
    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default-4" min="1" required readonly name="jumlah" id="jumlah1">
   </div>

   <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default-5">Total Harga</span>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default-5" readonly name="total_harga" id="total_harga1">
   </div>

   <button type="button" class="btn btn-outline-warning" id="btn-reset1">Reset</button>
   <button type="submit" class="btn btn-outline-primary" id="btn-save1">Save</button>

  </form>
 </div>
</div>

<!-- DIV INPUT TRANSAKSI KELUAR -->
<div class="card input-keluar">
 <div class="card-body">
  <form method="post" action="<?= base_url('/TransaksiController/storeKeluar'); ?>">
   <h5>Input Stok Keluar</h5>
   <input type="hidden" class="form-control" id="no_barang_keluar2" name="no_barang_keluar" value="">
   <input type="hidden" class="form-control" id="tanggal_keluar2" name="tanggal_keluar" value="">
   <input type="hidden" class="form-control" id="id_user2" name="id_user" value="<?= session('id_user') ?>">
   <input type="hidden" class="form-control" id="kode_gudang2" name="kode_gudang" value="<?= $isiKodeGudang ?>">

   <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">Barang</span>
    <!-- <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> -->
    <select class="form-select" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-default" name="kode_barang" id="kode_barang2">
     <option selected value="">Pilih Barang</option>
     <?php if (!empty($barangOn1Id)) {
      foreach ($barangOn1Id as $b) {
     ?>
       <option value="<?= $b['kode_barang'] ?>"><?= $b['nama_barang'] ?> (Stok : <?= $b['jumlah_barang'] ?>)</option>
     <?php
      }
     } ?>
    </select>
   </div>

   <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default-2">Satuan</span>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default-2" readonly name="satuan" id="satuan2">
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default-3">Harga</span>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default-3" readonly name="harga" id="harga2">
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default-4">Jumlah</span>
    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default-4" min="1" required readonly name="jumlah" id="jumlah2">
   </div>

   <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default-5">Total Harga</span>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default-5" readonly name="total_harga" id="total_harga2">
   </div>

   <button type="button" class="btn btn-outline-warning" id="btn-reset2">Reset</button>
   <button type="submit" class="btn btn-outline-primary" id="btn-save2">Save</button>

  </form>
 </div>
</div>

<script>
 // datatables
 new DataTable('#example1');
 // new DataTable('#example2');
 new DataTable('#example3');
 // new DataTable('#example4');
 const divMasuk = document.querySelectorAll('.barang-masuk')
 const divMas = document.querySelectorAll('.barang-mas')
 const divUk = document.querySelectorAll('.hasilTransaksiView')
 const divKeluar = document.querySelectorAll('.barang-keluar')
 const divKel = document.querySelectorAll('.barang-kel')
 const divAr = document.querySelectorAll('.hasilTransaksiView2')
 const divInputMasuk = document.querySelectorAll('.input-masuk')
 const divInputKeluar = document.querySelectorAll('.input-keluar')
 divAr.forEach(e => {
  e.style.display = 'none'
 })
 divKel.forEach(e => {
  e.style.display = 'none'
 })
 divInputMasuk.forEach(e => {
  e.style.display = 'none'
 })
 divInputKeluar.forEach(e => {
  e.style.display = 'none'
 })

 var noTransaksiMasuk = ''
 var noTransaksiKeluar = ''

 $('#stok-masuk').on('click', function() {
  tampilkanMasuk()
 });
 $('#stok-keluar').on('click', function() {
  tampilkanKeluar()
 });
 $('#tambah-masuk').on('click', function() {
  inputkanMasuk()
 });
 $('#tambah-keluar').on('click', function() {
  inputkanKeluar()
 });

 function tampilkanMasuk() {
  divMas.forEach(e => {
   e.style.display = 'block'
  })
  divUk.forEach(e => {
   e.style.display = 'block'
  })
  divKel.forEach(e => {
   e.style.display = 'none'
  })
  divAr.forEach(e => {
   e.style.display = 'none'
  })
  divInputMasuk.forEach(e => {
   e.style.display = 'none'
  })
  divInputKeluar.forEach(e => {
   e.style.display = 'none'
  })
 }

 function tampilkanKeluar() {
  divMas.forEach(e => {
   e.style.display = 'none'
  })
  divUk.forEach(e => {
   e.style.display = 'none'
  })
  divKel.forEach(e => {
   e.style.display = 'block'
  })
  divAr.forEach(e => {
   e.style.display = 'block'
  })
  divInputMasuk.forEach(e => {
   e.style.display = 'none'
  })
  divInputKeluar.forEach(e => {
   e.style.display = 'none'
  })
 }

 function inputkanKeluar() {
  divMas.forEach(e => {
   e.style.display = 'none'
  })
  divUk.forEach(e => {
   e.style.display = 'none'
  })
  divKel.forEach(e => {
   e.style.display = 'none'
  })
  divAr.forEach(e => {
   e.style.display = 'none'
  })
  divInputMasuk.forEach(e => {
   e.style.display = 'none'
  })
  divInputKeluar.forEach(e => {
   e.style.display = 'block'
  })
 }

 function inputkanMasuk() {
  divMas.forEach(e => {
   e.style.display = 'none'
  })
  divUk.forEach(e => {
   e.style.display = 'none'
  })
  divKel.forEach(e => {
   e.style.display = 'none'
  })
  divAr.forEach(e => {
   e.style.display = 'none'
  })
  divInputMasuk.forEach(e => {
   e.style.display = 'block'
  })
  divInputKeluar.forEach(e => {
   e.style.display = 'none'
  })
 }


 // Ketika tombol detail transaksi diklik
 $('.btn-detail-transaksi').on('click', function() {
  // Mengambil nilai no_trans yang ada di input hidden
  noTransaksiMasuk = $(this).find('.no-transaksi').val();

  // Melakukan sesuatu dengan nilai no_trans yang telah diambil
  console.log('Nilai no_trans:', noTransaksiMasuk);
  tampilkanMasuk()
  viewDetailMasuk();
  // Anda dapat menyimpan nilai ini ke variabel JavaScript lainnya atau melakukan operasi yang diinginkan.
 });


 $('.btn-detail-transaksi2').on('click', function() {

  noTransaksiKeluar = $(this).find('.no-transaksi2').val();
  console.log('Nilai no_trans:', noTransaksiKeluar);
  tampilkanKeluar()
  viewDetailKeluar();
 });

 function viewDetailMasuk() {
  let viewTransaksiMasuk = noTransaksiMasuk;
  $.ajax({
   type: "POST",
   url: "<?= base_url('TransaksiController/viewDetailTransaksiMasuk') ?>",
   data: {
    viewTransaksiMasuk: viewTransaksiMasuk,
   },
   dataType: "JSON",
   success: function(response) {
    if (response.data) {
     $('.hasilTransaksiView').html(response.data);
     console.log(response.data);
    }
   }
  })
 }

 function viewDetailKeluar() {
  let viewTransaksiKeluar = noTransaksiKeluar;
  $.ajax({
   type: "POST",
   url: "<?= base_url('TransaksiController/viewDetailTransaksiKeluar') ?>",
   data: {
    viewTransaksiKeluar: viewTransaksiKeluar,
   },
   dataType: "JSON",
   success: function(response) {
    if (response.data) {
     $('.hasilTransaksiView2').html(response.data);
     console.log(response.data);
    }
   }
  })
 }
</script>
<!-- Moment.js untuk waktu -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> -->
<script src="<?= base_url('js/moment.min.js'); ?>"></script>

<!-- id.js untuk waktu Indonesia -->
<script src="<?= base_url('js/id.js'); ?>"></script>
<!-- waktu -->
<!-- input -->
<script>
 const id_supplier = document.querySelector('#id_supplier')
 const kode_barang1 = document.querySelector('#kode_barang1')
 const satuan1 = document.querySelector('#satuan1')
 const harga1 = document.querySelector('#harga1')
 const jumlah1 = document.querySelector('#jumlah1')
 const total_harga1 = document.querySelector('#total_harga1')
 const btnreset1 = document.querySelector('#btn-reset1')
 const btnsave1 = document.querySelector('#btn-save1')

 const tanggal_masuk1 = document.querySelector('#tanggal_masuk1')

 tanggal_masuk1.value = moment().locale('id').format('YYYY-MM-DD HH:mm:ss');


 $('#kode_barang1').on('change', function() {
  const selectedKodeBarang = $(this).val(); // Ambil nilai kode_barang yang dipilih
  if (selectedKodeBarang != "") {
   console.log('Memilih: ' + selectedKodeBarang)
   $.ajax({
    url: "<?= base_url('TransaksiController/getDataBarang') ?>", // Ganti dengan URL endpoint untuk mendapatkan data barang
    method: 'POST',
    data: {
     kode_barang: selectedKodeBarang
    },
    success: function(response) {
     jumlah1.removeAttribute('readonly')
     // jumlah1.setAttribute('max', response.jumlah_barang)
     satuan1.value = response.satuan;
     harga1.value = response.harga_beli;
     tanggal_masuk1.value = moment().locale('id').format('YYYY-MM-DD HH:mm:ss');

     // hitungTotalHarga();
    },
    error: function(error) {
     console.error('Error:', error);
    }
   });
  } else {
   console.log('pilih barang yang ada')
   satuan1.value = "";
   harga1.value = "";
   jumlah1.value = ""
   jumlah1.setAttribute('readonly', true)
  }
 });
 $('#jumlah1').on('change', function() {
  total_harga1.value = harga1.value * jumlah1.value
  console.log(total_harga1.value)
 });
 btnreset1.addEventListener('click', function() {
  jumlah1.setAttribute('readonly', true)
  btnsave1.setAttribute('disabled', true)
  document.querySelector('#satuan1').value = '';
  document.querySelector('#harga1').value = '';
  document.querySelector('#jumlah1').value = '';
  document.querySelector('#total_harga1').value = '';
  document.querySelector('#id_supplier').value = '';
  document.querySelector('#kode_barang1').value = '';
  console.log(tanggal_masuk1.value);
 });
 $('#btn-save1').on('click', function() {
  tanggal_masuk1.value = moment().locale('id').format('YYYY-MM-DD HH:mm:ss');

  console.log(tanggal_masuk1.value);
 });
 btnsave1.setAttribute('disabled', true)

 function periksaKetersediaanInput() {
  return id_supplier.value !== '' && kode_barang1.value !== '';
 }

 // Memantau perubahan pada select supplier
 id_supplier.addEventListener('change', function() {
  if (periksaKetersediaanInput()) {
   btnsave1.disabled = false; // Enable tombol simpan
  } else {
   btnsave1.disabled = true; // Disable tombol simpan
  }
 });

 // Memantau perubahan pada select barang
 kode_barang1.addEventListener('change', function() {
  if (periksaKetersediaanInput()) {
   btnsave1.disabled = false; // Enable tombol simpan
  } else {
   btnsave1.disabled = true; // Disable tombol simpan
  }
  jumlah1.value = ""
 });
</script>

<script src="<?= base_url('js/moment.min.js'); ?>"></script>

<!-- id.js untuk waktu Indonesia -->
<script src="<?= base_url('js/id.js'); ?>"></script>
<!-- output -->
<script>
 const kode_barang2 = document.querySelector('#kode_barang2')
 const satuan2 = document.querySelector('#satuan2')
 const harga2 = document.querySelector('#harga2')
 const jumlah2 = document.querySelector('#jumlah2')
 const total_harga2 = document.querySelector('#total_harga2')
 const btnreset2 = document.querySelector('#btn-reset2')
 const btnsave2 = document.querySelector('#btn-save2')

 const tanggal_keluar2 = document.querySelector('#tanggal_keluar2')

 // tanggal_keluar2.value = moment().locale('id').format('YYYY-MM-DD HH:mm:ss');


 $('#kode_barang2').on('change', function() {
  const selectedKodeBarang2 = $(this).val(); // Ambil nilai kode_barang yang dipilih
  if (selectedKodeBarang2 != "") {
   console.log('Memilih: ' + selectedKodeBarang2)
   $.ajax({
    url: "<?= base_url('TransaksiController/getDataBarang') ?>", // Ganti dengan URL endpoint untuk mendapatkan data barang
    method: 'POST',
    data: {
     kode_barang: selectedKodeBarang2
    },
    success: function(response) {
     jumlah2.removeAttribute('readonly')
     jumlah2.setAttribute('max', response.jumlah_barang)
     satuan2.value = response.satuan;
     harga2.value = response.harga_jual_satuan;
     tanggal_keluar2.value = moment().locale('id').format('YYYY-MM-DD HH:mm:ss');

     // hitungTotalHarga();
    },
    error: function(error) {
     console.error('Error:', error);
    }
   });
  } else {
   console.log('pilih barang yang ada')
   satuan2.value = "";
   harga2.value = "";
   jumlah2.value = ""
   jumlah2.setAttribute('readonly', true)
  }
 });
 $('#jumlah2').on('change', function() {
  total_harga2.value = harga2.value * jumlah2.value
  console.log(total_harga2.value)
 });
 btnreset2.addEventListener('click', function() {
  jumlah2.setAttribute('readonly', true)
  btnsave2.setAttribute('disabled', true)
  document.querySelector('#satuan2').value = '';
  document.querySelector('#harga2').value = '';
  document.querySelector('#jumlah2').value = '';
  document.querySelector('#total_harga2').value = '';
  document.querySelector('#kode_barang2').value = '';
  console.log(tanggal_keluar2.value);
 });
 $('#btn-save2').on('click', function() {
  tanggal_keluar2.value = moment().locale('id').format('YYYY-MM-DD HH:mm:ss');

  console.log(tanggal_keluar2.value);
 });
 btnsave2.setAttribute('disabled', true)

 function periksaKetersediaanInput2() {
  return kode_barang2.value !== '';
 }

 // Memantau perubahan pada select supplier

 // Memantau perubahan pada select barang
 kode_barang2.addEventListener('change', function() {
  if (periksaKetersediaanInput2()) {
   btnsave2.disabled = false; // Enable tombol simpan
  } else {
   btnsave2.disabled = true; // Disable tombol simpan
  }
  jumlah2.value = ""

 });
</script>
<?= $this->endSection('content') ?>