<?php 
if('admin' == $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if (isset($_POST["goods_id"]) && isset($_POST["order_date"]) && isset($_POST["quantity"]) && isset($_POST["order_cost"]) && isset($_POST["comment"])) {
    include "connect.php";
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $goodsid = mysqli_real_escape_string($conn, $_POST["goods_id"]);
    $orderdate = mysqli_real_escape_string($conn, $_POST["order_date"]);
    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $ordercost = mysqli_real_escape_string($conn, $_POST["order_cost"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $sql = "INSERT INTO Orders (goods_id, order_date, quantity, order_cost, comment) VALUES ($goodsid, '$orderdate', $quantity, $ordercost, '$comment')";
        if(mysqli_query($conn, $sql)){
            header("Location: orders.php");
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>