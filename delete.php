<?php
require_once 'config/database.php';
 
// TODO: Validasi ID dari GET
$id = $_GET['id'] ?? '';

if (empty($id)) {
    header("Location: index.php?error=ID tidak ditemukan");
    exit;
}

// TODO: Cek keberadaan data
$cek = $conn->prepare("SELECT id_kategori FROM kategori WHERE id_kategori = ?");
$cek->bind_param("i", $id);
$cek->execute();
$result = $cek->get_result();

if ($result->num_rows == 0) {
    header("Location: index.php?error=Data tidak ditemukan");
    exit;
}

// TODO: Delete data
$delete = $conn->prepare("DELETE FROM kategori WHERE id_kategori = ?");
$delete->bind_param("i", $id);
$delete->execute();

// TODO: Redirect dengan pesan
if ($delete->affected_rows > 0) {
    header("Location: index.php?success=Data berhasil dihapus");
} else {
    header("Location: index.php?error=Gagal menghapus data");
}
exit;
?>