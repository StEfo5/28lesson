<!-- 1. Вывести все наименования из таблицы -->
<!DOCTYPE html>
<html>
<head>
	<title>select</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-light">
	<?php $con = mysqli_connect('127.0.0.1', 'root', '', '28lesson'); 
	$query = mysqli_query($con, "SELECT * FROM products"); ?>
	<div class="container bg-dark mb-1">
		<h1 class="text-white">online Store</h1>
	</div>
	<div class="container">
		<h3>Все вещи:</h3>
		<?php 
			for($i = 0; $i < $query->num_rows; $i++) {
				$res = $query->fetch_assoc();
		?>
		<div class="row mb-3 bg-white">
			<div class="col-4 ml-3">
				<?php echo '<img src="' . $res['img'] . '" class="w-100">' ?>
			</div>
			<div class="col-6 ml-5">
				<h4><?php echo $res['name'] . ' ' . $res['brand']; ?></h4>
				<p>Категория: <?php echo ' ' . $res['category']; ?></p>
				<select class="custom-select">
					<option><?php echo $res['size']; ?></option>
				</select>
				<p>Цена: <?php echo ' ' . $res['price'] . ' руб.'; ?></p>
				<button type="button" class="btn btn-secondary">В корзину</button>
			</div>
		</div>
		<?php } ?>
	</div>
<!--
SELECT задания:

(!) Импортировать к себе в БД таблицу products. (!) Новую БД не создавать.

1. Вывести все наименования из таблицы (как главная страница в интернет магазинах).
2. Вывести всю мужскую одежду.
3. Вывести всю женскую одежду.
4. Вывести всю мужскую одежду с размером 46.
5. Вывести всю женскую обувь с размером > 36.
6. Вывести все вещи бренда miu miu. 
7. Вывести всю верхнюю одежду с подкатегорией "куртка".
8. Вывести всю джинсовую одежду с размером > 44.
9. Вывести все вещи бренда wrangler с размером 48.
10. Вывести всю мужскую обувь с подкатегорией "ботинки"
11. Вывести все платья с подкатегорией "платье летнее".

12. Вывести все значения из бд и отсортировать по бренду в алфавитном порядке (от a до z). ASC
13. Вывести все значения из бд и отсортировать по бренду от z до a (наоборот). DESC
14. Вывести все вещи по увеличению цены. price ASC
15. Вывести все вещи по уменьшению цены. price DESC
-->
</body>
</html>