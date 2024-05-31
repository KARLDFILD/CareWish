<?php
include('connection_bd.php');

// Обработка добавления нового товара
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_product"])) {
    $name = $_POST["name"];
    $uni_code = $_POST["uni_code"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $img = $_POST["img"];

    $sql = "INSERT INTO Goods (name_g, uni_code, price, category, img_g) 
            VALUES ('$name', '$uni_code', '$price', '$category', '$img')";

    if (mysqli_query($conn, $sql)) {
        // echo "Товар успешно добавлен.";
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
}

// Обработка редактирования товара
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_product"])) {
    $id = $_POST["edit_product"];
    $name = $_POST["name_g"];
    $uni_code = $_POST["uni_code"];
    $price = $_POST["price"];

    $categoryMappings = [
        'yeycosmetics' => 1,
        'lipscosmetics' => 2,
        'facecosmetics' => 3,
        'bodycosmetics' => 4,
    ];

    $category = $categoryMappings[$_POST["category"]] ?? 1;

    $sql = "UPDATE Goods 
            SET name_g = '$name', uni_code = '$uni_code', price = '$price', category = '$category' 
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // echo "Товар успешно обновлен.";
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
}


// Обработка удаления товара
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_product"])) {
    $id = $_POST["delete_product"];

    $sql = "DELETE FROM Goods WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // echo "Товар успешно удален.";
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
}

$sql = "SELECT g.id, g.name_g, g.uni_code, g.price, c.name_cat AS category, g.img_g 
        FROM Goods g
        LEFT JOIN category c ON g.category = c.id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Ошибка выполнения запроса: " . mysqli_error($conn));
}


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
    <title>Admin Panel</title>
</head>

<body>

    <?php include("header.php"); ?>

    <div class="admin-panel-container">
        <h1 class="admin">Admin Panel - Products</h1>
        <div class="adminLinks">
            <a class="adminLink" href="admin_panel.php">Products</a>
            <a class="adminLink" href="news_admin_panel.php">News</a>
        </div>
        <form method="post" action="admin_panel.php">
            <h2 class="subtitle">Add New Product</h2>
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <label for="uni_code">Uni Code:</label>
            <input type="text" name="uni_code" required>
            <label for="price">Price:</label>
            <input type="number" name="price" required>
            <label for="category">Category:</label>
            <input type="text" name="category" required>
            <label for="img">Image URL:</label>
            <input type="text" name="img" required>
            <button type="submit" class="admin-button" name="add_product">Add Product</button>
        </form>

        <h2 class="subtitle">Current Products</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Uni Code</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td class='editable' data-field='name_g' data-id='{$row['id']}'>{$row['name_g']}</td>";
                echo "<td class='editable' data-field='uni_code' data-id='{$row['id']}'>{$row['uni_code']}</td>";
                echo "<td class='editable' data-field='price' data-id='{$row['id']}'>{$row['price']}</td>";
                echo "<td class='editable' data-field='category' data-id='{$row['id']}'>{$row['category']}</td>";
                echo "<td><img src='{$row['img_g']}' alt='{$row['name_g']}' style='width: 50px; height: 50px;'></td>";
                echo "<td>
                        <button class='admin-button edit-button' data-id='{$row['id']}'>Edit</button>
                        <form method='post' action='admin_panel.php'>
                            <input type='hidden' name='delete_product' value='{$row['id']}'>
                            <button class='admin-button' type='submit'>Delete</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <script>
    const editButtons = document.querySelectorAll('.edit-button');

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const editableFields = document.querySelectorAll(`.editable[data-id='${id}']`);

            editableFields.forEach(field => {
                const value = field.innerText;

                const input = document.createElement('input');
                input.setAttribute('type', 'text');
                input.setAttribute('name', field.getAttribute('data-field'));
                input.value = value;

                field.innerHTML = '';
                field.appendChild(input);
            });

            this.innerText = 'Save';
            this.removeEventListener('click', arguments.callee);

            this.addEventListener('click', function() {
                // Change the form submission method to use the traditional form submission
                const form = document.createElement('form');
                form.setAttribute('method', 'POST');
                form.setAttribute('action', 'admin_panel.php');
                form.style.display = 'none';

                editableFields.forEach(field => {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'text');
                    input.setAttribute('name', field.getAttribute('data-field'));
                    input.value = field.querySelector('input').value;
                    form.appendChild(input);
                });

                const idInput = document.createElement('input');
                idInput.setAttribute('type', 'hidden');
                idInput.setAttribute('name', 'edit_product');
                idInput.value = id;
                form.appendChild(idInput);

                document.body.appendChild(form);
                form.submit();
            });
        });
    });
    </script>


    <script src="./js/script.js"></script>
</body>

</html>

<?php
mysqli_close($conn);
?>