<?php
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pendidikan = $_POST['pendidikan'];
    $tahun = $_POST['tahun'];
    $nama_sekolah = $_POST['nama_sekolah'];

    $sql = "INSERT INTO education (pendidikan, tahun, nama_sekolah) VALUES ('$pendidikan', '$tahun', '$nama_sekolah')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index_education.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pendidikan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Pendidikan</h1>
        <form action="create_education.php" method="POST">
            <div class="mb-3">
                <label for="pendidikan" class="form-label">Pendidikan</label>
                <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" required>
            </div>
            <div class="mb-3">
                <label for="nama_sekolah" class="form-label">Nama Sekolah/Kampus</label>
                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <a href="index_education.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</body>
</html>

<?php $conn->close(); ?>