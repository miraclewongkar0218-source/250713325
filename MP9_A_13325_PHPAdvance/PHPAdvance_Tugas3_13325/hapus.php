<?php
    require 'koneksi.php';
    $id = $_GET['id'] ?? '';

    if (!ctype_digit($id) || $id === '') {
        echo 'ID tidak valid.';
    exit;
    }

    $stmt = mysqli_prepare($conn, 'DELETE FROM mahasiswa WHERE id = ?');

    mysqli_stmt_bind_param($stmt, 'i', $id);

    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo 'Data berhasil dihapus.';
    } else {
        echo 'Data tidak ditemukan.';
    }

    echo '<br><a href="index.php">Kembali</a>';
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>