<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?= base_url() ?>/assets/logo/location_black_bg.jpg" rel="icon">
  <title>Admin GIS</title>
  <link href="<?= base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>/assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- mapbox -->
  <script src='https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.css' rel='stylesheet' />
  <!-- mapbox style -->
  <style>
      #map{
        position:relative;
        width:100%;
        height:500px;
      }
      /* coba style popup */
      .mapboxgl-popup{
        /* ini adalah container asli tapi bukan tempat kontent ditaruh */
        justify-content: center;
        align-items: center;
        
      }
      .mapboxgl-popup-close-button{
        /* ini adalah closebutton */
        color:red;
      }
      .mapboxgl-popup-content{
        /* ini kotak isianya */
        width:300px;
        padding:20px;
      }
      .mapboxgl-popup-content div {
        text-align: center;
      }
      .mapboxgl-popup-content nama {
        font-size:20px;
      }
      .mapboxgl-popup-content p {
        font-size:15px;
        margin:0 0 5px 0;
      }
      /* .mapboxgl-popup-content img {
        border-radius:50%;
        margin-bottom:10px;
        object-fit: cover;
        width:100px;
        height:100px;
      } */
    </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('admin/dashboard') ?>">
        <div class="sidebar-brand-icon">
          <img src="https://www.plnbatam.com/wp-content/themes/brightpln/img/main_logo.jpg">
        </div>
        <div class="sidebar-brand-text mx-3"></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item <?= $this->uri->segment(2) == 'dashboard' ? 'active' : null ?>">
        <a class="nav-link" href="<?= site_url("admin/dashboard") ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item <?= $this->uri->segment(2) == 'pelanggan' ? 'active' : null ?>">
        <a class="nav-link" href="<?= site_url("admin/pelanggan") ?>">
          <i class="fas fa-address-book"></i>
          <span>Data Pelanggan</span></a>
      </li>
      <li class="nav-item <?= $this->uri->segment(2) == 'odp' ? 'active' : null ?>">
        <a class="nav-link" href="<?= site_url("admin/odp") ?>">
          <i class="fas fa-bolt"></i>
          <span>Data ODP</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item <?= $this->uri->segment(2) == 'pengguna' ? 'active' : null ?>">
        <a class="nav-link" href="<?= site_url("admin/pengguna") ?>">
          <i class="fas fa-users"></i>
          <span>Data Pengguna</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?= ucfirst($this->session->userdata('username')) ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= site_url("admin/profile") ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= site_url("auth/logout") ?>">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->