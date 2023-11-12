<?php
$id = $_GET['id'];

$conn = include_once("../database/connect.php");

$sql = "DELETE FROM todos WHERE id = $id";
mysqli_query($conn, $sql);

header('Location: ../index.php');
?>