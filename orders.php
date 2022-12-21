<?php 
if('admin' != $_COOKIE["userlevelcookie"]){
    header("Location: intropage.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include("font.php"); ?>
<title>Orders</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/base.css">
</head>
<body>
<div class="divbgbd">
<h2>Список замовлень</h2>
<table>
    <tr>
        <th><a href="goods.php">Товари</a></th>
        <th><a href="reviews.php">Відгуки</a></th>
        <th><a href="index.php">Покупці</a></th>
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
$sql = "SELECT * FROM Orders";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows;
    echo "<p>Отримано об'єктів: $rowsCount</p>";
    echo "<table><tr><th>ID замовлення</th><th>ID товару</th><th>Дата замовлення</th><th>Кількість</th><th>Вартість</th><th>Коментар</th><th></th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["order_id"] . "</td>";
            echo "<td>" . $row["goods_id"] . "</td>";
            echo "<td>" . $row["order_date"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td>" . $row["order_cost"] . "</td>";
            echo "<td>" . $row["comment"] . "</td>";
            echo "<td><a href='update_orders.php?order_id=" . $row["order_id"] . "'>Змінити</a></td>";
            echo "<td><form action='delete_orders.php' method='post'>
                        <input type='hidden' name='order_id' value='" . $row["order_id"] . "' />
                        <input type='submit' class='button' value='Видалити'>
                   </form></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Помилка: " . $conn->error;
}
$conn->close();
?>
</div>
</body>
</html>