<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if(isset($_POST["goods_id"]))
{
    include "connect.php";
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $goodsid = mysqli_real_escape_string($conn, $_POST["goods_id"]);
    $sql = "DELETE FROM Goods WHERE goods_id = '$goodsid'";
    if(mysqli_query($conn, $sql)){
         
        header("Location: goods.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);    
}
?>