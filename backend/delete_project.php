<?php
include 'database.php';
$id = $_GET['id'];

// Hapus gambar jika ada
$sql = "SELECT image FROM project WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$image = $row['image'];
unlink("assets/images/$image");

// Hapus data dari database
$sql = "DELETE FROM project WHERE id = '$id'";
if ($conn->query($sql) === TRUE) {
    header('Location: index_project.php');
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>