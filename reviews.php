<!DOCTYPE html>
<html>
<head>
<?php include("font.php"); ?>
<title>Reviews</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/base.css">
</head>
<body>
<div class="divbgbd">
<h2>Список відгуків</h2>
<table>
    <tr>
        <th><a href="goods.php">Товари</a></th>
        <th><a href="index.php">Покупці</a></th>
        <th><a href="orders.php">Замовлення</a></th>
        <th><a href="video_player.php">Музика</a></th>
        <th><?php echo $_COOKIE["usernamecookie"];?></th>
        <th><a href="logout.php">Вийти</a></th>
    </tr>
</table>
<?php
include "connect.php";
if($conn->connect_error){
    die("Помилка: " . $conn->connect_error);
}
$sql = "SELECT * FROM Reviews";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows;
    echo "<p>Отримано об'єктів: $rowsCount</p>";
    echo "<table><tr><th>ID</th><th>ID покупця</th><th>ID товару</th><th>Оцінка</th><th>Відгук</th><th></th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["review_id"] . "</td>";
            echo "<td>" . $row["customer_id"] . "</td>";
            echo "<td>" . $row["goods_id"] . "</td>";
            echo "<td>" . $row["mark"] . "</td>";
            echo "<td>" . $row["review_text"] . "</td>";
            if('admin' == $_COOKIE["userlevelcookie"]){
            echo "<td><a href='update_reviews.php?review_id=" . $row["review_id"] . "'>Змінити</a></td>";
            echo "<td><form action='delete_reviews.php' method='post'>
                        <input type='hidden' name='review_id' value='" . $row["review_id"] . "' />
                        <input type='submit' class='button' value='Видалити'>
                   </form></td>";
            } else {
                echo "<td></td>";
                echo "<td></td>";
            }
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Помилка: " . $conn->error;
}
$conn->close();
if('admin' == $_COOKIE["userlevelcookie"])
echo "<table>
    <tr>
        <th><a href='form_reviews.php'>Додати новий відгук</a></th>
    </tr>
</table>"
?>
</div>
</body>
</html>