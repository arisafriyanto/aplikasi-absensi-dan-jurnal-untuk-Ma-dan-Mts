<?php

@$id = $_GET['id'];
@$foto = $_GET['foto'];

if (isset($_GET['id'])) {
    $sql = mysqli_query($conn, "DELETE FROM data_guru WHERE id= " . $id);
    $sql = mysqli_query($conn, "DELETE FROM jurnal_ma WHERE id= " . $id);
    $sql = mysqli_query($conn, "DELETE FROM absen_ma WHERE id= " . $id);
    $sql = mysqli_query($conn, "DELETE FROM jurnal_mts WHERE id= " . $id);
    $sql = mysqli_query($conn, "DELETE FROM absen_mts WHERE id= " . $id);
    unlink("../../assets/images/guru/" . $foto);
?>
    <script type="text/javascript">
        alert("Data Guru Berhasil Dihapus...!!!");
        window.location.href = "?page=data_guru";
    </script>
<?php
}

?>