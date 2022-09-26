<?php

require_once "../functions.php";


$no = 1;
$tgl_awal = $_POST['tanggal_awal'];
$tgl_akhir = $_POST['tanggal_akhir'];
if (isset($_POST['print_mts_jurnal']) != "") {
    $tampil = mysqli_query($conn, "select * from jurnal_mts where tanggal between '$tgl_awal' and '$tgl_akhir' order by tanggal asc");
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
                DAFTAR JURNAL MTS SA BANI MA'MUN ASSALAMI<br>
                BULAN " . strtoupper($tgl_judul) . " TAHUN " . $thn_judul . "
            </div><br><br>

                <table border='1px' cellpadding='0' cellspacing='0' class='table'>
                    <tr>
                        <th>No.</th>
                        <th width='60' align='center'>Tanggal</th>
                        <th width='100'>Nama</th>
                        <th width='100'>Mata Pelajaran</th>
                        <th align='center'>Jam Mengajar</th>
                        <th align='center'>Status</th>
                        <th>Kelas 7 : Materi</th>
                        <th>Kelas 8 : Materi</th>
                        <th>Kelas 9 : Materi</th>
                    </tr>";


while ($data = mysqli_fetch_assoc($tampil)) {

    $content .= '
                                        <tr>
                                            <td align="center">' . $no++ . '.</td>
                                            <td  width="60" align="center">' . date('d/m/Y', strtotime($data['tanggal'])) . '</td>
                                            <td width="110">' . ucwords($data['nama']) . '</td>
                                            <td width="155">' . $data['mapel'] . '</td>
                                            <td>' .  $data['jam_1'] . ' ' .  $data['jam_2'] . ' ' .  $data['jam_3'] . ' ' .  $data['jam_4'] . ' ' .  $data['jam_5'] . ' ' .  $data['jam_6'] . ' ' .  $data['jam_7'] . ' ' .  $data['jam_8'] . '</td>
                                            <td>' . $data['status'] . '</td>
                                            <td width="180">' . $data['materi_7'] . '</td>
                                            <td width="180">' . $data['materi_8'] . '</td>
                                            <td width="180">' . $data['materi_9'] . '</td>
                                        </tr>
                                    ';
}

$content .= "       
                </table>

            </page>

            ";




require __DIR__ . '/../assets/html2pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('L', 'F4', 'en');
$html2pdf->writeHTML($content);
$html2pdf->output('jurnal_ma.pdf');
