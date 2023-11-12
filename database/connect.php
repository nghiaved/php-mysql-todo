<?php
try {
    $conn = mysqli_connect('localhost', 'root', '', 'todo');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
?>