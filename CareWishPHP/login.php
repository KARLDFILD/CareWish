<?php
require('connection_bd.php');

$email = $_POST["email"];
$pass = $_POST["pass"];

$sql = "SELECT * FROM users WHERE email='$email' AND pass='$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION["id"] = $row["id"];
    $_SESSION["email"] = $email;
    $_SESSION["role"] = $row["role"]; 
    header('Location: index.php');
    exit(); 
} else {
    echo "Неправильный логин или пароль";
}

mysqli_close($conn);