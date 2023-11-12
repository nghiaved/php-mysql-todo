<?php
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
        header("Location: ../views/register.php?error=$error");
    } else {
        $sql = "SELECT id FROM users WHERE username = '" . $username . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $error = "Tên người dùng đã được sử dụng.";
            header("Location: ../views/register.php?error=$error");
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, password) VALUES ('" . $username . "', '" . $password . "')";
            $conn->query($sql);

            $success = "Bạn đã đăng ký tài khoản thàn công.";
            header("Location: ../views/register.php?success=$success");
            exit();
        }
    }
}
?>