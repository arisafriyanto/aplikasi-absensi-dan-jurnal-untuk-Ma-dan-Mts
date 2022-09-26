<?php

date_default_timezone_set("Asia/Jakarta");

// $tanggal = date('d-m-Y');
$tanggal = date("Y-m-d");

$id = $_SESSION['id'];
$sqls = mysqli_query($conn, "select * from data_guru where id=" . $id);
$data = mysqli_fetch_assoc($sqls);

$nama_lengkap = $data['nama'];

?>
<!-- USER DATA-->
<div class="card col-md-12">
    <h3 class="title-3 m-b-30 ml-3 mt-4 mb-4">
        <i class="fas fa-plus"></i>Tambah Data Absen
    </h3>

    <div class="card">
        <div class="card-header">
            <strong>Tambah Data</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post">

                <input type="hidden" name="tanggal" value="<?= $tanggal; ?>">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                <input type="hidden" name="jabatan" value="<?= $data['jabatan']; ?>">
                <input type="hidden" name="tunjab" value="<?= $data['tunjab']; ?>">

                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="nama" class=" form-control-label">Nama</label>
                        <input type="text" value="<?= $nama_lengkap; ?>" name="nama" class="form-control" id="nama" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="total_jam" class=" form-control-label">Total Jam Mengajar</label>
                        <input type="number" placeholder="total jam" name="total_jam" class="form-control" id="total_jam" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2">
                        <label class=" form-control-label">Jam Mengajar</label>
                    </div>
                    <div class="col col-md-9 ml-4">
                        <div class="form-check-inline form-check">
                            <label for="jam_1" class="form-check-label ">
                                <input type="checkbox" id="jam_1" name="jam_1" value="1" class="form-check-input"><span class="mr-3">1</span>
                            </label>
                            <label for="jam_2" class="form-check-label ">
                                <input type="checkbox" id="jam_2" name="jam_2" value="2" class="form-check-input"><span class="mr-3">2</span>
                            </label>
                            <label for="jam_3" class="form-check-label ">
                                <input type="checkbox" id="jam_3" name="jam_3" value="3" class="form-check-input"><span class="mr-3">3</span>
                            </label>
                            <label for="jam_4" class="form-check-label ">
                                <input type="checkbox" id="jam_4" name="jam_4" value="4" class="form-check-input"><span class="mr-3">4</span>
                            </label>
                            <label for="jam_5" class="form-check-label ">
                                <input type="checkbox" id="jam_5" name="jam_5" value="5" class="form-check-input"><span class="mr-3">5</span>
                            </label>
                            <label for="jam_6" class="form-check-label ">
                                <input type="checkbox" id="jam_6" name="jam_6" value="6" class="form-check-input"><span class="mr-3">6</span>
                            </label>
                            <label for="jam_7" class="form-check-label ">
                                <input type="checkbox" id="jam_7" name="jam_7" value="7" class="form-check-input"><span class="mr-3">7</span>
                            </label>
                            <label for="jam_8" class="form-check-label ">
                                <input type="checkbox" id="jam_8" name="jam_8" value="8" class="form-check-input"><span class="mr-3">8</span>
                            </label>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="guru_mts" value="Guru_Mts" id="">

        </div>

        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary btn-sm">
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

if (isset($_POST['tambah'])) {


    @$tanggal = $_POST['tanggal'];
    @$id = $_POST['id'];
    @$nama = htmlspecialchars($_POST['nama']);
    @$jabatan = $_POST['jabatan'];
    @$tunjab = $_POST['tunjab'];
    @$total_jam = $_POST['total_jam'];
    @$jam_1 = $_POST['jam_1'];
    @$jam_2 = $_POST['jam_2'];
    @$jam_3 = $_POST['jam_3'];
    @$jam_4 = $_POST['jam_4'];
    @$jam_5 = $_POST['jam_5'];
    @$jam_6 = $_POST['jam_6'];
    @$jam_7 = $_POST['jam_7'];
    @$jam_8 = $_POST['jam_8'];
    @$guru_mts = $_POST['guru_mts'];


    if ($total_jam > 8) {
        echo '
                <script type="text/javascript">
                    alert("Total jam mengajar maksimal 8 perhari...!!!");
                    window.location.href = "?page=absen_mts&aksi=tambah";
                </script>
                ';
        return false;
    }


    $sql = mysqli_query($conn, "INSERT INTO absen_mts (tanggal, id, nama, jabatan, tunjab, total_jam, jam_1, jam_2, jam_3, jam_4, jam_5, jam_6, jam_7, jam_8, guru_mts) VALUES ('$tanggal', '$id', '$nama', '$jabatan', '$tunjab', '$total_jam', '$jam_1', '$jam_2', '$jam_3', '$jam_4', '$jam_5', '$jam_6', '$jam_7', '$jam_8', '$guru_mts')");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Absen Berhasil Ditambah...!!!");
            window.location.href = "?page=absen_mts";
        </script>
<?php
    }
}

?>