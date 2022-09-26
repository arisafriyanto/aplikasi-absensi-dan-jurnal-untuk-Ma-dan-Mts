<!-- USER DATA-->
<div class="card col-md-12">
    <h3 class="title-3 m-b-30 ml-3 mt-4 mb-4">
        <i class="fas fa-plus"></i>Tambah Data Guru
    </h3>

    <div class="card">
        <div class="card-header">
            <strong>Tambah Data</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="row form-group">
                    <div class="col col-md-6">
                        <label for="nama" class=" form-control-label">Nama</label>
                        <input type="text" placeholder="nama" name="nama" class="form-control" id="nama" required>
                    </div>

                    <div class="col col-md-6">
                        <label for="tunjab" class=" form-control-label">Nomor Pegawai</label>
                        <input type="number" placeholder="nomor pegawai" name="nomor_pegawai" class="form-control" id="tunjab" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-6">
                        <label for="username" class=" form-control-label">Username</label>
                        <input type="text" placeholder="username" name="username" class="form-control" id="username" required>
                    </div>

                    <div class="col col-md-6">
                        <label for="password" class=" form-control-label">Password</label>
                        <input type="password" placeholder="password" name="password" class="form-control" id="password" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-6">
                        <label for="jabatan" class=" form-control-label">Jabatan</label>
                        <input type="text" placeholder="jabatan" name="jabatan" class="form-control" id="jabatan">
                    </div>

                    <div class="col col-md-6">
                        <label for="tunjab" class=" form-control-label">Tunjab</label>
                        <input type="number" placeholder="tunjab" name="tunjab" class="form-control" id="tunjab">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-6">
                        <label for="foto" class=" form-control-label">Foto</label>
                        <input type="file" id="foto" name="foto" class="form-control" required>
                    </div>

                    <div class="col col-md-6">
                        <label for="kategorie_guru" class="form-control-label">
                            Kategori Guru
                        </label>
                        <select name="kategorie_guru" id="kategorie_guru" class="form-control">
                            <option value="Guru_Ma">Guru Ma</option>
                            <option value="Guru_Mts">Guru Mts</option>
                            <option value="Guru_Ma_Guru_Mts">Guru Ma Dan Mts</option>
                        </select>
                    </div>
                </div>

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

    $pecah = explode("_", $kategorie_guru);
    $guruma1 = $pecah[0];
    $guruma2 = $pecah[1];
    $guru_ma = $guruma1 . "_" . $guruma2;

    $gurumts1 = $pecah[2];
    $gurumts2 = $pecah[3];
    $guru_mts = $gurumts1 . "_" . $gurumts2;


    //upload gambar
    $foto = upload();
    if (!$foto) {
        return false;
    } else {

        if ($kategorie_guru == "Guru_Ma_Guru_Mts") {

            $sql = mysqli_query($conn, "INSERT INTO data_guru (nama, nomor_pegawai, username, password, jabatan, tunjab, foto, guru_ma, guru_mts) VALUES ('$nama', '$nomor_pegawai', '$username', '$password', '$jabatan', '$tunjab', '$foto', '$guru_ma', '$guru_mts')");
        } else if ($kategorie_guru == "Guru_Ma") {
            $sql = mysqli_query($conn, "INSERT INTO data_guru (nama, nomor_pegawai, username, password, jabatan, tunjab, foto, guru_ma, guru_mts) VALUES ('$nama', '$nomor_pegawai', '$username', '$password', '$jabatan', '$tunjab', '$foto', '$kategorie_guru', '')");
        } else if ($kategorie_guru == "Guru_Mts") {
            $sql = mysqli_query($conn, "INSERT INTO data_guru (nama, nomor_pegawai, username, password, jabatan, tunjab, foto, guru_ma, guru_mts) VALUES ('$nama', '$nomor_pegawai', '$username', '$password', '$jabatan', '$tunjab', '$foto', '', '$kategorie_guru')");
        }

        if ($sql) {
?>
            <script type="text/javascript">
                alert("Data Guru Berhasil Ditambah...!!!");
                window.location.href = "?page=data_guru";
            </script>
<?php
        }
    }
}

?>