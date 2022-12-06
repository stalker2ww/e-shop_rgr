<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/base.css">
<?php include("font.php"); ?>
<title>inserting...</title>
<meta charset="utf-8" />
</head>
<body>
    <div class="divbg">
        <div class="regform">
            <h2>Додаємо відгук</h2>
            <form action="insert_reviews.php" method="post">
                <p>ID покупця:</p>
                <p><input type="number" name="customer_id" /></p>
                <p>ID Товару:</p>
                <p><input type="number" name="goods_id" /></p>
                <p>Оцінка:</p>
                <p><input type="number" name="mark" /></p>
                <p>Відгук:</p>
                <p><input type="text" name="review_text" /></p>
                <p><input type="submit" class="button" value="Добавить"></p>
            </form>
        </div>
    </div>
</body>
</html>