<?php

$hasil = null;
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = (float) ($_POST['a'] ?? 0);
    $b = (float) ($_POST['b'] ?? 0);
    $operator = $_POST['operator'] ?? '+';

    switch ($operator) {
        case '+':
            $hasil = $a + $b;
            break;
        case '-':
            $hasil = $a - $b;
            break;
        case '*':
            $hasil = $a * $b;
            break;
        case '/':
            if ($b == 0) {
                $pesan = 'Pembagian dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a / $b;
            }
            break;
        // Modifikasi: Operator Pangkat
        case '^':
            $hasil = $a ** $b;
            break;
        // Modifikasi: Operator Modulus & Validasi Nilai Nol
        case '%':
            if ($b == 0) {
                $pesan = 'Operasi modulus dengan nol tidak diperbolehkan.';
            } else {
                $hasil = fmod($a, $b);
            }
            break;
        default:
            $pesan = 'Operator tidak valid.';
    }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Kalkulator</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        .card { max-width: 320px; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        input, select, button { margin: 6px 0; width: 100%; padding: 8px; box-sizing: border-box; }
        .error { color: red; }
        .success { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Kalkulator</h2>
        <form method="post">
            <input type="number" step="any" name="a" placeholder="Angka pertama" required>
            <select name="operator">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
                <option value="^">^ (Pangkat)</option>
                <option value="%">% (Modulus)</option>
            </select>
            <input type="number" step="any" name="b" placeholder="Angka kedua" required>
            <button type="submit">Hitung</button>
        </form>

        <?php if ($pesan): ?>
            <p class="error"><?= htmlspecialchars($pesan) ?></p>
        <?php elseif ($hasil !== null): ?>
            <p class="success">Hasil: <?= htmlspecialchars((string)$hasil) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>