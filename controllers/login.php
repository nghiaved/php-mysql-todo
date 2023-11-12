<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $conn = include_once("../database/connect.php");

    if (empty($username) || empty($password)) {
        $error = "Vui lòng điền đầy đủ thông tin.";
        header("Location: ../views/login.php?error=$error");
    } else {
        $sql = "SELECT id, password FROM users WHERE username = '" . $username . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $error = "Tên người dùng không chính xác.";
            header("Location: ../views/login.php?error=$error");
        } else {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                $_SESSION["username"] = $username;
                header("Location: ../index.php");
                exit();
            } else {
                $error = "Mật khẩu không chính xác.";
                header("Location: ../views/login.php?error=$error");
            }
        }
    }
}
?>