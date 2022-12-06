<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if (isset($_POST["customer_id"]) && isset($_POST["goods_id"]) && isset($_POST["mark"]) && isset($_POST["review_text"])) {
    include "connect.php";
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $customerid = mysqli_real_escape_string($conn, $_POST["customer_id"]);
    $goodsid = mysqli_real_escape_string($conn, $_POST["goods_id"]);
    $mark = mysqli_real_escape_string($conn, $_POST["mark"]);
    $reviewtext = mysqli_real_escape_string($conn, $_POST["review_text"]);
    $sql = "INSERT INTO Reviews (customer_id, goods_id, mark, review_text) VALUES ($customerid, $goodsid, $mark, '$reviewtext')";
        if(mysqli_query($conn, $sql)){
            header("Location: reviews.php");
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>