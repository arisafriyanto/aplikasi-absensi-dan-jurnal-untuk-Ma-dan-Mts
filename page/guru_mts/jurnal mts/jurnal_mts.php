<?php


$id = $_SESSION['id'];

?>
<div class="card col-md-12">
    <!-- USER DATA-->
    <h3 class="title-3 m-b-30 mt-3 mb-3">
        <i class="fas fa-table"></i>Jurnal Mts
    </h3>
    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
        <a href="?page=jurnal_mts&aksi=tambah" class="btn btn-sm btn-primary mb-3">
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
                    <th style="text-align: center;">Mapel</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>


                <?php

                $no = 1;
                $sql = mysqli_query($conn, "select * from jurnal_mts where id='$id' and guru_mts='Guru_Mts' order by tanggal desc");

                while ($data = mysqli_fetch_assoc($sql)) {


                ?>

                    <tr>
                        <td style="text-align: center;"><?= $no++; ?>.</td>
                        <td style="text-align: center;"><?= date('d F Y', strtotime($data['tanggal'])) ?></td>
                        <td><?= ucwords($data['nama']) ?></td>
                        <td style="text-align: center;"><?= $data['mapel'] ?></td>
                        <td style="text-align: center;"><?= $data['status'] ?></td>
                        <td style="text-align: center;">

                            <a href="?page=jurnal_mts&aksi=edit&id_jurnal=<?= $data['id_jurnal']; ?>" class="btn btn-sm btn-success">
                                <i class="fas fa-refresh"> Edit</i>
                            </a>

                            <a onclick="return confirm('Apakah Yakin Ingin Menghapus Data Jurnal...???')" href="?page=jurnal_mts&aksi=hapus&id_jurnal=<?= $data['id_jurnal']; ?>" class="btn btn-sm btn-danger">
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