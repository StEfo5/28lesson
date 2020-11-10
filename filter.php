<!-- 15. Вывести все вещи по уменьшению цены. price DESC -->
<!DOCTYPE html>
<html>
<head>
	<title>select</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container bg-dark mb-1 d-flex">
		<h1 class="text-white">online Store</h1>
		<form action="15.php" method="GET" class="ml-auto my-auto d-flex">
			<select name="gender" class="form-control rounded-0">
				<option>мужской</option>
				<option>женский</option>
			</select>
			<button class="btn btn-light rounded-0">
				Фильтровать
			</button>
		</form>
	</div>
	<div class="container">
		<h3>Все вещи бренда mui mui:</h3>
		<?php $con = mysqli_connect('127.0.0.1', 'root', '', '28lesson');
		if ($_GET['gender'] != NULL) {
			# code...
			$query = mysqli_query($con, "SELECT * FROM products WHERE gender = '{$_GET['gender']}'");
		}
		else $query = mysqli_query($con, "SELECT * FROM products");
		for($i = 0; $i < $query->num_rows; $i++) {
		$res = $query->fetch_assoc(); ?>
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
</body>
</html>