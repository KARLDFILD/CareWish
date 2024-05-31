<?php
include('connection_bd.php');

if (isset($_GET['id'])) {
    $newsId = $_GET['id'];

    $sql = "SELECT id, title, content, img_news, description FROM news WHERE id = $newsId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
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
    <title><?php echo $row['title']; ?> - CareWish</title>
</head>

<body>
    <?php
            include("header.php");
            ?>
    <div class="MainPage">
        <div class="NewsCard">
            <div class="NewsCardPhoto">
                <img src="<?php echo $row['img_news']; ?>" alt="Новость">
            </div>
            <div class="NewsContent">
                <div class="NewsCardTitle">
                    <h1><?php echo $row['title']; ?></h1>
                </div>
                <div class="NewsCardText">
                    <?php echo $row['content']; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
    } else {
        echo "Новость не найдена.";
    }
} else {
    echo "Параметр id не передан.";
}

mysqli_close($conn);
?>