# Laporan Pemrograman Berbasis Web

### Penyusun

| Nama | NPM |
| :--- | :--- |
| Abdurrahman | 4524210003 |

---

### Tugas Pertemuan 2
### Identitas
#### Sebelum Modifikasi
![Screenshoot Sebelum](https://github.com/Abdurrahman632/prak-pbw-b-abdurrahman-4524210003/blob/cc3e39c335ce1f6dd77c819209dee170edf0b0b9/pertemuan-2/Screenshot%202026-09-28%20200238.png)
#### Setelah Modifikasi
![Screenshoot Sesudah](https://github.com/Abdurrahman632/prak-pbw-b-abdurrahman-4524210003/blob/cc3e39c335ce1f6dd77c819209dee170edf0b0b9/pertemuan-2/Screenshot%202026-09-28%20212152.png)

### Hitung
#### Sebelum Modifikasi
![Screenshoot Sesudah](https://github.com/Abdurrahman632/prak-pbw-b-abdurrahman-4524210003/blob/cc3e39c335ce1f6dd77c819209dee170edf0b0b9/pertemuan-2/Screenshot%202026-09-28%20200255.png)

#### Setelah Modifikasi
![Screenshoot Sesudah](https://github.com/Abdurrahman632/prak-pbw-b-abdurrahman-4524210003/blob/cc3e39c335ce1f6dd77c819209dee170edf0b0b9/pertemuan-2/Screenshot%202026-09-28%20212240.png)

### 5 Bagian Kode Paling Penting
1.  abstract class CivitasAkademik: Kelas abstrak yang tidak dapat diinstansiasi secara langsung; berfungsi sebagai cetak biru bersama (blueprint) yang mewajibkan seluruh class turunan mengimplementasikan method getPeran().
2.  Multiple Interface Implementation (implements Identitas, EvaluasiAkademik): Menunjukkan fleksibilitas arsitektur OOP di PHP di mana satu class dapat terikat pada beberapa kontrak interface sekaligus secara modular.   
3.  Constructor Overriding & Chaining (parent::__construct(...)): Mengarahkan parameter dasar ke konstruktor induk agar pemenuhan variabel properti dasar tetap konsisten sebelum menambahkan atribut baru milik class anak.
4.  Method Overriding Bertingkat (parent::hargaAkhir()): Class turunan ProdukFlashSale memodifikasi perhitungan parent class ProdukDiskon dengan tetap memanfaatkan perhitungan dasar sebelumnya, menghindari duplikasi formula perhitungan persentase harga.
5.  Injeksi Ketergantungan Objek (Type Hinting Polymorphism): Method tambahProduk(BisaDihitung $produk) pada class KeranjangBelanja menerima setiap objek yang memenuhi kontrak BisaDihitung tanpa perlu mengetahui class aslinya secara spesifik.

### Error, Penyebab, dan Penanganan
- Pesan Error: Fatal error: Cannot instantiate abstract class CivitasAkademik
- Penyebab: Terjadi usaha instansiasi objek langsung dari kelas abstrak menggunakan kata kunci new CivitasAkademik(...).
- Langkah Perbaikan:Mengalihkan inisialisasi hanya pada kelas-kelas konkret turunannya (seperti new Mahasiswa(...) atau new Dosen(...)), karena kelas abstrak hanya berfungsi sebagai fondasi struktur pewarisan.
