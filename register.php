<?php

require_once "functions.php";

$sql = mysqli_query($conn, "select * from admin");
$sql_ma = mysqli_query($conn, "select * from data_guru");

$datalogin = mysqli_fetch_assoc($sql);
$dataMa = mysqli_fetch_assoc($sql_ma);


if (isset($datalogin['id_admin']) != "") {
    header("location: index.php");
} else if (isset($dataMa['username']) != "") {
    header("location: index.php");
}


if (isset($_SESSION['admin'])) {
    header("location: page/admin/index.php");
} else if (isset($_SESSION['Guru_Ma'])) {
    header("location: page/guru_ma/index.php");
} else if (isset($_SESSION['Guru_Mts'])) {
    header("location: page/guru_mts/index.php");
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
    <title>Login Admin</title>

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

                        if (isset($_POST['register'])) {

                            $email         = htmlspecialchars($_POST['email']);
                            $username         = strtolower(stripcslashes($_POST['username']));
                            $password         = mysqli_real_escape_string($conn, $_POST['password']);
                            $password2         = mysqli_real_escape_string($conn, $_POST['password2']);
                            $level = $_POST['level'];


                            if ($password !== $password2) {
                                echo "	<script>
                                            alert ('Konfirmasi katasandi harus sama...!!!');
                                            window.location.href='register.php';
                                        </script>
                                    ";

                                return false;
                            }

                            $password = password_hash($password, PASSWORD_DEFAULT);


                            $sql = mysqli_query($conn, "insert into admin (id_admin, email, username, password, level) values (null, '$email', '$username', '$password', '$level') ");


                            if ($sql) {
                                echo "
                                        <script>
                                            alert ('Register Berhasil Silahkan Login...!');
                                            window.location.href='index.php';
                                        </script>
                                    ";
                            } else {
                                echo "
                                        <script>
                                            alert ('Register Gagal Mohon Bersabar..!!!');
                                            window.location.href='register.php';
                                        </script>
                                    ";
                            }
                        }

                        ?>


                        <div class="login-form">
                            <form action="" method="post">

                                <div class="form-group">
                                    <input class="au-input au-input--full" type="text" name="level" value="admin" readonly>
                                </div>

                                <div class="form-group">
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="email..." autofocus="on" required>
                                </div>

                                <div class="form-group">
                                    <input class="au-input au-input--full" type="username" name="username" placeholder="nama pengguna..." required>
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="kata sandi..." required>
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="password" name="password2" placeholder="konfirmasi kata sandi..." required>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="register" type="submit">Masuk</button>
                            </form>
                            <p id="backtoblog" align="center">
                                <a href="https://banimass.com/">
                                    &larr; Kembali ke BANI MA&#039;MUN ASSALAMI
                                </a>
                            </p>

                            <p id="backtoblog" align="center">
                                Login ? <a href="index.php">click here </a>
                            </p>
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