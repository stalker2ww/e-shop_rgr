<!DOCTYPE html>
<html>

<head>
    <?php include("font.php"); ?>
    <title>Customers</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/base.css">
</head>

<body>
    <div class="divbgbd">
        <div class="container">
            <h2>Список покупців</h2>
        </div>
        <table>
            <tr>
                <th><a href="goods.php">Товари</a></th>
                <th><a href="reviews.php">Відгуки</a></th>
                <th><a href="orders.php">Замовлення</a></th>
                <th><a href="video_player.php">Музика</a></th>
                <th>
                    <?php echo $_COOKIE["usernamecookie"]; ?>
                </th>
                <th><a href="logout.php">Вийти</a></th>
            </tr>
        </table>
        <!-- <div class="container video">
  <object
    type="application/x-shockwave-flash"
    width="200"
    height="200"
    data="https://www.youtube.com/v/9CqtktNGsc4?version=2&autoplay=1&loop=1&hd=1&theme=dark">
   <param name="movie" value="https://www.youtube.com/v/9CqtktNGsc4?version=2&autoplay=1&loop=1&hd=1&theme=dark" />
   <param name="wmode" value="transparent" />
  </object>
</div> -->
        <?php
session_start();
if (!isset($_SESSION["session_username"])):
    header("location:login.php");
endif;
include "connect.php";
if ($conn->connect_error) {
    die("Помилка: " . $conn->connect_error);
}
$sql = "SELECT * FROM Customers";
if ($result = $conn->query($sql)) {
    $rowsCount = $result->num_rows;
    echo "<p>Отримано об'єктів: $rowsCount</p>";
    echo "<table><tr><th>ID</th><th>ПІБ</th><th>Номер телефону</th><th></th><th></th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row["customer_id"] . "</td>";
        echo "<td>" . $row["full_name"] . "</td>";
        if ('admin' == $_COOKIE["userlevelcookie"]) {
            echo "<td>" . $row["phone_number"] . "</td>";
        } else
            echo "<td>RESTRICTED</td>";
        if ('admin' == $_COOKIE["userlevelcookie"]) {
            echo "<td><a href='update_customers.php?customer_id=" . $row["customer_id"] . "'>Змінити</a></td>";
            echo "<td><form action='delete_customers.php' method='post'>
                        <input type='hidden' name='customer_id' value='" . $row["customer_id"] . "' />
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
} else {
    echo "Помилка: " . $conn->error;
}
$conn->close();
if ('admin' == $_COOKIE["userlevelcookie"])
    echo "<table>
    <tr>
        <th><a href='form_customers.php'>Додати нового покупця</a></th>
    </tr>
</table>"
    ?>
    </div>
</body>

</html>