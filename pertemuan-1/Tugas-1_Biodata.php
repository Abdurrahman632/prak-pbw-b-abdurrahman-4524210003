<?php
// biodata.php (Hasil Modifikasi)
function statusKelulusan(float $ipk): string
{
    // Modifikasi: Penambahan predikat 'Dengan Pujian'
    if ($ipk >= 3.75) return 'Dengan Pujian';
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'nim' => '2026001',
    'nama' => 'Andi Pratama',
    'prodi' => 'Teknik Informatika',
    'semester' => 1,
    'ipk' => 3.75,
    // Modifikasi: Penambahan field data baru
    'email' => 'andi.pratama@kampus.ac.id',
    'status' => 'Aktif'
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Biodata</title>
</head>
<body>
    <h1>Biodata Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $kunci => $nilai): ?>
            <li><?= ucfirst($kunci) ?>: <?= htmlspecialchars((string)$nilai) ?></li>
        <?php endforeach; ?>
    </ul>
    <p>Predikat: <?= statusKelulusan($mahasiswa['ipk']) ?></p>
</body>
</html>