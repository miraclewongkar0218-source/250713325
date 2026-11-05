<?php

$nama = $_POST['nama'] ?? '';
$npm = $_POST['npm'] ?? '';
$paket = $_POST['paket'] ?? '';

$error = [];
$benefit = '';

echo "<h2>Pendaftaran Membership</h2>";

echo '
<form method="POST">
    <p>
        Nama :
        <input type="text" name="nama">
    </p>

    <p>
        NPM :
        <input type="text" name="npm">
    </p>

    <p>
        Paket Membership :
        <select name="paket">
            <option value="">-- Pilih Paket --</option>
            <option value="1 bulan">1 bulan</option>
            <option value="3 bulan">3 bulan</option>
        </select>
    </p>

    <button type="submit">Daftar</button>
</form>
';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($nama) || empty($npm) || empty($paket)) {
        $error[] = "Semua data wajib diisi.";
    }

    if (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $error[] = "Nama hanya boleh berisi huruf dan spasi.";
    }

    if (!preg_match("/^[0-9]+$/", $npm)) {
        $error[] = "NPM hanya boleh berisi angka.";
    }

    if ($paket == "1 bulan") {
        $benefit = "Potongan 50% untuk pembelian produk tertentu.";
    } elseif ($paket == "3 bulan") {
        $benefit = "Gratis cemilan hewan peliharaan untuk 3 bulan pertama.";
    }

    if (!empty($error)) {

        foreach ($error as $pesan) {
            echo "<p style='color:red;'>$pesan</p>";
        }

    } else {

        echo "<h3>Informasi Pendaftaran</h3>";
        echo "<p><strong>Nama :</strong> " . htmlspecialchars($nama) . "</p>";
        echo "<p><strong>NPM :</strong> " . htmlspecialchars($npm) . "</p>";
        echo "<p><strong>Paket Membership :</strong> " . htmlspecialchars($paket) . "</p>";
        echo "<p><strong>Keuntungan :</strong> " . htmlspecialchars($benefit) . "</p>";
        echo "<p>Selamat! Anda telah berhasil mendaftar sebagai member dengan benefit: "
            . htmlspecialchars($benefit) . "</p>";
    }

} else {
    echo "<p>Silahkan lengkapi formulir di atas.</p>";
}
?>