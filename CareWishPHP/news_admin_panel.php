<?php
include('connection_bd.php');

// Обработка добавления новой новости
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_news"])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $img_news = $_POST["img_news"];
    $description = $_POST["description"];

    $sql = "INSERT INTO news (title, content, img_news, description) 
            VALUES ('$title', '$content', '$img_news', '$description')";
    if (mysqli_query($conn, $sql)) {
        // echo "Товар успешно добавлен.";
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
}

// Обработка редактирования новости
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_news"])) {
    $id = $_POST["edit_news"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $img_news = $_POST["img_news"];
    $description = $_POST["description"];

    $sql = "UPDATE news 
            SET title = '$title', content = '$content', img_news = '$img_news', description = '$description'
            WHERE id = $id";
     if (mysqli_query($conn, $sql)) {
        // echo "Товар успешно добавленннн.";
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
}

// Обработка удаления новости
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_news"])) {
    $id = $_POST["delete_news"];
    $sql = "DELETE FROM news WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        // echo "Товар успешно добавлен.";
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
}

// Получение списка новостей
$sql_news = "SELECT id, title, content, img_news, description FROM news";
$result_news = mysqli_query($conn, $sql_news);

if (!$result_news) {
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
    <title>Admin Panel - News</title>
</head>

<body>

    <?php include("header.php"); ?>

    <div class="admin-panel-container">
        <h1 class="admin">Admin Panel - News</h1>
        <div class="adminLinks">
            <a class="adminLink" href="admin_panel.php">Products</a>
            <a class="adminLink" href="news_admin_panel.php">News</a>
        </div>

        <form method="post" action="news_admin_panel.php">
            <h2 class="subtitle">Add New News</h2>
            <label for="title">Title:</label>
            <input type="text" name="title" required>
            <label for="content">Content:</label>
            <textarea class="newsText" name="content" required></textarea>
            <label for="img_news">Image URL:</label>
            <input type="text" name="img_news" required>
            <label for="description">Description:</label>
            <textarea class="newsText" name="description" required></textarea>
            <br />
            <button type="submit" class="admin-button" name="add_news">Add News</button>
        </form>

        <h2 class="subtitle">Current News</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php
            while ($row_news = mysqli_fetch_assoc($result_news)) {
                echo "<tr>";
                echo "<td>{$row_news['id']}</td>";
                echo "<td class='editable' data-field='title' data-id='{$row_news['id']}'>{$row_news['title']}</td>";
                echo "<td class='editable' data-field='content' data-id='{$row_news['id']}'>{$row_news['content']}</td>";
                echo "<td class='editable' data-field='img_news' data-id='{$row_news['id']}'>
                      <img src='{$row_news['img_news']}' alt='{$row_news['title']}' style='width: 50px; height: 50px;'>
                      </td>";
                echo "<td class='editable' data-field='description' data-id='{$row_news['id']}'>{$row_news['description']}</td>";
                echo "<td>
                        <button class='admin-button edit-button' data-id='{$row_news['id']}'>Edit</button>
                        <form method='post' action='news_admin_panel.php'>
                            <input type='hidden' name='delete_news' value='{$row_news['id']}'>
                            <button class='admin-button' type='submit'>Delete</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <script>
    const editButtonsNews = document.querySelectorAll('.edit-button');
    editButtonsNews.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const editableFieldsNews = document.querySelectorAll(`.editable[data-id='${id}']`);

            editableFieldsNews.forEach(field => {
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
                const formDataNews = new FormData();
                editableFieldsNews.forEach(field => {
                    const input = field.querySelector('input');
                    const fieldName = field.getAttribute('data-field');
                    const sanitizedValue = input.value.replace(/'/g, "\\'");
                    formDataNews.append(fieldName, sanitizedValue);
                });
                formDataNews.append('edit_news', id);


                fetch('news_admin_panel.php', {
                    method: 'POST',
                    body: formDataNews
                }).then(response => {
                    return response.text();
                }).then(data => {
                    console.log(data);
                    location.reload();
                }).catch(error => {
                    console.error('Error:', error);
                });
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