<?php
// hitung.php (Modifikasi Tingkat Lanjut)

interface BisaDihitung
{
    public function hargaAkhir(): float;
    public function getDetail(): string;
}

abstract class ProdukBase implements BisaDihitung
{
    public function __construct(
        protected string $nama,
        protected float $harga
    ) {}

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getHargaAsli(): float
    {
        return $this->harga;
    }
}

class ProdukReguler extends ProdukBase
{
    public function hargaAkhir(): float
    {
        return $this->harga;
    }

    public function getDetail(): string
    {
        return "Harga Standar";
    }
}

class ProdukDiskon extends ProdukBase
{
    public function __construct(
        string $nama,
        float $harga,
        protected float $persenDiskon
    ) {
        parent::__construct($nama, $harga);
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 - ($this->persenDiskon / 100));
    }

    public function getDetail(): string
    {
        return "Diskon {$this->persenDiskon}%";
    }
}

class ProdukFlashSale extends ProdukDiskon
{
    public function __construct(
        string $nama,
        float $harga,
        float $persenDiskon,
        private float $potonganVoucher
    ) {
        parent::__construct($nama, $harga, $persenDiskon);
    }

    public function hargaAkhir(): float
    {
        $hargaSetelahDiskon = parent::hargaAkhir();
        return max(0, $hargaSetelahDiskon - $this->potonganVoucher);
    }

    public function getDetail(): string
    {
        return parent::getDetail() . " + Kupon Rp " . number_format($this->potonganVoucher, 0, ',', '.');
    }
}

class KeranjangBelanja
{
    /** @var BisaDihitung[] */
    private array $items = [];

    public function tambahProduk(BisaDihitung $produk): void
    {
        $this->items[] = $produk;
    }

    public function hitungGrandTotal(): float
    {
        $total = 0.0;
        foreach ($this->items as $item) {
            $total += $item->hargaAkhir();
        }
        return $total;
    }

    public function renderCheckout(): void
    {
        echo "<table border='1' cellpadding='8' style='border-collapse:collapse; font-family:sans-serif;'>";
        echo "<tr style='background:#f4f4f4;'><th>Produk</th><th>Keterangan Promo</th><th>Harga Akhir</th></tr>";
        foreach ($this->items as $item) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item->getNama()) . "</td>";
            echo "<td>" . htmlspecialchars($item->getDetail()) . "</td>";
            echo "<td>Rp " . number_format($item->hargaAkhir(), 0, ',', '.') . "</td>";
            echo "</tr>";
        }
        echo "<tr style='font-weight:bold; background:#eef2ff;'>";
        echo "<td colspan='2' align='right'>Grand Total:</td>";
        echo "<td>Rp " . number_format($this->hitungGrandTotal(), 0, ',', '.') . "</td>";
        echo "</tr>";
        echo "</table>";
    }
}

// Eksekusi Transaksi Keranjang
$keranjang = new KeranjangBelanja();
$keranjang->tambahProduk(new ProdukReguler('Mechanical Keyboard', 450000));
$keranjang->tambahProduk(new ProdukDiskon('Wireless Mouse', 200000, 15));
$keranjang->tambahProduk(new ProdukFlashSale('Gaming Headset', 600000, 20, 50000));

echo "<h2>Struk Ringkasan Transaksi Pembelian</h2>";
$keranjang->renderCheckout();