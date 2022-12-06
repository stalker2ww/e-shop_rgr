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
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["customer_id"]))
{
    $customerid = mysqli_real_escape_string($conn, $_GET["customer_id"]);
    $sql = "SELECT * FROM Customers WHERE customer_id = '$customerid'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $customername = $row["full_name"];
                $phonenumber = $row["phone_number"];
            }
            echo "<h2>Оновлення даних покупця</h2>
                <form method='post'>
                    <input type='hidden' name='customer_id' value='$customerid' />
                    <p>ПІБ:</p>
                    <p><input type='text' name='full_name' value='$customername' /></p>
                    <p>Номер телефону:</p>
                    <p><input type='number' name='phone_number' value='$phonenumber' /></p>
                    <p><input type='submit' class='button' value='Зберегти'></p>
            </form>";
        }
        else{
            echo "<div>Покупця не знайдено</div>";
        }
        mysqli_free_result($result);
    } else{
        echo "Помилка: " . mysqli_error($conn);
    }
}
elseif (isset($_POST["customer_id"]) && isset($_POST["full_name"]) && isset($_POST["phone_number"])) {
      
    $customerid = mysqli_real_escape_string($conn, $_POST["customer_id"]);
    $customername = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $phonenumber = mysqli_real_escape_string($conn, $_POST["phone_number"]);
      
    $sql = "UPDATE Customers SET full_name = '$customername', phone_number = '$phonenumber' WHERE customer_id = '$customerid'";
    if($result = mysqli_query($conn, $sql)){
        header("Location: index.php");
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