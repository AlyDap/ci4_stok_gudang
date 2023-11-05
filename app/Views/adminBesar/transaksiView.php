<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">

<body class="bg-warning">
 <nav class="navbar bg-body-tertiary fixed-top bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
   <a class="navbar-brand" href="#">Offcanvas navbar</a>
   <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
   </button>
   <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
     <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
     <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
     <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
      <li class="nav-item">
       <a class="nav-link active" aria-current="page" href="#">Home</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Dropdown
       </a>
       <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li>
         <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
       </ul>
      </li>
     </ul>
     <form class="d-flex mt-3" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
     </form>
    </div>
   </div>
  </div>
 </nav>
 <br><br>
 <a href="<?= base_url('DashboardController'); ?>">
  <h1>Home</h1>
 </a>


 <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
    <div class="modal-header">
     <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
     Show a second modal and hide this one with the button below.
    </div>
    <div class="modal-footer">
     <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second
      modal</button>
    </div>
   </div>
  </div>
 </div>
 <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria- labelledby="exampleModalToggleLabel2"
  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
    <div class="modal-header">
     <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
     Hide this modal and show the first with the button below.
    </div>
    <div class="modal-footer">
     <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
    </div>
   </div>
  </div>
 </div>
 <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first modal</button>

 <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>

</body>

</html>