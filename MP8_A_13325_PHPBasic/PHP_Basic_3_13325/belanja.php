<?php

$makanan = $_POST['makanan'] ?? '';
$aksesoris = $_POST['aksesoris'] ?? '';

$error = [];

echo "<h2>Belanja</h2>";
echo "<h3>Daftar Kategori:</h3>";

echo '
<form method="POST">

    <p>
        Makanan dan Minuman :
        <select name="makanan">
            <option value="">-- Pilih --</option>
            <option value="daging kaleng">Daging Kaleng</option>
            <option value="susu">Susu</option>
        </select>
    </p>

    <p>
        Aksesoris :
        <select name="aksesoris">
            <option value="">-- Pilih --</option>
            <option value="kalung">Kalung</option>
            <option value="pakaian">Pakaian</option>
        </select>
    </p>

    <button type="submit">Beli</button>

</form>
';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($makanan) || empty($aksesoris)) {
        $error[] = "Semua pilihan harus diisi.";
    }

    if ($makanan == "daging kaleng") {
        $hargaMakanan = 10000;
    } elseif ($makanan == "susu") {
        $hargaMakanan = 15000;
    } else {
        $hargaMakanan = 0;
    }

    if ($aksesoris == "kalung") {
        $hargaAksesoris = 50000;
    } elseif ($aksesoris == "pakaian") {
        $hargaAksesoris = 100000;
    } else {
        $hargaAksesoris = 0;
    }

    if (!empty($error)) {

        foreach ($error as $pesan) {
            echo "<p style='color:red;'>$pesan</p>";
        }

    } else {

        $totalBayar = $hargaMakanan + $hargaAksesoris;

        function dapatDiskon($totalBayar)
        {
            if ($totalBayar >= 100000) {
                return 0.10;
            }
            return 0;
        }

        function totalHarga($diskon, $totalBayar)
        {
            return $totalBayar - ($totalBayar * $diskon);
        }

        $diskon = dapatDiskon($totalBayar);
        $totalHarga = totalHarga($diskon, $totalBayar);

        echo "<h3>Informasi Belanja</h3>";

        echo "<p><strong>Makanan dan Minuman :</strong> "
            . htmlspecialchars($makanan) . "</p>";

        echo "<p><strong>Aksesoris :</strong> "
            . htmlspecialchars($aksesoris) . "</p>";

        echo "<p><strong>Total Harga :</strong> Rp "
            . htmlspecialchars($totalHarga) . "</p>";

        echo "<p><strong>Diskon :</strong> "
            . htmlspecialchars($diskon) . "</p>";

        if ($diskon == 0) {
            echo "<p>Maaf tidak ada diskon yang diberikan.</p>";
        } else {
            echo "<p>Selamat! Anda mendapatkan diskon "
                . htmlspecialchars($diskon * 100)
                . "%.</p>";
        }
    }

} else {
    echo "<p>Silahkan pilih produk yang ingin dibeli.</p>";
}
?>