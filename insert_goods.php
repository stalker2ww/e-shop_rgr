<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if (isset($_POST["goods_name"]) && isset($_POST["price"]) && isset($_POST["quantity"])) {
    include "connect.php";
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $goodsname = mysqli_real_escape_string($conn, $_POST["goods_name"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $sql = "INSERT INTO Goods (goods_name, price, quantity) VALUES ('$goodsname', $price, $quantity)";
        if(mysqli_query($conn, $sql)){
            header("Location: goods.php");
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>