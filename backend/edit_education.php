<?php
include 'database.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pendidikan = $_POST['pendidikan'];
    $tahun = $_POST['tahun'];
    $nama_sekolah = $_POST['nama_sekolah'];

    $sql = "UPDATE education SET pendidikan = '$pendidikan', tahun = '$tahun', nama_sekolah = '$nama_sekolah' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: index_education.php');
    } else {
        echo "Error: " . $conn->error;
    }
}

$sql = "SELECT * FROM education WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pendidikan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Pendidikan</h1>
        <form action="edit_education.php?id=<?= $row['id'] ?>" method="POST">
            <div class="mb-3">
                <label for="pendidikan" class="form-label">Pendidikan</label>
                <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $row['pendidikan'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" value="<?= $row['tahun'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_sekolah" class="form-label">Nama Sekolah/Kampus</label>
                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="<?= $row['nama_sekolah'] ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
        <a href="index_education.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</body>
</html>

<?php $conn->close(); ?>