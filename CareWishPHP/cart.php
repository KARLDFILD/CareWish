<?php
session_start();
require('connection_bd.php');
if (!isset($_SESSION["id"])) {
    session_destroy(); 
    
    exit();
}

$user_id = $_SESSION["id"];
$sql = "SELECT Goods.id, Goods.name_g, Goods.price, Goods.img_g FROM Goods
        JOIN orders ON Goods.id = orders.id_product
        WHERE orders.user_id = $user_id";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Ошибка выполнения запроса: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Ysabeau:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Корзина</title>
</head>

<body>

    <?php
    include("header.php");
    ?>

    <div class="cart-container">
        <h1 class="basket">Ваша корзина</h1>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <div class="cart-item" data-product-id="<?php echo $row['id']; ?>">
            <div><img src="<?php echo $row['img_g']; ?>" alt="<?php echo $row['name_g']; ?>"></div>
            <div>
                <p><?php echo $row['name_g']; ?></p>
                <p>Цена: <?php echo $row['price']; ?> USD</p>
                <button class="remove-from-cart-btn">Удалить</button>
            </div>
        </div>
        <?php
        }
        ?>
    </div>

    <?php
    mysqli_close($conn);
    ?>
    <script src="./js/script.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
    $(document).ready(function() {
        $('.remove-from-cart-btn').click(function() {
            var productId = $(this).closest('.cart-item').data('product-id');
            var cartItem = $(this).closest('.cart-item');

            $.ajax({
                type: 'POST',
                url: 'remove_from_cart.php',
                data: {
                    product_id: productId
                },
                success: function(response) {
                    if (response === 'success') {

                        cartItem
                            .remove();

                        Toastify({
                            text: 'Товар успешно удален из корзины!',
                            duration: 3000,
                            gravity: 'top',
                            position: 'right',
                            backgroundColor: '#0b721c',
                            offset: {
                                x: 0,
                                y: 40
                            },
                            style: {
                                'position': 'fixed',
                                'top': '0',
                                'right': '0',
                                'width': '280px',
                                'height': '50px',
                                'font-size': '16px',
                                'color': 'white',
                                'display': 'flex',
                                'justify-content': 'center',
                                'border-radius': '2px',
                                'align-items': 'center',
                                'margin-right': '30px',
                                'transition': 'opacity 0.3s ease'
                            }
                        }).showToast();
                    } else {
                        Toastify({
                            text: 'Произошла ошибка при удалении товара из корзины.',
                            duration: 3000,
                            gravity: 'top',
                            position: 'right',
                            backgroundColor: '#0b721c',
                            offset: {
                                x: 0,
                                y: 40
                            }
                        }).showToast();
                    }
                },
                error: function(xhr, status, error) {
                    Toastify({
                        text: 'Произошла ошибка при удалении товара из корзины.',
                        duration: 3000,
                        gravity: 'top',
                        position: 'right',
                        backgroundColor: '#0b721c',
                        offset: {
                            x: 0,
                            y: 40
                        }
                    }).showToast();

                    console.log(error);
                }
            });
        });
    });
    </script>

</body>

</html>