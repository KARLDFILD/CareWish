<?php
session_start();
require('connection_bd.php');

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['id'];


    $delete_query = "DELETE FROM orders WHERE user_id = $user_id AND id_product = $product_id";
    $delete_result = mysqli_query($conn, $delete_query);

    if (!$delete_result) {
        die("Ошибка выполнения запроса: " . mysqli_error($conn));
    }

    echo 'success';
} else {
    echo 'error';
}

mysqli_close($conn);
?>