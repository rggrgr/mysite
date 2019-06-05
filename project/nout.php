<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-light">
	<div class="col-10 mx-auto bg-white pb-3 pt-2 mt-2">
		<div class="row mb-3 mt-2">
			<div class="col-4">
				<?php echo '<a href="index.php?id=' . $_GET['id'] . '" class="mr-3 btn btn-info">Главная</a>' ?>
				<?php echo '<a href="news.php?id=' . $_GET['id'] . '" class="mr-3 btn btn-info">Новости</a>' ?>
			</div>
			<div class="col-2">
				<h5><a href="index.php" style="text-decoration: none; color: black">Название сайта</a></h5>
			</div>
			<div class="col-6 row">
				<?php echo '<a href="korzina.php?id=' . $_GET['id'] . '" class="mr-3 btn btn-info">Корзина</a>' ?>
				<a href="" class="mr-3 btn btn-info">Список желаний</a>
				<?php 
				$link = mysqli_connect("127.0.0.1", "j951269", "69drwTsG", "j951269");
					if ($_GET['id'] != 0) {
						$c = mysqli_query($link, "SELECT * FROM shop_regis WHERE id ='" . $_GET['id'] . "' ");
						$user = $c->fetch_assoc(); 
						echo '<div class = "ml-3 row"><p class="mr-3">Здравствуйте,' . $user['login'] . '</p>';
						echo '<a href="index.php" class="mr-3 btn btn-info">Выйти</a></div>';
					}else{
						echo '<a href="login.php" class="mr-3 btn btn-info">Войти</a>';
						echo'<a href="registration.php" class="btn btn-info">Регистрация</a>';
					}
				?>
			</div>
		</div>
		<div class="row col-10 mx-auto">
			<!-- категории товаров -->
			<div class="col-3">
				<div class="dropdown">
					<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Категории
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<?php echo '<a href="phones.php?id=' . $_GET['id'] . '" class="dropdown-item">Телефоны</a>' ?>
						<?php echo '<a href="laptops.php?id=' . $_GET['id'] . '" class="dropdown-item">Ноутбуки</a>' ?>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</div>
			</div>
			<div class="col-6 mr-auto input-group">
				<input type="" name="" class="form-control">
				<div class="input-group-append">
					<button>Поиск</button>
				</div>
			</div>
		</div>
	</div>
	<?php
		$link = mysqli_connect("127.0.0.1", "j951269", "69drwTsG", "j951269");
		$c = mysqli_query($link, "SELECT * FROM laptops WHERE id =" . $_GET['id_nout']);
		$product = $c->fetch_assoc(); 
	?>
	<div class="main col-10 mx-auto bg-white mt-4">
		<div class="row">
			<div class="col-2">
				<?php 
					echo '<img class="w-75" src ="images/' . $product['img'] . '">';
				?>
			</div>
			<div class="col-10">
				<?php 
					echo '<h3>' . $product['brend'] . ' ' . $product['name'] . '</h3>';
				?>
				<form action="insert_korzina.php" method="POST">
					<?php
						echo '<input name ="count" type ="" value = "">';
						echo '<input name ="type" type ="hidden" value = "' . $product['type'] . '">';
						echo '<input name ="user_id" type ="hidden" value = "' . $_GET['id'] . '">';
						echo '<input name ="product_id" type ="hidden" value = "' . $product['id'] . '">';
						echo '<h4>' . $product['price'] . ' рублей </h4>';
					?>
					<button class="btn btn-warning ml-3">В корзину</button>
				</form>
			</div>
		</div>
		<div class="col-12">
			
		</div>
	</div>
	<div class="footer">
		
	</div>
</body>
</html>