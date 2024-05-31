<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Ysabeau:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title>CareWish</title>
</head>

<body>

    <?php
    include("header.php");
    ?>
    <div class="CategoryTitle">Косметика для губ</div>
    <div class="store-container">

        <?php
        include('connection_bd.php');

        $category = 2;

        if ($category !== null) {
            $sql = "SELECT id, name_g, uni_code, price, category, img_g FROM Goods WHERE category = $category";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Ошибка выполнения запроса: " . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="product-card">
            <img src="<?php echo $row['img_g']; ?>" alt="<?php echo $row['name_g']; ?>">
            <h2><?php echo $row['name_g']; ?></h2>

            <form class="add-to-cart-form" method="post" action="add_to_cart.php">
                <p>Цена: <?php echo $row['price']; ?> USD</p>
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                <button type="submit">Добавить в корзину</button>
            </form>
        </div>
        <?php
            }
        } else {
            echo "Не передан параметр 'category'.";
        }
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
    $(document).ready(function() {
        $('.add-to-cart-form').submit(function(e) {
            e.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'add_to_cart.php',
                data: formData,
                success: function(response) {
                    Toastify({
                        text: 'Товар успешно добавлен в корзину!',
                        duration: 3000,
                        gravity: 'top',
                        position: 'right',
                        backgroundColor: '#0b721c',
                        offset: {
                            x: 0,
                            y: 40
                        }
                    }).showToast();
                },
                error: function(xhr, status, error) {
                    Toastify({
                        text: 'Произошла ошибка при добавлении товара в корзину.',
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