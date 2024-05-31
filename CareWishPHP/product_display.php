<?php
    $jsonData = file_get_contents("http://web/get_products.php?category=1");    
    echo($jsonData);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CareWish</title>
</head>

<body>

    <div class="container">
        <div class="product-list">
            <form action="get_products.php" method="POST">
                <input type="text" name="category" />
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>