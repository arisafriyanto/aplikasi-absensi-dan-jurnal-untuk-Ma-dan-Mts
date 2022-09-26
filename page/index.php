<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("location: ../index.php");
    exit();
}

if (isset($_SESSION['admin'])) {
    header("location: admin/index.php");
} else if (isset($_SESSION['Guru_Ma'])) {
    header("location: guru_ma/index.php");
} else if (isset($_SESSION['Guru_Mts'])) {
    header("location: guru_mts/index.php");
}



// else if (!isset($_SESSION['admin'])) {
//     header("location: ../index.php");
// } else if (!isset($_SESSION['user'])) {
//     header("location: ../index.php");
// // }
