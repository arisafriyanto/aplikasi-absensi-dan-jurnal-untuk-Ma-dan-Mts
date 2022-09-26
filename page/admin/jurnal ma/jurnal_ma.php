<div class="card col-md-12">
    <!-- USER DATA-->
    <h3 class="title-3 m-b-30 mt-3 mb-3">
        <i class="fas fa-table"></i>Jurnal Ma
    </h3>
    <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
        <a href="?page=print_jurnal_ma&aksi=jurnal_ma_print" class="btn btn-sm btn-success mb-3">
            <i class="fas fa-print"> Print Jurnal</i>
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
                </tr>
            </thead>
            <tbody>


                <?php

                $no = 1;
                $sql = mysqli_query($conn, "select * from jurnal_ma order by tanggal desc");

                while ($data = mysqli_fetch_assoc($sql)) {


                ?>

                    <tr>
                        <td style="text-align: center;"><?= $no++; ?>.</td>
                        <td style="text-align: center;"><?= date('d F Y', strtotime($data['tanggal'])) ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td style="text-align: center;"><?= $data['mapel'] ?></td>
                        <td style="text-align: center;"><?= $data['status'] ?></td>
                    </tr>

                <?php

                }

                ?>

            </tbody>
        </table>
    </div>
</div>
<!-- END DATA TABLE-->