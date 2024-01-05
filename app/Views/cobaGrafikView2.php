<?php if (!empty($filterkeluar)) {
 foreach ($filterkeluar as $key => $value) {
  $nama_barang22[] = $value['nama_barang'];
  $jumlah22[] = $value['jumlah'];
 }

?>
 <canvas id="myChart-22"></canvas>

 <script>
  // $(document).ready(function() Untuk Refresh code script grafik setiap kali klik lihat
  $(document).ready(function() {
   const ctx22 = document.getElementById('myChart-22');
   // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
   new Chart(ctx22, {
    type: 'polarArea',
    data: {
     labels: <?= json_encode($nama_barang22); ?>,
     datasets: [{
      label: 'Jumlah Stok Keluar',
      data: <?= json_encode($jumlah22); ?>,
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
 <p>Tidak ada stok yang masuk</p>
<?php
} ?>