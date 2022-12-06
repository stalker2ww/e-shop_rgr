<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if(isset($_POST["order_id"]))
{
    include "connect.php";
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $orderid = mysqli_real_escape_string($conn, $_POST["order_id"]);
    $sql = "DELETE FROM Orders WHERE order_id = '$orderid'";
    if(mysqli_query($conn, $sql)){
         
        header("Location: orders.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);    
}
?>