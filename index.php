<?php

session_start();

require "functions.php";


if (isset($_SESSION['admin'])) {
    header("location: page/index.php");
} else if (isset($_SESSION['Guru_Ma'])) {
    header("location: page/index.php");
} else if (isset($_SESSION['Guru_Mts'])) {
    header("location: page/index.php");
}

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
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="assets/images/logobmap.png" alt="adminbanimass" width="300">
                            </a>
                        </div>



                        <?php


                        if (isset($_POST['login'])) {

                            $username = htmlspecialchars(addslashes(mysqli_real_escape_string($conn,  $_POST['username'])));
                            $password = mysqli_real_escape_string($conn, $_POST['password']);
                            $level    = $_POST['level'];


                            if ($level == "admin") {

                                $sql = mysqli_query($conn, "select * from admin where username='$username' and level='$level' ");

                                @$cek = mysqli_query($conn, "select * from admin where username='$username'");
                                @$le = mysqli_query($conn, "select * from admin where level='$level'");

                                if (!mysqli_fetch_assoc($cek)) {
                                    echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-warning">
                                            Upss!!!
                                        </span>
                                        <span class="badge badge-pill badge-danger">
                                            Kamu Gagal Masuk!
                                        </span><br>
                                        Username Belum Terdaftar Sebagai Admin!!!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>';
                                } else if (!mysqli_fetch_assoc($le)) {
                                    return false;
                                }


                                if (mysqli_num_rows($sql) === 1) {

                                    $data = mysqli_fetch_assoc($sql);

                                    if (password_verify($password, $data['password'])) {

                                        $_SESSION['username'] = $username;

                                        if ($username = $data['id_admin']) {

                                            $_SESSION['login'] = true;
                                            $_SESSION['level'] = $level;
                                            $_SESSION['admin'] = "admin";
                                            $_SESSION['id_admin'] = $data['id_admin'];
                                            header("location: page/admin/index.php");
                                            exit;
                                        }
                                    } else {
                                        echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                            <span class="badge badge-pill badge-warning">
                                                Upss!!!
                                            </span>
                                            <span class="badge badge-pill badge-danger">
                                                Kamu Gagal Masuk!
                                            </span><br>
                                            Password Anda Salah...!!!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                    }
                                }
                            } else if ($level == "Guru_Ma") {

                                $sql = mysqli_query($conn, "select * from data_guru where username='$username' and guru_ma='$level' ");

                                @$cek = mysqli_query($conn, "select * from data_guru where username='$username'");
                                @$le = mysqli_query($conn, "select * from data_guru where guru_ma='$level'");

                                if (!mysqli_fetch_assoc($cek)) {
                                    echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-warning">
                                            Upss!!!
                                        </span>
                                        <span class="badge badge-pill badge-danger">
                                            Kamu Gagal Masuk!
                                        </span><br>
                                        Username Belum Terdaftar Sebagai Guru Ma!!!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>';
                                } else if (!mysqli_fetch_assoc($le)) {
                                    return false;
                                }


                                if (mysqli_num_rows($sql) === 1) {

                                    $data = mysqli_fetch_assoc($sql);

                                    if ($password === $data['password']) {

                                        $_SESSION['username'] = $username;

                                        if ($username = $data['id']) {

                                            $_SESSION['login'] = true;
                                            $_SESSION['level'] = $level;
                                            $_SESSION['Guru_Ma'] = "Guru_Ma";
                                            $_SESSION['id'] = $data['id'];
                                            $_SESSION['nama'] = $data['nama'];
                                            header("location: page/guru_ma/index.php");
                                            exit;
                                        }
                                    } else {
                                        echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                            <span class="badge badge-pill badge-warning">
                                                Upss!!!
                                            </span>
                                            <span class="badge badge-pill badge-danger">
                                                Kamu Gagal Masuk!
                                            </span><br>
                                            Password Anda Salah...!!!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                    }
                                }
                            } else if ($level == "Guru_Mts") {

                                $sql = mysqli_query($conn, "select * from data_guru where username='$username' and guru_mts='$level' ");

                                @$cek = mysqli_query($conn, "select * from data_guru where username='$username'");
                                @$le = mysqli_query($conn, "select * from data_guru where guru_mts='$level'");

                                if (!mysqli_fetch_assoc($cek)) {
                                    echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-warning">
                                            Upss!!!
                                        </span>
                                        <span class="badge badge-pill badge-danger">
                                            Kamu Gagal Masuk!
                                        </span><br>
                                        Username Belum Terdaftar Sebagai Guru Mts!!!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>';
                                } else if (!mysqli_fetch_assoc($le)) {
                                    return false;
                                }


                                if (mysqli_num_rows($sql) === 1) {

                                    $data = mysqli_fetch_assoc($sql);

                                    if ($password === $data['password']) {

                                        $_SESSION['username'] = $username;

                                        if ($username = $data['id']) {

                                            $_SESSION['login'] = true;
                                            $_SESSION['level'] = $level;
                                            $_SESSION['Guru_Mts'] = "Guru_Mts";
                                            $_SESSION['id'] = $data['id'];
                                            $_SESSION['nama'] = $data['nama'];
                                            header("location: page/guru_mts/index.php");
                                            exit;
                                        }
                                    } else {
                                        echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                            <span class="badge badge-pill badge-warning">
                                                Upss!!!
                                            </span>
                                            <span class="badge badge-pill badge-danger">
                                                Kamu Gagal Masuk!
                                            </span><br>
                                            Password Anda Salah...!!!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                    }
                                }
                            }
                        }

                        ?>


                        <div class="login-form">
                            <form action="" method="post">

                                <div class="row form-group">
                                    <div class="col-12 col-md-12">
                                        <select name="level" id="select" class="form-control">
                                            <option value="admin">Admin</option>
                                            <option value="Guru_Ma">Guru Ma</option>
                                            <option value="Guru_Mts">Guru Mts</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input class="au-input au-input--full" type="username" name="username" placeholder="Nama Pengguna" required>
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Katasandi" required>
                                </div>

                                <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20" name="login">Masuk</button>

                            </form>
                            <p id="backtoblog" align="center">
                                <a href="https://banimass.com/">
                                    &larr; Kembali ke BANI MA&#039;MUN ASSALAMI
                                </a>
                            </p>

                            <?php

                            $sql = mysqli_query($conn, "select * from admin");
                            $admin = mysqli_fetch_assoc($sql);

                            ?>

                            <?php if (@$admin['id_admin'] == "") { ?>

                                <p id="backtoblog" align="center">
                                    Not Register ?
                                    <a href="register.php"> click here</a>
                                </p>

                            <?php } else { ?>

                                <br>
                                <p align="center">Copyright © 2020 arisafriyanto.</p>

                            <?php } ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/vendor/slick/slick.min.js">
    </script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/animsition/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>

</body>

</html>
<!-- end document-->