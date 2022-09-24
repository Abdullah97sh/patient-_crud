<?php require 'connection.php'; ?>

<?php
$id = $_GET['id'];
echo $id;

$query = "DELETE FROM patients WHERE id=$id";
$conn->exec($query);

# for redirect use header()
header('location:index.php');

?>