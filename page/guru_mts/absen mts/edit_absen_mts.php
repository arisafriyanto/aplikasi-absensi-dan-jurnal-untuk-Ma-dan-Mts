<!-- USER DATA-->
<?php

if (!isset($_GET['id_absen'])) {
    header("location: ?page=absen_mts");
}

$id_absen = $_GET['id_absen'];

$sql = mysqli_query($conn, "select * from absen_mts where id_absen= " . $id_absen);

if (mysqli_num_rows($sql) < 1) {
    header("location: ?page=absen_mts");
}

$data = mysqli_fetch_assoc($sql);
$jam_mengajar_1 = $data['jam_1'];
$jam_mengajar_2 = $data['jam_2'];
$jam_mengajar_3 = $data['jam_3'];
$jam_mengajar_4 = $data['jam_4'];
$jam_mengajar_5 = $data['jam_5'];
$jam_mengajar_6 = $data['jam_6'];
$jam_mengajar_7 = $data['jam_7'];
$jam_mengajar_8 = $data['jam_8'];

?>

<!-- USER DATA-->
<div class="card col-md-12">
    <h3 class="title-3 m-b-30 ml-3 mt-4 mb-4">
        <i class="fas fa-refresh"></i>Edit Data Absen
    </h3>

    <div class="card">
        <div class="card-header">
            <strong>Edit Data</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post">

                <input type="hidden" name="tanggal" value="<?= $data['tanggal']; ?>">
                <input type="hidden" name="id_absen" value="<?= $data['id_absen']; ?>">

                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="nama" class=" form-control-label">Nama</label>
                        <input type="text" placeholder="nama" name="nama" class="form-control" id="nama" value="<?= $data['nama']; ?>" readonly>
                    </div>
                </div>



                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="total_jam" class=" form-control-label">Total Jam Mengajar</label>
                        <input type="number" name="total_jam" class="form-control" id="total_jam" value="<?= $data['total_jam'] ?>">
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-2">
                        <label class=" form-control-label">Jam Mengajar</label>
                    </div>
                    <div class="col col-md-9 ml-4">
                        <div class="form-check-inline form-check">
                            <label for="jam_1" class="form-check-label ">
                                <input type="checkbox" id="jam_1" name="jam_1" <?php echo ($jam_mengajar_1 == '1') ? "checked" : ""; ?> value="1" class="form-check-input"><span class="mr-3">1</span>
                            </label>
                            <label for="jam_2" class="form-check-label ">
                                <input type="checkbox" id="jam_2" name="jam_2" <?php echo ($jam_mengajar_2 == '2') ? "checked" : ""; ?> value="2" class="form-check-input"><span class="mr-3">2</span>
                            </label>
                            <label for="jam_3" class="form-check-label ">
                                <input type="checkbox" id="jam_3" name="jam_3" <?php echo ($jam_mengajar_3 == '3') ? "checked" : ""; ?> value="3" class="form-check-input"><span class="mr-3">3</span>
                            </label>
                            <label for="jam_4" class="form-check-label ">
                                <input type="checkbox" id="jam_4" name="jam_4" <?php echo ($jam_mengajar_4 == '4') ? "checked" : ""; ?> value="4" class="form-check-input"><span class="mr-3">4</span>
                            </label>
                            <label for="jam_5" class="form-check-label ">
                                <input type="checkbox" id="jam_5" name="jam_5" <?php echo ($jam_mengajar_5 == '5') ? "checked" : ""; ?> value="5" class="form-check-input"><span class="mr-3">5</span>
                            </label>
                            <label for="jam_6" class="form-check-label ">
                                <input type="checkbox" id="jam_6" name="jam_6" <?php echo ($jam_mengajar_6 == '6') ? "checked" : ""; ?> value="6" class="form-check-input"><span class="mr-3">6</span>
                            </label>
                            <label for="jam_7" class="form-check-label ">
                                <input type="checkbox" id="jam_7" name="jam_7" <?php echo ($jam_mengajar_7 == '7') ? "checked" : ""; ?> value="7" class="form-check-input"><span class="mr-3">7</span>
                            </label>
                            <label for="jam_8" class="form-check-label ">
                                <input type="checkbox" id="jam_8" name="jam_8" <?php echo ($jam_mengajar_8 == '8') ? "checked" : ""; ?> value="8" class="form-check-input"><span class="mr-3">8</span>
                            </label>
                        </div>
                    </div>
                </div>


        </div>

        <div class="card-footer">
            <button type="submit" name="edit" class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i> Submit
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>

        </form>
    </div>
</div>


<?php

if (isset($_POST['edit'])) {

    @$id_absen = $_POST['id_absen'];
    @$tanggal = $_POST['tanggal'];
    @$nama = htmlspecialchars($_POST['nama']);
    @$total_jam = htmlspecialchars($_POST['total_jam']);
    @$jam_1 = $_POST['jam_1'];
    @$jam_2 = $_POST['jam_2'];
    @$jam_3 = $_POST['jam_3'];
    @$jam_4 = $_POST['jam_4'];
    @$jam_5 = $_POST['jam_5'];
    @$jam_6 = $_POST['jam_6'];
    @$jam_7 = $_POST['jam_7'];
    @$jam_8 = $_POST['jam_8'];

    if ($total_jam > 8) {
        echo '
                <script type="text/javascript">
                    alert("Total jam mengajar maksimal 8 jam perhari...!!!");
                    window.location.href = "?page=absen_mts&aksi=edit&id_absen=' . $id_absen . '";
                </script>
                ';
        return false;
    }


    $sql = mysqli_query($conn, "UPDATE absen_mts SET nama='$nama', total_jam='$total_jam', jam_1='$jam_1', jam_2='$jam_2', jam_3='$jam_3', jam_4='$jam_4', jam_5='$jam_5', jam_6='$jam_6', jam_7='$jam_7', jam_8='$jam_8' WHERE id_absen= " . $id_absen);

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Absen Berhasil Diedit...!!!");
            window.location.href = "?page=absen_mts";
        </script>
<?php
    }
}

?>