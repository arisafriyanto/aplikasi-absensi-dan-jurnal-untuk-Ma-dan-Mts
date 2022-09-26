<div class="card col-md-12">
    <!-- USER DATA-->
    <h3 class="title-3 m-b-30 mt-3 mb-3">
        <i class="fas fa-table"></i>Data Guru
    </h3>
    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
        <a href="?page=data_guru&aksi=tambah" class="btn btn-sm btn-primary mb-3">
            <i class="fas fa-plus"> Tambah Data</i>
        </a>
    </div>
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
        <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th style="text-align: center;"> No</th>
                    <th>Nama</th>
                    <th style="text-align: center;">Nomor Pegawai</th>
                    <th style="text-align: center;">Jabatan</th>
                    <th style="text-align: center;">Foto</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>


                <?php

                $no = 1;
                $sql = mysqli_query($conn, "select * from data_guru order by nama asc");

                while ($data = mysqli_fetch_assoc($sql)) {


                ?>

                    <tr>
                        <td style="text-align: center;"><?= $no++; ?>.</td>
                        <td><?= ucwords($data['nama']) ?></td>
                        <td style="text-align: center;"><?= $data['nomor_pegawai'] ?></td>
                        <td style="text-align: center;"><?= ucwords($data['jabatan']) ?></td>
                        <td style="text-align: center;">
                            <img width="50px" src="../../assets/images/guru/<?= $data['foto']; ?>" alt="foto" />
                        </td>
                        <td style="text-align: center;">

                            <a href="?page=data_guru&aksi=edit&id=<?= $data['id']; ?>" class="btn btn-sm btn-success">
                                <i class="fas fa-refresh"> Edit</i>
                            </a>

                            <a onclick="return confirm('Apakah Yakin Ingin Menghapus Data Guru...???')" href="?page=data_guru&aksi=hapus&id=<?= $data['id']; ?>&foto=<?= $data['foto']; ?>" class="btn btn-sm btn-danger">
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