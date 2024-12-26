<?php
include 'database.php'; // Pastikan file ini ada dan berfungsi dengan baik
$sql = "SELECT * FROM education"; // Query untuk mengambil semua data dari tabel education
$result = $conn->query($sql); // Eksekusi query
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendidikan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Data Pendidikan</h1>
        <a href="create_education.php" class="btn btn-primary mb-3">Tambah Pendidikan</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pendidikan</th>
                    <th>Tahun</th>
                    <th>Nama Sekolah/Kampus</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): // Cek apakah ada data ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['pendidikan']) ?></td>
                        <td><?= htmlspecialchars($row['tahun']) ?></td>
                        <td><?= htmlspecialchars($row['nama_sekolah']) ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="edit_education.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_education.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data pendidikan ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); // Tutup koneksi ?>