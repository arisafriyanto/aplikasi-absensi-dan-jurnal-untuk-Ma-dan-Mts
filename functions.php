<?php

$conn = mysqli_connect('localhost', 'root', '', 'banimass');


function upload()
{

    $namafile     = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error         = $_FILES['foto']['error'];
    $tmp_name     = $_FILES['foto']['tmp_name'];

    // cek apakah ada gambar yg diupload

    if ($error === 4) {
        echo "
                <script>
                    alert ('Pilih gambar terlebih dahulu');
                    window.location.href='?page=data_guru&aksi=tambah';
                </script>
            ";

        return false;
    }


    // cek apakah yg diupload gambar

    $ekstensigambarvalid = ['jpg', 'jpeg', 'png', 'jfif', 'gif'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));

    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "
                <script>
                    alert ('Yang diupload bukan gambar');
                </script>
            ";

        return false;
    }



    if ($ukuranfile > 1000000) {
        echo "
                <script>
                    alert ('Ukuran gambar terlalu besar');
                </script>
            ";

        return false;
    }

    // lolos pengecekan gambar akan diupload
    // generate nama gambar baru

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;


    move_uploaded_file($tmp_name, '../../assets/images/guru/' . $namafilebaru);

    return $namafilebaru;
}
