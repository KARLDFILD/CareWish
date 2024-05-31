<?php
session_start();
include('connection_bd.php');

if (isset($_POST['product_id']) && isset($_SESSION['id'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['id'];

    $sql = "INSERT INTO orders (user_id, id_product) VALUES ('$user_id', '$product_id')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Товар успешно добавлен в корзину.";
    } else {
        echo "Ошибка при добавлении товара в корзину: " . mysqli_error($conn);
    }
} else {
    echo "Некорректные данные для добавления в корзину.";
}

mysqli_close($conn);
?>