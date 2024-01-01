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
      label: 'Stok Tersedia',
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
 <!-- <h1>.......</h1> -->
<?php
} ?>