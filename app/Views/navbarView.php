<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?= $title; ?>
  </title>
  <!-- bootstrap.min.css -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
  <!-- <link rel="stylesheet" href="<?= base_url('css/style_tab_bar.css'); ?>"> -->

  <!-- ikon Flaticon-->
  <link rel="stylesheet" href="<?= base_url('uicons-regular-rounded/css/uicons-regular-rounded.css'); ?>">

  <!-- adminlte -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css"
    integrity="sha256-rhU0oslUDWrWDxTY4JxI2a2OdRtG7YSf3v5zcRbcySE=" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="<?= base_url('css/adminlte.min.css'); ?>">

  <!-- Ikon ionic -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- tidak bisa -->
  <link rel="stylesheet" href="<?= base_url('css/ionicons.min.css'); ?>">
  <style>
    .time {
      color: #fff;
      margin-top: 7.5px;
      right: 5%;
      position: absolute;
    }

    @media(max-width:991px) {
      .time {
        color: #fff;
        /* margin-top: 110px; */
        /* right: 5%; */
        bottom: 0;
        position: absolute;
      }
    }

    @media print {
      .gaprint {
        display: none;
      }

      .total {
        display: inline;
      }
    }
  </style>
</head>

<body class="bg-light" onload="updateClock()">
  <nav class="navbar sticky-top navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">

      <!-- Cek Foto User -->
      <?php if (session()->has('foto_user')): ?>
        <!-- <img src="<?= base_url('path_ke_foto/' . session('foto_user')); ?>" alt="Foto Pengguna"> -->
        <img src="<?= base_url('gambar_user/' . session('foto_user')); ?>" alt="Foto User" data-bs-toggle="modal"
          data-bs-target="#staticBackdrop" width="30" class="d-inline-block align-text-top"
          style="margin-right: 9px; border-radius: 21%; cursor: pointer;">
      <?php else: ?>
        <!-- <p>Foto pengguna tidak ditemukan.</p> -->
      <?php endif; ?>

      <a class="navbar-brand" href="<?= base_url('DashboardController'); ?>" style="padding-bottom: 7px;">

        <!-- Cek nama gudang -->
        <?php if (session()->has('nama_gudang')): ?>
          <?= session('nama_gudang'); ?>
        <?php else: ?>
          DASBOARD
        <?php endif; ?>

        <!-- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24"> -->
      </a>


      <!-- <a class="navbar-brand" href="#"></a> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <i class="fi fi-rr-menu-burger"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <!-- cek admin besar -->
          <?php if (session()->get('jenis') == ('Besar')) {
            ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page"
                href="<?= base_url('DashboardController/produk'); ?>">Produk</a>
            </li>

          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('DashboardController/transaksi'); ?>"> Transaksi </a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Akun
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Info</a></li>
              <li><a class="dropdown-item" href="#">Kelola</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
              <li><a class="dropdown-item disabled" aria-disabled="true">Mengelola Akun</a></li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">
              <!-- <p class="time gaprint"> -->
              <span id="waktu" class="jam">
                <!-- </p> -->
            </a>
          </li>
        </ul>
        <div class="d-flex" role="search">
          <div class="nav-item dropdown">
            <button class="btn btn-outline-light" style="padding-top: 9px; margin-right: 7.5px;"
              class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fi fi-rr-user"></i>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Info</a></li>
              <li><a class="dropdown-item" href="#">Setting</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
              <li><a class="dropdown-item disabled" aria-disabled="true">Akun</a></li>
            </ul>
          </div>
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
            <button class="btn btn-outline-light" style="padding-top: 9px;">
              <i class="fi fi-rr-exit"></i>
            </button>
          </a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container-fluid">

    <!-- divnya foto profil staticBackdrop-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <!-- <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
    -->
            <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body bg-dark" style="text-align: center;">
            <img src="<?= base_url('gambar_user/' . session('foto_user')); ?>" alt="Foto User" data-bs-toggle="modal"
              data-bs-target="#staticBackdrop" class="d-inline-block align-text-top" style="width: 100%;">
          </div>
          <div class="modal-footer bg-dark">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="button" class="btn btn-outline-light" data-bs-target="#exampleModalToggle2"
              data-bs-toggle="modal">Ganti Foto</button>
          </div>
        </div>
      </div>
    </div>
    <!-- divnya edit foto -->
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria- labelledby="exampleModalToggleLabel2"
      data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content  bg-dark">
          <div class="modal-header">
            <!-- <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1> -->
            <!-- <input type="file" class="form-control" id="foto_user"> -->
            <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="#">
            <div class="modal-body">
              <!-- Hide this modal and show the first with the button below. -->
              <div class="mb-3">
                <!-- <label for="foto_user" class="col-form-label">Silahkan pilih fotonya</label> -->
                <input type="file" class="form-control" id="foto_user">
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
              </div>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Close</button> -->
              <button class="btn btn-outline-light" data-bs-target="#staticBackdrop"
                data-bs-toggle="modal">Kembali</button>
              <a href="#">
                <button class="btn btn-outline-light" type="submit" data-bs-target="#staticBackdrop"
                  data-bs-toggle="modal">Simpan</button>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- divnya gambar pintu untuk logout staticBackdrop2-->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdrop2Label" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h1 class="modal-title fs-5" id="staticBackdrop2Label">Apakah Anda ingin keluar?</h1>

            <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-footer bg-dark">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Tidak</button>
            <a href="<?= base_url('LoginController/logOut'); ?>"><button type="button"
                class="btn btn-outline-light">Ya</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <!-- <div class="d-flex "> -->
    <!-- <p class="gaprint"> <span id="tanggal"></span></p> -->


    <!-- </div> -->


    <!-- Isi content -->
    <br>
    <?= $this->renderSection('content') ?>
  </div>

  <!-- <div class="container-fluid"> -->
  <br><br>
  <nav class="navbar fixed-bottom navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><span id="tanggal"></span></a>
    </div>
  </nav>
  <!-- </div> -->



  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
  <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- <script src="<?= base_url('js/script_tab_bar.js'); ?>"></script> -->

  <!-- Moment.js untuk waktu -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> -->
  <script src="<?= base_url('js/moment.min.js'); ?>"></script>

  <!-- id.js untuk waktu Indonesia -->
  <script src="<?= base_url('js/id.js'); ?>"></script>
  <!-- waktu -->
  <script>
    document.getElementById('tanggal').innerHTML = moment().locale('id').format('dddd DD MMMM YYYY');

    function updateClock() {
      // document.getElementById('waktu').innerHTML = jam + ':' + menit + ':' + detik;
      document.querySelector(".jam").innerHTML = moment().locale('id').format('hh:mm:ss');
      setTimeout(updateClock, 1000);
    };
  </script>
</body>

</html>