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
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["goods_id"]))
{
    $goodsid = mysqli_real_escape_string($conn, $_GET["goods_id"]);
    $sql = "SELECT * FROM Goods WHERE goods_id = '$goodsid'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $goodsname = $row["goods_name"];
                $price = $row["price"];
                $quantity = $row["quantity"];
            }
            echo "<h2>Оновлення даних товару</h2>
                <form method='post'>
                    <input type='hidden' name='goods_id' value='$goodsid' />
                    <p>Назва:</p>
                    <p><input type='text' name='goods_name' value='$goodsname' /></p>
                    <p>Ціна:</p>
                    <p><input type='number' name='price' value='$price' /></p>
                    <p>Кількість:</p>
                    <p><input type='number' name='quantity' value='$quantity' /></p>
                    <p><input type='submit' class='button' value='Зберегти'></p>
            </form>";
        }
        else{
            echo "<div>Товар не знайдено</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
}
elseif (isset($_POST["goods_id"]) && isset($_POST["goods_name"]) && isset($_POST["price"]) && isset($_POST["quantity"])) {
      
    $goodsid = mysqli_real_escape_string($conn, $_POST["goods_id"]);
    $goodsname = mysqli_real_escape_string($conn, $_POST["goods_name"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
      
    $sql = "UPDATE Goods SET goods_name = '$goodsname', price = '$price', quantity = '$quantity' WHERE goods_id = '$goodsid'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: goods.php");
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