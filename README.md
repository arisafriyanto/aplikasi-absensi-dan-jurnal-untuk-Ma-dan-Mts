# Aplikasi absensi dan jurnal Untuk Mts dan Ma


Aplikasi absensi dan jurnal Untuk Ma dan Mts ini dibuat dengan PHP native dan template Bootstrap, kebutuhan utama aplikasi ini 
adalah untuk mencatat daftar hadir guru mts dan ma serta mengisi jurnal dari mata pelajaran yang diajarkan dan akan mengonversi 
dari total jam mengajar dikali dengan honor perjam mengajarnya + tunjangan jabatan, sehingga aplikasi ini juga merakap honor guru.

Terdapat beberapa menu - menu utama dari aplikasi ini:
Aplikasi ini memiliki 3 hak akses yaitu admin, guru mts, guru ma.

Admin: 
- Dashboard
- Data Guru
  => Menu ini berisi CRUD management data guru yang memuat nama, nomor pegawai, username, password, jabatan, tunjangan, foto dan kategori guru.
  dan tunjangan berdasarkan jabatan. Kategori guru ada 2 yaitu guru mts dan guru ma.
- Laporan Ma
  - Menu ini berisi laporan jurnal guru ma dan mata pelajaran yang diajar dan ada action print jurnal pdf yang nanti akan memilih tanggal awal print - tanggal akhir 
    printnya disini saya menggunakan library html2pdf.
  - Menu ini berisi laporan honor guru ma dan ada action print honor pdf yang nanti akan memilih tanggal awal print - tanggal akhir 
    printnya disini saya menggunakan library html2pdf, serta akan mengonversi dari total jam mengajar dikali dengan honor perjam mengajarnya + tunjangan jabatan.
- Laporan Mts
  - Menu ini berisi laporan jurnal guru mts dan mata pelajaran yang diajar dan ada action print jurnal pdf yang nanti akan memilih tanggal awal print - tanggal akhir 
    printnya disini saya menggunakan library html2pdf.
  - Menu ini berisi laporan honor guru mts dan ada action print honor pdf yang nanti akan memilih tanggal awal print - tanggal akhir 
    printnya disini saya menggunakan library html2pdf, serta akan mengonversi dari total jam mengajar dikali dengan honor perjam mengajarnya + tunjangan jabatan.

Guru Ma
- Dashboard
- Jurnal Ma
  => Menu ini berisi CRUD management data jurnal ma yang memuat tanggal, nama guru, mapel, jam mengajar, materi kelas 10/11/12 dll.
  ketika kita menambahkan jurnal kita akan memilih jam mengajar dari 1 sampai 8.
- Absen Ma
  => Menu ini berisi CRUD management data absen ma yang memuat tanggal, nama guru, total jam mengajar.
  ketika kita menambahkan absen kita akan memilih jam mengajar dari 1 sampai 8 dan total jam mengajar, jika tanggal ini sudah absen maka kita tidak bisa absen lagi.

Guru Mts
- Dashboard
- Jurnal Mts
  => Menu ini berisi CRUD management data jurnal mts yang memuat tanggal, nama guru, mapel, jam mengajar, materi kelas 7/8/9 dll.
  ketika kita menambahkan jurnal kita akan memilih jam mengajar dari 1 sampai 8.
- Absen Mts
  => Menu ini berisi CRUD management data absen mts yang memuat tanggal, nama guru, total jam mengajar.
  ketika kita menambahkan absen kita akan memilih jam mengajar dari 1 sampai 8 dan total jam mengajar, jika tanggal ini sudah absen maka kita tidak bisa absen lagi.

Cara penggunaan aplikasi:

- clone project
- simpan di htdocs jika menggunakan xampp
- buat database dengan nama aplikasi_perpustakaan_sekolah
- import file database yang ada di folder database/aplikasi_perpustakaan_sekolah.sql
- login aplikasi untuk admin
  - username : aris
  - password : 1111
