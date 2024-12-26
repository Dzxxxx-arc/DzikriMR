<?php
include 'database.php';
$id = $_GET['id'];

$sql = "DELETE FROM education WHERE id = '$id'";
if ($conn->query($sql) === TRUE) {
    header('Location: index_education.php');
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>