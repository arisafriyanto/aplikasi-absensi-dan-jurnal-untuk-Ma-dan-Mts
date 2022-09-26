<div class="card col-md-12">
    <!-- USER DATA-->
    <h3 class="title-3 m-b-30 mt-3 mb-3">
        <i class="fas fa-table"></i>Rekap Honor Ma
    </h3>
    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
        <a href="?page=print_honor_ma&aksi=honor_ma_print" class="btn btn-sm btn-success mb-3">
            <i class="fas fa-print"> Print Honor</i>
        </a>
    </div>
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
        <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th style="text-align: center;"> No</th>
                    <th style="text-align: center;">Tanggal</th>
                    <th>Nama</th>
                    <th style="text-align: center;">Jabatan</th>
                    <th>Jam Mengajar</th>
                </tr>
            </thead>
            <tbody>


                <?php

                $no = 1;
                $sql = mysqli_query($conn, "select * from absen_ma order by tanggal desc");



                while ($data = mysqli_fetch_assoc($sql)) {


                ?>

                    <tr>
                        <td style="text-align: center;"><?= $no++; ?>.</td>
                        <td style="text-align: center;"><?= date('d F Y', strtotime($data['tanggal'])) ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td style="text-align: center;"><?= $data['jabatan'] ?></td>
                        <td><?= $data['jam_1'] . " " . $data['jam_2'] . " " . $data['jam_3'] . " " . $data['jam_4'] . " " . $data['jam_5'] . " " . $data['jam_6'] . " " . $data['jam_7'] . " " . $data['jam_8'] ?></td>
                    </tr>

                <?php

                }

                ?>

            </tbody>
        </table>
    </div>
</div>
<!-- END DATA TABLE-->