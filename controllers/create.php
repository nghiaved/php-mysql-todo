<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  session_start();
  $content = $_POST['content'];
  $author = $_SESSION["username"];

  $conn = include_once("../database/connect.php");

  $sql = "INSERT INTO todos (content, author) VALUES ('$content', '$author')";
  mysqli_query($conn, $sql);

  header('Location: ../index.php');
}
?>