<?php

session_start();

require "../../functions.php";

if (!isset($_SESSION['login'])) {
    header("location: ../../index.php");
    exit();
}

$id_admin = $_SESSION['id_admin'];

@$sql = mysqli_query($conn, "select * from admin where id_admin='$id_admin'");
$data = mysqli_fetch_assoc($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Banimass</title>
    <!-- Fontfaces CSS-->
    <link href="../../assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../assets/css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="../../assets/DataTables/datatables.min.css" />

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="../../assets/images/logobmap.png" width="150px" alt="banimass" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">

                        <li class="active has-sub">
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>

                        <li>
                            <a href="?page=data_guru">
                                <i class="fas fa-table"></i>Data Guru</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-print"></i>MA</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="?page=print_jurnal_ma">
                                        <i class="fas fa-print"></i>Print Jurnal
                                    </a>
                                </li>
                                <li>
                                    <a href="?page=print_honor_ma">
                                        <i class="fas fa-print"></i>Print Rekap Honor
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-print"></i>MTS</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="?page=print_jurnal_mts">
                                        <i class="fas fa-print"></i>Print Jurnal
                                    </a>
                                </li>
                                <li>
                                    <a href="?page=print_honor_mts">
                                        <i class="fas fa-print"></i>Print Rekap Honor
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.php">
                    <img src="../../assets/images/logobmap.png" width="200px" alt="banimass" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">

                        <li>
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>

                        <li>
                            <a href="?page=data_guru">
                                <i class="fas fa-table"></i>Data Guru</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-print"></i>MA</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="?page=print_jurnal_ma">
                                        <i class="fas fa-print"></i>Print Jurnal
                                    </a>
                                </li>
                                <li>
                                    <a href="?page=print_honor_ma">
                                        <i class="fas fa-print"></i>Print Rekap Honor
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-print"></i>MTS</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="?page=print_jurnal_mts">
                                        <i class="fas fa-print"></i>Print Jurnal
                                    </a>
                                </li>
                                <li>
                                    <a href="?page=print_honor_mts">
                                        <i class="fas fa-print"></i>Print Rekap Honor
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                </div>

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../../assets/images/user.png" alt="Aris Afriyanto" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= $data['username'] ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../../assets/images/user.png" alt="Aris Afriyanto" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?= $data['username'] ?></a>
                                                    </h5>
                                                    <span class="email"><?= $data['email'] ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../../logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">



                    <?php

                    @$page = $_GET['page'];
                    @$aksi = $_GET['aksi'];

                    if ($page == "") {
                        include "home.php";
                    } else if ($page == "data_guru") {
                        if ($aksi == "") {
                            include "data guru/data_guru.php";
                        } else if ($aksi == "tambah") {
                            include "data guru/tambah_guru.php";
                        } else if ($aksi == "edit") {
                            include "data guru/edit_guru.php";
                        } else if ($aksi == "hapus") {
                            include "data guru/hapus_guru.php";
                        }
                    } else if ($page == "print_jurnal_ma") {
                        if ($aksi == "") {
                            include "jurnal ma/jurnal_ma.php";
                        } else if ($aksi == "jurnal_ma_print") {
                            include "jurnal ma/jurnal_ma_print.php";
                        }
                    } else if ($page == "print_honor_ma") {
                        if ($aksi == "") {
                            include "honor ma/honor_ma.php";
                        } else if ($aksi == "honor_ma_print") {
                            include "honor ma/honor_ma_print.php";
                        }
                    } else if ($page == "print_jurnal_mts") {
                        if ($aksi == "") {
                            include "jurnal mts/jurnal_mts.php";
                        } else if ($aksi == "jurnal_mts_print") {
                            include "jurnal mts/jurnal_mts_print.php";
                        }
                    } else if ($page == "print_honor_mts") {
                        if ($aksi == "") {
                            include "honor mts/honor_mts.php";
                        } else if ($aksi == "honor_mts_print") {
                            include "honor mts/honor_mts_print.php";
                        }
                    }
                    ?>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2020 arisafriyanto.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

    </div>

    <!-- Jquery JS-->
    <script src="../../assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../../assets/vendor/slick/slick.min.js">
    </script>
    <script src="../../assets/vendor/wow/wow.min.js"></script>
    <script src="../../assets/vendor/animsition/animsition.min.js"></script>
    <script src="../../assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../../assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../../assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../../assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../assets/vendor/select2/select2.min.js">
    </script>
    <!-- DATA TABLE SCRIPTS -->

    <script type="text/javascript" src="../../assets/DataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>

    <!-- Main JS-->
    <script src="../../assets/js/main.js"></script>

</body>

</html>
<!-- end document-->