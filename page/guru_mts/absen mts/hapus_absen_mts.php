<?php

@$id_absen = $_GET['id_absen'];

if (isset($_GET['id_absen'])) {
    $sql = mysqli_query($conn, "DELETE FROM absen_mts WHERE id_absen= " . $id_absen);
?>
    <script type="text/javascript">
        alert("Data Absen Berhasil Dihapus...!!!");
        window.location.href = "?page=absen_mts";
    </script>
<?php
}

?>