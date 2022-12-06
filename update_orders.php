<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
include "connect.php";
if (!$conn) {
    die("Помилка: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/base.css">
<?php include("font.php"); ?>
<title>updating...</title>
<meta charset="utf-8" />
</head>
<body>
<div class="divbg">
        <div class="regform">
<?php
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["order_id"]))
{
    $orderid = mysqli_real_escape_string($conn, $_GET["order_id"]);
    $sql = "SELECT * FROM Orders WHERE order_id = '$orderid'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $goodsid = $row["goods_id"];
                $orderdate = $row["order_date"];
                $quantity = $row["quantity"];
                $ordercost = $row["order_cost"];
                $comment = $row["comment"];
            }
            echo "<h2>Оновлення даних замовлення</h2>
                <form method='post'>
                    <input type='hidden' name='order_id' value='$orderid' />
                    <p>ID товару:</p>
                    <p><input type='text' name='goods_id' value='$goodsid' /></p>
                    <p>Дата замовлення (РРРР-ММ-ДД):</p>
                    <p><input type='text' name='order_date' value='$orderdate' /></p>
                    <p>Кількість:</p>
                    <p><input type='number' name='quantity' value='$quantity' /></p>
                    <p>Вартість:</p>
                    <p><input type='number' name='order_cost' value='$ordercost' /></p>
                    <p>Коментар до замовлення:</p>
                    <p><input type='text' name='comment' value='$comment' /></p>
                    <p><input type='submit' class='button' value='Зберегти'></p>
            </form>";
        }
        else{
            echo "<div>Замовлення не знайдено</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
}
elseif (isset($_POST["order_id"]) && isset($_POST["goods_id"]) && isset($_POST["order_date"]) && isset($_POST["quantity"]) && isset($_POST["order_cost"]) && isset($_POST["comment"])) {
      
    $orderid = mysqli_real_escape_string($conn, $_POST["order_id"]);
    $goodsid = mysqli_real_escape_string($conn, $_POST["goods_id"]);
    $orderdate = mysqli_real_escape_string($conn, $_POST["order_date"]);
    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $ordercost = mysqli_real_escape_string($conn, $_POST["order_cost"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
      
    $sql = "UPDATE Orders SET goods_id = '$goodsid', order_date = '$orderdate', quantity = '$quantity', order_cost = '$ordercost', comment = '$comment' WHERE order_id = '$orderid'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: orders.php");
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
}
else{
    echo "Некоректні дані";
}
mysqli_close($conn);
?>
        </div>
    </div>
</body>
</html>