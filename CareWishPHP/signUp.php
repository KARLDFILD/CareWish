<?php
include('connection_bd.php');

$name = $_POST["name"];
$email = $_POST["email"];
$pass = $_POST["pass"];

$sql_check_user = "SELECT * FROM users WHERE email='$email'";
$result_check_user = mysqli_query($conn, $sql_check_user);

if (mysqli_num_rows($result_check_user) > 0) {
    echo "Пользователь с таким именем уже зарегистрирован";
} else {
    if (strlen($pass) < 6) {
        echo "Пароль должен содержать не менее 6 символов";
    } else {
        $sql_add_user = "INSERT INTO users (name, email, pass, role) VALUES ('$name', '$email', '$pass', 'user')";
        if (mysqli_query($conn, $sql_add_user)) {
            echo "Вы успешно зарегистрировались";
            header('Location: index.php');
            exit(); 
        } else {
            echo "Ошибка: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>