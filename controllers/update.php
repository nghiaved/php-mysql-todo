<?php
$content = $_POST['content'];

$id = $_GET['id'];

$conn = include_once("../database/connect.php");
$sql = "UPDATE todos SET content = '$content' WHERE id = $id";
mysqli_query($conn, $sql);

header('Location: ../index.php');
?>