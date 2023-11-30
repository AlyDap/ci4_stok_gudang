<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login / Signup </title>
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'> -->
  <link rel="stylesheet" href="<?= base_url('css/login_register_0.css'); ?>">
  <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
  <!-- <link rel="stylesheet" href="<?= base_url('css/login_register_1.css'); ?>"> -->
  <link rel="stylesheet" href="<?= base_url('css/login_register.css'); ?>">

  <style>
    .errr {
      /* margin-top: 18px; */
      margin-bottom: 2px;
    }
  </style>

</head>

<body>
  <!-- partial:index.partial.html -->

  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3">Log In</h4>
                      <?php if (session()->getFlashdata('error')) { ?>
                        <!-- <button class="button large round alert">Error notification</button> -->
                        <!-- <div class="alert alert-danger"></div> -->
                        <p class="errr">
                          <?= session()->getFlashdata('error') ?>
                        </p>
                      <?php } else {
                        ?>
                        <p class="errr">&#128522</p>
                        <?php
                      } ?>
                      <form method="post" action="<?= base_url('LoginController/processLogin'); ?>" autocomplete="off">
                        <div class="form-group">
                          <input type="text" name="loguser" class="form-style" placeholder="Your Username" id="loguser"
                            autofocus>
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" name="logpass" class="form-style" placeholder="Your Password"
                            id="logpass">
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button class="btn mt-4" id="submit-button" disabled>submit</button>
                      </form>
                      <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
                    </div>
                  </div>
                </div>
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3">Sign Up</h4>
                      <div class="form-group">
                        <input type="text" name="signame" class="form-style" placeholder="Your Full Name" id="signame"
                          autocomplete="off">
                        <i class="input-icon uil uil-user"></i>
                      </div>
                      <div class="form-group mt-2">
                        <input type="text" name="siguser" class="form-style" placeholder="Your Email" id="siguser"
                          autocomplete="off">
                        <i class="input-icon uil uil-at"></i>
                      </div>
                      <div class="form-group mt-2">
                        <input type="password" name="sigpass" class="form-style" placeholder="Your Password"
                          id="sigpass" autocomplete="off">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <a href="#" class="btn mt-4">submit</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- partial -->
  <script>
    // Mendapatkan elemen input username dan password
    var loguserInput = document.getElementById("loguser");
    var logpassInput = document.getElementById("logpass");

    // Mendapatkan elemen tombol submit
    var submitButton = document.getElementById("submit-button");

    // Menambahkan event listener ke kedua input
    loguserInput.addEventListener("input", toggleSubmitButton);
    logpassInput.addEventListener("input", toggleSubmitButton);

    // Fungsi untuk menonaktifkan/mengaktifkan tombol submit
    function toggleSubmitButton() {
      if (loguserInput.value !== "" && logpassInput.value !== "") {
        submitButton.disabled = false;
      } else {
        submitButton.disabled = true;
      }
    }
  </script>
</body>

</html>