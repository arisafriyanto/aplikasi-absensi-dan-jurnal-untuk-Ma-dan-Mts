<!-- USER DATA-->
<div class="card col-md-12">
    <h3 class="title-3 m-b-30 ml-3 mt-4 mb-4">
        <i class="fas fa-print"></i>Print Jurnal Ma
    </h3>

    <div class="card">
        <div class="card-header">
            <strong>Print Jurnal</strong>
        </div>
        <div class="card-body card-block">
            <form action="../../report/cetak_jurnal_ma.php" method="post" enctype="multipart/form-data" target="_blank">

                <div class="row form-group">
                    <div class="col col-md-6">
                        <label for="tanggal_awal" class=" form-control-label">
                            Dari Tanggal
                        </label>
                        <input type="date" name="tanggal_awal" class="form-control" id="tanggal_awal" required>
                    </div>

                    <div class="col col-md-6">
                        <label for="tanggal_akhir" class=" form-control-label">
                            Sampai Tanggal
                        </label>
                        <input type="date" name="tanggal_akhir" class="form-control" id="tanggal_akhir" required>
                    </div>
                </div>

        </div>

        <div class="card-footer">

            <input type="submit" class="btn btn-success btn-sm" name="print_ma_jurnal" value="Print Jurnal">

        </div>

        </form>
    </div>
</div>