<?php
include 'database.php';
$sql = "SELECT * FROM project";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Data Proyek</h1>
        <a href="create_project.php" class="btn btn-primary mb-3">Tambah Proyek</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Proyek</th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['nama_project'] ?></td>
                    <td><?= $row['keterangan'] ?></td>
                    <td><img src="assets/images/<?= $row['image'] ?>" alt="Gambar" width="100"></td>
                    <td><a href="<?= $row['link'] ?>" target="_blank">Lihat Proyek</a></td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="edit_project.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_project.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); ?>