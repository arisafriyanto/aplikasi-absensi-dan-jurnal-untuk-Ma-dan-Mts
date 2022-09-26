<?php

@$id_jurnal = $_GET['id_jurnal'];

if (isset($_GET['id_jurnal'])) {
    $sql = mysqli_query($conn, "DELETE FROM jurnal_ma WHERE id_jurnal= " . $id_jurnal);
?>
    <script type="text/javascript">
        alert("Data Jurnal Berhasil Dihapus...!!!");
        window.location.href = "?page=jurnal_ma";
    </script>
<?php
}

?>