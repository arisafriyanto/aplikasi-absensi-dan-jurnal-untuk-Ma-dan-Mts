<!-- USER DATA-->
<?php

if (!isset($_GET['id'])) {
    header("location: ?page=data_guru");
}

$id = $_GET['id'];

$sql = mysqli_query($conn, "select * from data_guru where id= " . $id);

if (mysqli_num_rows($sql) < 1) {
    header("location: ?page=data_guru");
}


$data = mysqli_fetch_assoc($sql);

$guruma = $data['guru_ma'];
$pecahguruma = explode("_", $guruma);
$gabungguruma = implode(" ", $pecahguruma);

$gurumts = $data['guru_mts'];
$pecahgurumts = explode("_", $gurumts);
$gabunggurumts = implode(" ", $pecahgurumts);

$gurumagurumts = $gabungguruma . " Dan " . $gabunggurumts;

$gabung2 = $guruma . '_' . $gurumts;

?>
<div class="card col-md-12">
    <h3 class="title-3 m-b-30 ml-3 mt-4 mb-4">
        <i class="fas fa-refresh"></i>Edit Data Guru
    </h3>

    <div class="card">
        <div class="card-header">
            <strong>Edit Data</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                <input type="hidden" name="foto_lama" value="<?= $data['foto']; ?>">

                <div class="row form-group">
                    <div class="col col-md-6">
                        <label for="nama" class=" form-control-label">Nama</label>
                        <input type="text" placeholder="nama" name="nama" class="form-control" id="nama" value="<?= $data['nama'] ?>" required>
                    </div>

                    <div class="col col-md-6">
                        <label for="no_pegawai" class=" form-control-label">Nomor Pegawai</label>
                        <input type="number" placeholder="nomor pegawai" name="nomor_pegawai" class="form-control" id="no_pegawai" value="<?= $data['nomor_pegawai'] ?>" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-6">
                        <label for="username" class=" form-control-label">Username</label>
                        <input type="text" placeholder="username" name="username" class="form-control" id="username" value="<?= $data['username'] ?>" required>
                    </div>

                    <div class="col col-md-6">
                        <label for="password" class=" form-control-label">Password</label>
                        <input type="text" placeholder="password" name="password" class="form-control" id="password" value="<?= $data['password'] ?>" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-6">
                        <label for="jabatan" class=" form-control-label">Jabatan</label>
                        <input type="text" value="<?= $data['jabatan'] ?>" name="jabatan" class="form-control" id="jabatan">
                    </div>

                    <div class="col col-md-6">
                        <label for="tunjab" class=" form-control-label">Tunjab</label>
                        <input type="number" value="<?= $data['tunjab'] ?>" name="tunjab" class="form-control" id="tunjab">
                    </div>
                </div>

                <div class="form-group">
                    <label for="kategorie_guru" class="form-control-label">
                        Kategori Guru
                    </label>

                    <?php if ($data['guru_ma'] == "Guru_Ma" && $data['guru_mts'] == "Guru_Mts") { ?>

                        <select name="kategorie_guru" id="kategorie_guru" class="form-control" disabled>
                            <option value="<?= $gabung2 ?>"><?= $gurumagurumts ?></option>
                            <option value="Guru_Ma">Guru Ma</option>
                            <option value="Guru_Mts">Guru Mts</option>
                            <option value="Guru_Ma_Guru_Mts">Guru Ma Dan Guru Mts</option>
                        </select>

                    <?php } else if ($data['guru_ma'] == "Guru_Ma") { ?>

                        <select name="kategorie_guru" id="kategorie_guru" class="form-control" disabled>
                            <option value="<?= $guruma ?>"><?= $gabungguruma ?></option>
                            <option value="Guru_Ma">Guru Ma</option>
                            <option value="Guru_Mts">Guru Mts</option>
                            <option value="Guru_Ma_Guru_Mts">Guru Ma Dan Guru Mts</option>
                        </select>

                    <?php } else if ($data['guru_mts'] == "Guru_Mts") { ?>

                        <select name="kategorie_guru" id="kategorie_guru" class="form-control" disabled>
                            <option value="<?= $gurumts ?>"><?= $gabunggurumts ?></option>
                            <option value="Guru_Ma">Guru Ma</option>
                            <option value="Guru_Mts">Guru Mts</option>
                            <option value="Guru_Ma_Guru_Mts">Guru Ma Dan Guru Mts</option>
                        </select>

                    <?php } ?>

                </div>


                <div class="form-group">
                    <label for="foto" class=" form-control-label">Foto</label>
                    <input type="file" id="foto" name="foto" class="form-control"><br>
                    <center>
                        <img width="100px" src="../../assets/images/guru/<?= $data['foto'] ?>"><br>
                    </center>
                </div>

        </div>

        <div class=" card-footer">
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


    $tunjab = $_POST['tunjab'];
    if (empty($tunjab)) {
        $tunjab = 0;
    }

    $nama = htmlspecialchars($_POST['nama']);
    $nomor_pegawai = htmlspecialchars($_POST['nomor_pegawai']);
    $jabatan = $_POST['jabatan'];
    $username = strtolower(stripcslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $kategorie_guru = htmlspecialchars($_POST['kategorie_guru']);
    $foto_lama = $_POST['foto_lama'];


    if ($_FILES['foto']['error'] === 4) {
        $foto = $foto_lama;
    } else {
        $foto = upload();
        unlink("../../assets/images/guru/" . $foto_lama);
    }

    $update = mysqli_query($conn, "UPDATE data_guru SET nama='$nama', nomor_pegawai='$nomor_pegawai', username='$username', password='$password', jabatan='$jabatan', tunjab='$tunjab', foto='$foto' WHERE id= " . $id);


    $update = mysqli_query($conn, "update jurnal_ma set nama='$nama' where id='$id'");
    $update = mysqli_query($conn, "update absen_ma set nama='$nama', jabatan='$jabatan', tunjab='$tunjab' where id='$id'");


    $update = mysqli_query($conn, "update jurnal_mts set nama='$nama' where id='$id'");
    $update = mysqli_query($conn, "update absen_mts set nama='$nama', jabatan='$jabatan', tunjab='$tunjab' where id='$id'");


    if ($update) {
?>
        <script type="text/javascript">
            alert("Data Guru Berhasil Diedit...!!!");
            window.location.href = "?page=data_guru";
        </script>
<?php
    }
}

?>