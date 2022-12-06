<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if(isset($_POST["review_id"]))
{
    include "connect.php";
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $reviewid = mysqli_real_escape_string($conn, $_POST["review_id"]);
    $sql = "DELETE FROM Reviews WHERE review_id = '$reviewid'";
    if(mysqli_query($conn, $sql)){
         
        header("Location: reviews.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);    
}
?>