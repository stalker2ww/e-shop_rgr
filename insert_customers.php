<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<?php
if (isset($_POST["full_name"]) && isset($_POST["phone_number"])) {   
    include "connect.php";
    if (!$conn) {
      die("Помилка: " . mysqli_connect_error());
    }
    $customername = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $phonenumber = mysqli_real_escape_string($conn, $_POST["phone_number"]);
    $sql = "INSERT INTO Customers (full_name, phone_number) VALUES ('$customername', $phonenumber)";
        if(mysqli_query($conn, $sql)){
            header("Location: index.php");
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>