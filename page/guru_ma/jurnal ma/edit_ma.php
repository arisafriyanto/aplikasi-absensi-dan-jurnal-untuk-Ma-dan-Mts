<!-- USER DATA-->
<?php

if (!isset($_GET['id_jurnal'])) {
    header("location: ?page=jurnal_ma");
}

$id_jurnal = $_GET['id_jurnal'];

$sql = mysqli_query($conn, "select * from jurnal_ma where id_jurnal= " . $id_jurnal);

if (mysqli_num_rows($sql) < 1) {
    header("location: ?page=jurnal_ma");
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
        <i class="fas fa-refresh"></i>Edit Data Jurnal
    </h3>

    <div class="card">
        <div class="card-header">
            <strong>Edit Data</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post">

                <input type="hidden" name="tanggal" value="<?= $data['tanggal']; ?>">
                <input type="hidden" name="id_jurnal" value="<?= $data['id_jurnal']; ?>">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">

                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="nama" class=" form-control-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $data['nama']; ?>" readonly>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="mapel" class="form-control-label">
                            Mapel
                        </label>
                        <select name="mapel" id="mapel" class="form-control">
                            <option value="<?= $data['mapel']; ?>"><?= $data['mapel']; ?></option>
                            <option value="Al Quran Hadits">Al Quran Hadits</option>
                            <option value="Pendidikan Kewarganegaraan">
                                Pendidikan Kewarganegaraan
                            </option>
                            <option value="Akidah Akhlak">Akidah Akhlak</option>
                            <option value="Nahwu Shorof">Nahwu Shorof</option>
                            <option value="Prakarya">Prakarya</option>
                            <option value="Pendidikan Jasmani, Olahraga, dan Kesehatan">Pendidikan Jasmani, Olahraga, dan Kesehatan</option>
                            <option value="Fikih">Fikih</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Seni Budaya">Seni Budaya</option>
                            <option value="SKI">SKI</option>
                            <option value="Tahfidz Quran">Tahfidz Qur'an</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="BTQ">BTQ</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Arab">Bahasa Arab</option>
                            <option value="SOSIOLOGI">SOSIOLOGI</option>
                            <option value="GEOGRAFI">GEOGRAFI</option>
                            <option value="EKONOMI">EKONOMI</option>
                            <option value="SEJARAH">SEJARAH</option>
                            <option value="SEJARAH INDONESIA">SEJARAH INDONESIA</option>
                        </select>
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




                <div class="row form-group">

                    <div class="col col-md-12">
                        <label for="status" class="form-control-label">
                            Status
                        </label>
                        <select name="status" id="status" class="form-control">
                            <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>
                            <option value="Guru Pengajar">Guru Pengajar</option>
                            <option value="Guru Pengganti">Guru Pengganti</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col col-md-12">
                        <label for="materi_10" class=" form-control-label">
                            Materi Kelas 10
                        </label>
                        <input type="text" placeholder="pokok bahasan" name="materi_10" class="form-control" id="materi_10" value="<?= $data['materi_10'] ?>">
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col col-md-12">
                        <label for="materi_11" class=" form-control-label">
                            Materi Kelas 11
                        </label>
                        <input type="text" placeholder="pokok bahasan" name="materi_11" class="form-control" id="materi_11" value="<?= $data['materi_11'] ?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="materi_12" class=" form-control-label">
                            Materi Kelas 12
                        </label>
                        <input type="text" placeholder="pokok bahasan" name="materi_12" class="form-control" id="materi_12" value="<?= $data['materi_12'] ?>">
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


    @$id_jurnal = $_POST['id_jurnal'];
    @$tanggal = $_POST['tanggal'];
    @$nama = htmlspecialchars($_POST['nama']);
    @$mapel = $_POST['mapel'];
    @$jam_1 = $_POST['jam_1'];
    @$jam_2 = $_POST['jam_2'];
    @$jam_3 = $_POST['jam_3'];
    @$jam_4 = $_POST['jam_4'];
    @$jam_5 = $_POST['jam_5'];
    @$jam_6 = $_POST['jam_6'];
    @$jam_7 = $_POST['jam_7'];
    @$jam_8 = $_POST['jam_8'];
    @$status = $_POST['status'];
    @$materi_10 = htmlspecialchars($_POST['materi_10']);
    @$materi_11 = htmlspecialchars($_POST['materi_11']);
    @$materi_12 = htmlspecialchars($_POST['materi_12']);


    $sql = mysqli_query($conn, "UPDATE jurnal_ma SET nama='$nama', mapel='$mapel', jam_1='$jam_1', jam_2='$jam_2', jam_3='$jam_3', jam_4='$jam_4', jam_5='$jam_5', jam_6='$jam_6', jam_7='$jam_7', jam_8='$jam_8', status='$status', materi_10='$materi_10', materi_11='$materi_11', materi_12='$materi_12' WHERE id_jurnal= " . $id_jurnal);

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Jurnal Berhasil Diedit...!!!");
            window.location.href = "?page=jurnal_ma";
        </script>
<?php
    }
}

?>