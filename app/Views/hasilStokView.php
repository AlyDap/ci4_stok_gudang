<?php if (!empty($grafik_stok_semuagudang2)) {
 foreach ($grafik_stok_semuagudang2 as $key => $value) {
  $nama_barang[] = $value['nama_barang'];
  $jumlah[] = $value['jumlah'];
 }

?>
 <canvas id="myChart-select"></canvas>

 <script>
  // $(document).ready(function() Untuk Refresh code script grafik setiap kali klik lihat
  $(document).ready(function() {
   const ctxsemua = document.getElementById('myChart-select');
   // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
   new Chart(ctxsemua, {
    type: 'bar',
    data: {
     labels: <?= json_encode($nama_barang); ?>,
     datasets: [{
      label: 'Produk Yang Terjual',
      data: <?= json_encode($jumlah); ?>,
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
} else {
?>
 <div class="alert alert-dark" role="alert" style="text-align: center;">
  Stok Barang Tidak Ditemukan<br>&#128522; -- Terimakasih -- &#128522;
 </div>
<?php
} ?>