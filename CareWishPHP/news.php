<?php
include('connection_bd.php');


$sql = "SELECT id, title, content, img_news, description FROM news";
$result = mysqli_query($conn, $sql);

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
    <title>CareWish</title>
</head>


<body>
    <?php
    include("header.php");
    ?>
    <div class="MainPage">
        <h1 class="News">Новости</h1>
        <div class="NewsContainer">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <div class="NewsItem">
                <div class="NewsPhoto">
                    <img src="<?php echo $row['img_news']; ?>" alt="Новость">
                </div>
                <div class="NewsContent">
                    <div class="NewsTitle">
                        <a href="full_news.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                    </div>
                    <div class="NewsPreview">
                        <?php echo $row['description']; ?>
                        <span>... <a href="full_news.php?id=<?php echo $row['id']; ?>">Читать далее</a></span>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <script src="./js/script.js">
    </script>
</body>

</html>

<?php
mysqli_close($conn);
?>