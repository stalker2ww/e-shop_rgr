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
                if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["review_id"]))
                {
                    $reviewid = mysqli_real_escape_string($conn, $_GET["review_id"]);
                    $sql = "SELECT * FROM Reviews WHERE review_id = '$reviewid'";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            foreach($result as $row){
                                $customerid = $row["customer_id"];
                                $goodsid = $row["goods_id"];
                                $mark = $row["mark"];
                                $reviewtext = $row["review_text"];
                            }
                            echo "<h2>Оновлення даних відгуку</h2>
                                <form method='post'>
                                    <input type='hidden' name='review_id' value='$reviewid' />
                                    <p>ID покупця:</p>
                                    <p><input type='number' name='customer_id' value='$customerid' /></p>
                                    <p>ID товару:</p>
                                    <p><input type='number' name='goods_id' value='$goodsid' /></p>
                                    <p>Оцінка:</p>
                                    <p><input type='number' name='mark' value='$mark' /></p>
                                    <p>Відгук:</p>
                                    <p><input type='text' name='review_text' value='$reviewtext' /></p>
                                    <p><input type='submit' class='button' value='Зберегти'></p>
                            </form>";
                        }
                        else{
                            echo "<div>Відгук не знайдено</div>";
                        }
                        mysqli_free_result($result);
                    } else{
                        echo "Помилка: " . mysqli_error($conn);
                    }
                }
                elseif (isset($_POST["review_id"]) && isset($_POST["customer_id"]) && isset($_POST["goods_id"]) && isset($_POST["mark"]) && isset($_POST["review_text"])) {
                    
                    $reviewid = mysqli_real_escape_string($conn, $_POST["review_id"]);
                    $customerid = mysqli_real_escape_string($conn, $_POST["customer_id"]);
                    $goodsid = mysqli_real_escape_string($conn, $_POST["goods_id"]);
                    $mark = mysqli_real_escape_string($conn, $_POST["mark"]);
                    $reviewtext = mysqli_real_escape_string($conn, $_POST["review_text"]);
                    
                    $sql = "UPDATE Reviews SET customer_id = '$customerid', goods_id = '$goodsid', mark = '$mark', review_text = '$reviewtext' WHERE review_id = '$reviewid'";
                    if($result = mysqli_query($conn, $sql)){
                        header("Location: reviews.php");
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