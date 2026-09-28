<?php
// identitas.php (Modifikasi Tingkat Lanjut)

interface Identitas
{
    public function ringkasan(): string;
}

interface EvaluasiAkademik
{
    public function getPredikat(): string;
}

abstract class CivitasAkademik implements Identitas
{
    public function __construct(
        protected string $id,
        protected string $nama
    ) {}

    abstract public function getPeran(): string;

    public function ringkasan(): string
    {
        return "[{$this->getPeran()}] {$this->id} - {$this->nama}";
    }
}

class Mahasiswa extends CivitasAkademik implements EvaluasiAkademik
{
    public function __construct(
        string $nim,
        string $nama,
        protected float $ipk
    ) {
        parent::__construct($nim, $nama);
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('Rentang nilai IPK tidak valid (harus 0.0 - 4.0).');
        }
        $this->ipk = $ipk;
    }

    public function getPeran(): string
    {
        return "Mahasiswa";
    }

    public function getPredikat(): string
    {
        if ($this->ipk >= 3.75) return "Cum Laude";
        if ($this->ipk >= 3.00) return "Sangat Memuaskan";
        return "Memuaskan";
    }

    public function ringkasan(): string
    {
        return parent::ringkasan() . " | IPK: {$this->ipk} ({$this->getPredikat()})";
    }
}

class Dosen extends CivitasAkademik
{
    public function __construct(
        string $nidn,
        string $nama,
        private string $bidangKeahlian
    ) {
        parent::__construct($nidn, $nama);
    }

    public function getPeran(): string
    {
        return "Dosen Pengajar";
    }

    public function ringkasan(): string
    {
        return parent::ringkasan() . " | Bidang: {$this->bidangKeahlian}";
    }
}

// Simulasi Polimorfisme
$civitasList = [
    new Mahasiswa('4524210003', 'Abdurrahman', 3.82),
    new Dosen('00112233', 'Dr. Ir. Hendra', 'Rekayasa Perangkat Lunak')
];

echo "<h3>Daftar Civitas Akademika:</h3>";
foreach ($civitasList as $anggota) {
    echo $anggota->ringkasan() . "<br>";
}