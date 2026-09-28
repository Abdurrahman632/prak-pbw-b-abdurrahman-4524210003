# Laporan Pemrograman Berbasis Web

### Penyusun

| Nama | NPM |
| :--- | :--- |
| Abdurrahman | 4524210003 |

---

### Tugas Pertemuan 1
### Kalkulator
Sebelum Modifikasi
![Screenshoot Sebelum](https://github.com/Abdurrahman632/prak-pbw-b-abdurrahman-4524210003/blob/59c91cb6e311867bf22e226df19f938e53101d16/pertemuan-1/Screenshot%202026-09-28%20200126.png)
Setelah Modifikasi
![Screenshoot Sesudah](https://github.com/Abdurrahman632/prak-pbw-b-abdurrahman-4524210003/blob/59c91cb6e311867bf22e226df19f938e53101d16/pertemuan-1/Screenshot%202026-09-28%20201127.png)

### Biodata
Sebelum Modifikasi
![Screenshoot Sesudah](https://github.com/Abdurrahman632/prak-pbw-b-abdurrahman-4524210003/blob/59c91cb6e311867bf22e226df19f938e53101d16/pertemuan-1/Screenshot%202026-09-28%20200201.png)
Setelah Modifikasi
![Screenshoot Sesudah](https://github.com/Abdurrahman632/prak-pbw-b-abdurrahman-4524210003/blob/59c91cb6e311867bf22e226df19f938e53101d16/pertemuan-1/Screenshot%202026-09-28%20201600.png)

### 5 Bagian Kode Paling Penting
1.  $_SERVER['REQUEST_METHOD'] === 'POST': Mengecek metode pengiriman formulir web. Logika pemrosesan perhitungan hanya dieksekusi saat form disubmit melalui metode POST, bukan saat halaman baru pertama kali diakses.
2.  (float) ($_POST['a'] ?? 0): Mengamankan masukan data menggunakan operator penggabungan null (??) dan type casting (float) agar nilai yang dihitung dipastikan bertipe angka desimal dan tidak menghasilkan error saat indeks array belum terdefinisi.
3.  switch ($operator): Struktur pemilihan alur logika komputasi berdasarkan karakter operasi hitung yang dipilih oleh pengguna di elemen select form.
4.  htmlspecialchars(): Fungsi sanitasi output untuk mengonversi karakter khusus ke entitas HTML agar terhindar dari kerentanan keamanan Cross-Site Scripting saat menampilkan data dinamis.
5.  foreach ($mahasiswa as $kunci => $nilai): Iterasi dinamis untuk membaca pasangan kunci dan nilai pada array asosiatif tanpa harus menuliskan pemanggilan variabel secara berulang satu per satu.

### Error, Penyebab, dan Penanganan
- Pesan Error: Fatal error: Uncaught DivisionByZeroError: Division by zero
- Penyebab: Terjadi pembagian bilangan dengan angka 0 saat pengguna memasukkan nilai 0 pada input variabel $b untuk operasi hitung pembagian atau modulus.
- Langkah Perbaikan: Menyisipkan percabangan if ($b == 0) sebelum eksekusi operasi aritmatika pembagian dan modulus, kemudian menyimpan pesan peringatan ke dalam variabel string $pesan agar ditampilkan ramah kepada pengguna tanpa menghentikan eksekusi script PHP secara fatal.
