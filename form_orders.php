<?php 
if('admin' == $_COOKIE["userlevelcookie"]){
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
            <h2>Додаємо замовлення</h2>
            <form action="insert_orders.php" method="post">
                <p>ID товару:</p>
                <p><input type="number" name="goods_id" /></p>
                <p>Дата замовлення (РРРР-ММ-ДД):</p>
                <p><input type="text" name="order_date" /></p>
                <p>Кількість:</p>
                <p><input type="number" name="quantity" /></p>
                <p>Вартість:</p>
                <p><input type="number" name="order_cost" /></p>
                <p>Коментар:</p>
                <p><input type="text" name="comment" /></p>
                <p><input type="submit" class="button" value="Добавить"></p>
            </form>
        </div>
    </div>
</body>
</html>