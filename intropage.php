<?php
session_start();
if (!isset($_SESSION["session_username"])):
	header("location:login.php");
else:
?>
<!DOCTYPE html>
<html>

<head>
	<?php include("font.php"); ?>
	<title>Brain shop</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/base.css">
</head>

<body>
	<div class="divbg">
		<h2>Вітаємо,
			<?php echo $_SESSION['session_username']; ?>!
		</h2>
		<table>
			<th><a href="logout.php">Вийти з системи</a></th>
		</table>
		<h3 class="hehe">Обрати таблицю для взаємодії:</h3>
		<table>
			<th><a href="index.php">Покупці</a></th>
			<th><a href="orders.php">Замовлення</a></th>
			<th><a href="reviews.php">Відгуки</a></th>
			<th><a href="goods.php">Товари</a></th>
		</table>
		<?php
			if ('admin' != $_COOKIE["userlevelcookie"])
				echo "<table>
					<tr>
						<th><a href='form_orders.php'>Додати нове замовлення</a></th>
					</tr>
				</table>"
        ?>
	</div>
</body>

</html>
<?php
endif;
?>