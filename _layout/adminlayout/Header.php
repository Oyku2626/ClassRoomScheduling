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
     /* Admin Panel Stil Uyarlaması - Orbitron & Uzay Teması */

body {
  background-color: #0a0c23 !important; /* Koyu uzay mavisi */
  font-family: 'Orbitron', sans-serif !important;
  color: #cdd3e7; /* Açık mor-mavi yazı */
}

.navbar, .offcanvas-header {
  background: linear-gradient(135deg, #a3768a, #bb89ae) !important; /* Uzay pembesi gradyan */
  color: #c479c7 !important; /* Pembe yazı */
  box-shadow: 0 0 12px #ff6fd8;
  font-weight: 700;
}

.navbar-brand {
  font-family: 'Orbitron', sans-serif;
  font-weight: 700;
  color: #ff7ddb !important;
  text-shadow: 0 0 8px #d61a6f;
}

.sidebar {
  background: rgba(10, 12, 35, 0.85) !important; /* Transparan koyu arka plan */
  border-right: 2px solid #bb89ae;
  color: #c479c7;
  font-family: 'Orbitron', sans-serif;
}

.sidebar .nav-link {
  color: #c479c7;
  padding: 12px 20px;
  font-size: 15px;
  font-weight: 500;
  border-radius: 8px;
  margin: 6px 12px;
  transition: all 0.3s ease;
}

.sidebar .nav-link i {
  color: #a3768a;
  transition: color 0.3s ease;
}

.sidebar .nav-link:hover {
  background: linear-gradient(135deg, #d61a6f, #e255c5);
  color: #fff;
  box-shadow: 0 0 16px #ffa1dd;
}

.sidebar .nav-link:hover i {
  color: #fff;
}

.sidebar .nav-link.text-danger {
  color: #ff6fd8 !important;
}

.sidebar .nav-link.text-danger:hover {
  background-color: rgba(214, 26, 111, 0.2);
  box-shadow: 0 0 16px rgba(255, 105, 210, 0.5);
  color: #fff !important;
}

h1.h2 {
  color: #bb89ae;
  font-family: 'Orbitron', sans-serif;
  font-weight: 700;
  text-shadow: 0 0 10px #d61a6f;
}

.card {
  background: rgba(10, 12, 35, 0.85);
  border: none;
  box-shadow: 0 0 25px rgba(138, 180, 255, 0.3);
  font-family: 'Orbitron', sans-serif;
  color: #cdd3e7;
}

.card-title {
  color: #ffa1dd;
  font-weight: 700;
  text-shadow: 0 0 8px #ff6fd8;
}

.card-text {
  font-size: 1.5rem;
  color: #cdd3e7;
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
                                <i class="fas fa-user-plus"></i> Add Crew
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/AddAdmin.php">
                                <i class="fas fa-user-shield"></i> Commander Astronaut
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/NewReservation.php">
                                <i class="fas fa-calendar-plus"></i> New Reservation
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/Reservations.php">
                                <i class="fas fa-calendar-check"></i> Rezervations
                            </a>
                        </li>
                    </ul>
                    <hr class="my-3">
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="../../Pages/Admin/Home.php">
                                <i class="fas fa-house"></i> Home Page
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 text-danger" href="../../Auth/Logout.php">
                                <i class="fas fa-right-from-bracket"></i> Log out
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
            
