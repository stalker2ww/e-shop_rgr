<!DOCTYPE html>
<html>
<head>
<?php include("font.php"); ?>
<title>Goods</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/base.css">
</head>
<body>
<div class="divbgbd">
<h2>Список товарів</h2>
<table>
    <tr>
        <th><a href="index.php">Покупці</a></th>
        <th><a href="reviews.php">Відгуки</a></th>
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
$sql = "SELECT * FROM Goods";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows;
    echo "<p>Отримано об'єктів: $rowsCount</p>";
    echo "<table><tr><th>ID</th><th>Назва</th><th>Ціна</th><th>Кількість на складі</th><th></th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["goods_id"] . "</td>";
            echo "<td>" . $row["goods_name"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            if('admin' == $_COOKIE["userlevelcookie"]){
            echo "<td><a href='update_goods.php?goods_id=" . $row["goods_id"] . "'>Змінити</a></td>";
            echo "<td><form action='delete_goods.php' method='post'>
                        <input type='hidden' name='goods_id' value='" . $row["goods_id"] . "' />
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
        <th><a href='form_goods.php'>Додати новий товар</a></th>
    </tr>
</table>"
?>
</div>
</body>
</html>