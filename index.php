<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori - UTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    require_once 'config/database.php';
    
    // query data kategori
    $query = "SELECT * FROM kategori ORDER BY id_kategori DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    // cek hasil query
    if (!$result) {
        die("Query gagal: " . $conn->error);
    }
    
    ?>
    
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Kategori Buku</h2>
            <a href="create.php" class="btn btn-primary shadow-sm">+ Tambah Kategori</a>
        </div>
        
        <?php
        // pesan sukses
        if (isset($_GET['success'])) {
            echo '<div class="alert alert-success alert-dismissible fade show">';
            echo '<i class="bi bi-check-circle"></i> ' . htmlspecialchars($_GET['success']);
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            echo '</div>';
        }

        // pesan error
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show">';
            echo '<i class="bi bi-x-circle"></i> ' . htmlspecialchars($_GET['error']);
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            echo '</div>';
        }
        ?>
        
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th width="100">Kode</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th width="100">Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // loop data
                        if ($result->num_rows > 0) {
                            $no = 1;
                            while ($row = $result->fetch_assoc()) {

                                //badge status
                                if ($row['status'] == 'Aktif') {
                                    $status = '<span class="badge bg-success">Aktif</span>';
                                } else {
                                    $status = '<span class="badge bg-danger">Nonaktif</span>';
                                }

                                // tampilkan data
                                echo "<tr>
                                        <td>$no</td>
                                        <td>{$row['kode_kategori']}</td>
                                        <td>{$row['nama_kategori']}</td>
                                        <td>{$row['deskripsi']}</td>
                                        <td>$status</td>
                                        <td>
                                            <a href='edit.php?id={$row['id_kategori']}' class='btn btn-warning btn-sm'>Edit</a>
                                            <button onclick='confirmDelete({$row['id_kategori']})' class='btn btn-danger btn-sm'>Hapus</button>
                                        </td>
                                      </tr>";
                                $no++;
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
    function confirmDelete(id) {
        if (confirm('Yakin ingin menghapus kategori ini?')) {
            window.location.href = 'delete.php?id=' + id;
        }
    }
    </script>
</body>
</html>