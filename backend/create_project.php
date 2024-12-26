<?php
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_project = $_POST['nama_project'];
    $keterangan = $_POST['keterangan'];
    $image = $_FILES['image']['name'];
    $link = $_POST['link'];
    $target_dir = "assets/images/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    $sql = "INSERT INTO project (nama_project, keterangan, image, link) VALUES ('$nama_project', '$keterangan', '$image', '$link')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index_project.php');
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
    <title>Tambah Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Project</h1>
        <form action="create_project.php" method="POST">
            <div class="mb-3">
                <label for="nama_project" class="form-label">Nama Project</label>
                <input type="text" class="form-control" id="nama_project" name="nama_project" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">gambar</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link project</label>
                <input type="text" class="form-control" id="link" name="link" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <a href="index_project.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</body>
</html>

<?php $conn->close(); ?>