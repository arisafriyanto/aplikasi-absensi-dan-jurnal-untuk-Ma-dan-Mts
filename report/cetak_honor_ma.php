<?php

require_once "../functions.php";


$no = 1;
$tgl_awal = $_POST['tanggal_awal'];
$tgl_akhir = $_POST['tanggal_akhir'];
$tgl_sql = date('m', strtotime($tgl_awal));

if (isset($_POST['print_ma_honor']) != "") {
    // SELECT  id_pelanggan,
    //     SUM(IF( YEAR(tgl_byr) = 2016, jml_byr, 0)) AS jml_2016,
    //     SUM(IF( YEAR(tgl_byr) = 2015, jml_byr, 0)) AS jml_2015,
    //     SUM(jml_byr) AS TOTAL
    // FROM penjualan
    // GROUP BY id_pelanggan

    $tampil = mysqli_query($conn, "select id, nama, jabatan, tunjab, total_jam, sum(if(month(tanggal) = " . $tgl_sql . ", total_jam, 0)) as total_jam_s from absen_ma where tanggal between '$tgl_awal' and '$tgl_akhir' group by id ");
}

$tgl_judul = date('F', strtotime($tgl_awal));
$thn_judul = date('Y', strtotime($tgl_awal));

$content = "

            <style>
                .table {
                    border-collapse::collapse;                    
                }
                .table th{
                    padding: 8px 5px;
                }
                .table td{
                    padding: 3px;
                }
                img {
                    width: 50px;
                }
            </style>

            ";

$content .= "

            <page>
            <div style='padding: 20px 0 10px 0; text-align: center; font-size:18px;'>
                DAFTAR PENERIMAAN HONORARIUM PENDIDIK DAN TENAGA KEPENDIDIKAN<br>
                BULAN " . strtoupper($tgl_judul) . " TAHUN " . $thn_judul . "
            </div>
                <P>
                    NAMA MADRASAH : MA BANI MA'MUN ASSALAMI<br>
                    KECAMATAN     : KIBIN</P>
                <table border='1px' cellpadding='0' cellspacing='0' class='table'>
                    <tr align='center'>
                        <th>NO.</th>
                        <th align='left'>NAMA</th>
                        <th>JABATAN</th>
                        <th>TUNJAB</th>
                        <th>TOTAL JTM</th>
                        <th>JTM YG DIBAYAR</th>
                        <th>VOLUME<br>(minggu)</th>
                        <th>VOLUME<br>(bulan)</th>
                        <th>HONOR<br>PERJAM</th>
                        <th>TOTAL HONOR<br>(Rp.)</th>
                        <th colspan='2'>TANDA TANGAN</th>
                    </tr>";

$ttd = 1;
while ($data = mysqli_fetch_assoc($tampil)) {

    $honor_perjam = 5000;
    $total_jam_semua = $data['total_jam_s'];
    $tunjab = $data['tunjab'];

    $grande[] = $data['total_jam_s'] * $honor_perjam + $data['tunjab'];
    $total_honorer = $data['total_jam_s'] * $honor_perjam + $data['tunjab'];



    $content .= '
                                        <tr align="center">
                                            <td>' . $no++ . '.</td>
                                            <td align="left" width="200">' . ucwords($data['nama']) . '</td>
                                            <td width="180">' . ucwords($data['jabatan']) . '</td>
                                            <td>' . number_format($tunjab) . '</td>
                                            <td>' . $total_jam_semua . '</td>
                                            <td>' . $total_jam_semua . '</td>
                                            <td>4</td>
                                            <td>1</td>
                                            <td>' . number_format($honor_perjam) . '</td>
                                            <td>' . number_format($total_honorer) . '</td>
                                            <td rowspan="2" align="left" style="font-size:10px" width="65">' . $ttd++ . '</td>
                                        </tr>
                                    ';
}

$content .= "   


<tr>
    <td colspan='9' align='center'>Jumlah</td>
    <td align='center'>Rp." . number_format(array_sum($grande)) . "</td>
</tr>
                </table><br>
                
                <div>
                <p  style='text-align: left; font-size:13px;'>
                Mengetahui<br>
                Kepala Madrasah,
                    <p  style=' padding-left: 800px; text-align: left; font-size:14px;'>Kibin,................................" . date("Y") . "<br>
                    Lunas Dibayar,  " . date("F Y") . " <br>
                    Bendahara,</p>
                        SARJONO, S.Md<br><br><br>
                        <p  style=' padding-left: 800px; text-align: left; font-size:14px;'>HULAEFI
                        </p>
                        </p>
                </div>

                

            </page>

            ";




require __DIR__ . '/../assets/html2pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('L', 'F4', 'en');
$html2pdf->writeHTML($content);
$html2pdf->output('jurnal_ma.pdf');
