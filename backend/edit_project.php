<?php
include 'database.php';
$id = $_GET['id'];

// Ambil data untuk diedit
$sql = "SELECT * FROM project WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_project = $_POST['nama_project'];
    $keterangan = $_POST['keterangan'];
    $link = $_POST['link'];

    // Cek jika ada gambar baru yang diupload
    if ($_FILES['image']['name'] != '') {
        $image = $_FILES['image']['name'];
        $target_dir = "assets/images/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    } else {
        // Jika gambar tidak diubah, biarkan gambar lama
        $image = $row['image'];
    }

    $sql = "UPDATE project SET nama_project='$nama_project', keterangan='$keterangan', image='$image', link='$link' WHERE id='$id'";
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
    <title>Edit Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Proyek</h1>
        <form action="edit_project.php?id=<?= $row['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_project" class="form-label">Nama Proyek</label>
                <input type="text" class="form-control" id="nama_project" name="nama_project" value="<?= $row['nama_project'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" required><?= $row['keterangan'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="url" class="form-control" id="link" name="link" value="<?= $row['link'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="assets/images/<?= $row['image'] ?>" width="100" class="mt-2">
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
        <a href="index_project.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</body>
</html>

<?php $conn->close(); ?>