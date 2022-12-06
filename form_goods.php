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
            <h2>Додаємо товар</h2>
            <form action="insert_goods.php" method="post">
                <p>Назва:</p>
                <p><input type="text" name="goods_name" /></p>
                <p>Ціна:</p>
                <p><input type="number" name="price" /></p>
                <p>Кількість:</p>
                <p><input type="number" name="quantity" /></p>
                <p><input type="submit" class="button" value="Добавить"></p>
            </form>
        </div>
    </div>
</body>
</html>