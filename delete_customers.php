<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if(isset($_POST["customer_id"]))
{
    include "connect.php";
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $customerid = mysqli_real_escape_string($conn, $_POST["customer_id"]);
    $sql = "DELETE FROM Customers WHERE customer_id = '$customerid'";
    if(mysqli_query($conn, $sql)){
         
        header("Location: index.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);    
}
?>