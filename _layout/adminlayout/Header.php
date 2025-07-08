<?php
include '../../_management/Sc.php';
$sc = new Sc();
$sc->checkAccess('admin');
$route = $sc->getRouteInfo();
$modul = $route['module'];
$page  = $route['page'];
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>ClassroomScheduling | <?= htmlspecialchars($modul . ' - ' . $page) ?></title>

    <!-- Font & CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/custom.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Admin Panel Stil Uyarlaması -->
    <style>
      body {
        background-color: rgb(161, 161, 234) !important;
        font-family: 'Poppins', sans-serif !important;
      }

      .navbar, .offcanvas-header {
        background-color: rgb(52, 70, 122) !important;
        color: rgb(215, 215, 227) !important;
      }

      .navbar-brand {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
      }

      .sidebar {
        background-color: rgb(152, 64, 247) !important;
        border-right: 2px solid rgb(97, 86, 150);
      }

      .sidebar .nav-link {
        color: rgb(207, 161, 237);
        padding: 12px 20px;
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        border-radius: 8px;
        margin: 6px 12px;
        transition: all 0.3s ease;
      }

      .sidebar .nav-link i {
        color: rgb(89, 143, 215);
        transition: color 0.3s ease;
      }

      .sidebar .nav-link:hover {
        background: linear-gradient(to right, rgb(93, 137, 232), rgb(66, 136, 222));
        color: #000;
        box-shadow: 0 4px 6px rgba(9, 34, 90, 0.1);
      }

      .sidebar .nav-link:hover i {
        color: #000;
      }

      .sidebar .nav-link.text-danger {
        color: rgb(8, 11, 110) !important;
      }

      .sidebar .nav-link.text-danger:hover {
        background-color: rgba(163, 58, 58, 0.1);
        box-shadow: 0 4px 6px rgba(163, 58, 58, 0.15);
        color: #000 !important;
      }

      h1.h2 {
        color: rgb(127, 52, 189);
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
      }

      .card {
        background-color: rgb(211, 179, 234);
        border: none;
        box-shadow: 0 4px 10px rgba(167, 54, 232, 0.2);
        font-family: 'Poppins', sans-serif;
      }

      .card-title {
        color: rgb(72, 122, 231);
        font-weight: 600;
      }

      .card-text {
        font-size: 1.5rem;
        color: #000;
      }
    </style>
</head>

<body>
<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">
        Classroom Scheduling - <?= htmlspecialchars($modul) ?> Panel
    </a>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                 aria-labelledby="sidebarMenuLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="sidebarMenuLabel">Admin Panel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto min-vh-100">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/AddUser.php">
                                <i class="fas fa-user-plus"></i> Kullanıcı Ekle
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/AddAdmin.php">
                                <i class="fas fa-user-shield"></i> Admin Ekle
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/NewReservation.php">
                                <i class="fas fa-calendar-plus"></i> Yeni Rezervasyon
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/Reservations.php">
                                <i class="fas fa-calendar-check"></i> Rezervasyonlar
                            </a>
                        </li>
                    </ul>
                    <hr class="my-3">
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/Home.php">
                                <i class="fas fa-house"></i> Ana Sayfa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 text-danger" href="../../Auth/Logout.php">
                                <i class="fas fa-right-from-bracket"></i> Çıkış
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?= htmlspecialchars($page) ?></h1>
            </div>
