<?php if (!empty($filtermasuk)) {
 foreach ($filtermasuk as $key => $value) {
  $nama_barang11[] = $value['nama_barang'];
  $jumlah11[] = $value['jumlah'];
 }

?>
 <canvas id="myChart-11"></canvas>

 <script>
  // $(document).ready(function() Untuk Refresh code script grafik setiap kali klik lihat
  $(document).ready(function() {
   const ctx11 = document.getElementById('myChart-11');
   // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
   new Chart(ctx11, {
    type: 'polarArea',
    data: {
     labels: <?= json_encode($nama_barang11); ?>,
     datasets: [{
      label: 'Jumlah Stok Masuk',
      data: <?= json_encode($jumlah11); ?>,
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