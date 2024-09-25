<?php
include 'config.php';

$id = $_GET['id'];
$mysqli->query("DELETE FROM mata_kuliah WHERE id = $id");

header("Location: index.php");
exit();
?>