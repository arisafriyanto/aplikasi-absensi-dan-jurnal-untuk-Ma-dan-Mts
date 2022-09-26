<?php

$id = $_SESSION['id'];

?>
<div class="card col-md-12">
    <!-- USER DATA-->
    <h3 class="title-3 m-b-30 mt-3 mb-3">
        <i class="fas fa-table"></i>Absen Ma
    </h3>
    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
        <a href="?page=absen_ma&aksi=tambah" class="btn btn-sm btn-primary mb-3">
            <i class="fas fa-plus"> Tambah Data</i>
        </a>
    </div>
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
        <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th style="text-align: center;"> No</th>
                    <th style="text-align: center;"> Tanggal</th>
                    <th>Nama</th>
                    <th style="text-align: center;">Total Jam</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>


                <?php

                $no = 1;
                $sql = mysqli_query($conn, "select * from absen_ma where id='$id' and guru_ma='Guru_Ma' order by tanggal desc");

                while ($data = mysqli_fetch_assoc($sql)) {


                ?>

                    <tr>
                        <td style="text-align: center;"><?= $no++; ?>.</td>
                        <td style="text-align: center;"><?= date('d F Y', strtotime($data['tanggal'])) ?></td>
                        <td><?= ucwords($data['nama']) ?></td>
                        <td style="text-align: center;"><?= $data['total_jam'] ?></td>
                        <td style="text-align: center;">

                            <a href="?page=absen_ma&aksi=edit&id_absen=<?= $data['id_absen']; ?>" class="btn btn-sm btn-success">
                                <i class="fas fa-refresh"> Edit</i>
                            </a>

                            <a onclick="return confirm('Apakah Yakin Ingin Menghapus Data Jurnal...???')" href="?page=absen_ma&aksi=hapus&id_absen=<?= $data['id_absen']; ?>" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"> Hapus</i>
                            </a>

                        </td>
                    </tr>

                <?php

                }

                ?>

            </tbody>
        </table>
    </div>
</div>
<!-- END DATA TABLE-->