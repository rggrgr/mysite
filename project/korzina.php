<!DOCTYPE html>
<html>
<head>
	<title>Корзина</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="col-11 mx-auto bg-white pb-3 pt-2 mt-2">
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
	</div class = "class="main col-10 mx-auto">
	<?php 
		$c = mysqli_query($link, "SELECT * FROM korzina INNER JOIN phones ON korzina.product_id = phones.id AND korzina.user_id = ". $_GET['id'] ." AND korzina.type_kor = phones.type");
		for ($i=0; $i < $c->num_rows; $i++) { 
			$product = $c->fetch_assoc(); 
	?>
	<div>
		<div class="row mb-3">
				<div class="col-2 text-center">
					<?php 
						echo '<a style="text-decoration: none; color: black" href="tel.php?id_tel='. $product['id'] .'&id='. $_GET['id'] .'"><img class="w-75" src ="images/' . $product['img'] . '"></a>';
					?>
				</div>
				<div class="col-5">
					<?php 
						echo '<a style="text-decoration: none; color: black" href="tel.php?id_tel='. $product['id'] .'&id='. $_GET['id'] .'"><h5>' . ' ' . $product['name'] . '</h5>';
						echo '<p>' . $product['cpu'] . ', ' . $product['ram'] . ', ' . $product['resolution'] .  ', ' . $product['memory'] . '</p></a>';
					?>
				</div>
				<div class="col-5">
					<div class="row">
						<form action="delete_korzina.php" method="POST">
							<?php
								$price = $product['price'] * $product['count'];
								echo '<input name = "user_id" type = "hidden" value = "' . $_GET['id'] . '">';
								echo '<input name ="id" type ="hidden" value = "' . $product['korzina_id'] . '">';
								echo '<h5>' . $price . ' рублей </h5>';
								$price_order = $price_order + $price;
							?>
							<button class="btn btn-warning ml-3">удалить</button>
						</form>
						<form action="change_kor.php" method="POST">
							<?php
								echo '<input name ="count" type ="number" value="'. $product['count'] .'"></input>';
							?>
							<button class="btn btn-warning">изменить</button>
						</form>
					</div>
				</div>
			</div>
	<?php
		} 
	?>
	<?php 
		$c1 = mysqli_query($link, "SELECT * FROM korzina INNER JOIN laptops ON korzina.product_id = laptops.id AND korzina.user_id = " . $_GET['id'] . " AND korzina.type_kor = laptops.type");
		for ($i=0; $i < $c1->num_rows; $i++) { 
			$product1 = $c1->fetch_assoc(); 
	?>
		<div class="row mb-3">
				<div class="col-2 text-center">
					<?php 
						echo '<a style="text-decoration: none; color: black" href="nout.php?id_tel='. $product1['id'] .'&id='. $_GET['id'] .'"><img class="w-75" src ="images/' . $product1['img'] . '"></a>';
					?>
				</div>
				<div class="col-5">
					<?php 
						echo '<a style="text-decoration: none; color: black" href="nout.php?id_tel='. $product['id'] .'&id='. $_GET['id'] .'"><h5>' . ' ' . $product1['name'] . '</h5>';
						echo '<p>' . $product1['resolution'] . ', ' . $product1['CPU'] . ', ' . $product1['CPU frequency'] .  ', ' . $product1['RAM'] . ', ' . $product1['Data_storages'] . ', ' . $product1['OS'] . ' </p></a>';
					?>
				</div>
				<div class="col-5">
					<div class="row">
						<form action="delete_korzina.php" method="POST">
							<?php
								$price1 = $product1['price'] * $product1['count'];
								echo '<input name = "user_id" type = "hidden" value = "' . $_GET['id'] . '">';
								echo '<input name ="id" type ="hidden" value = "' . $product1['korzina_id'] . '">';
								echo '<h5>' . $price1 . ' рублей </h5>';
								$price_order = $price_order + $price1;
							?>
							<button class="btn btn-warning ml-3">удалить</button>
						</form>
						<form action="change_kor.php" method="POST">
							<?php
								echo '<input name ="count" type ="number" value="'. $product1['count'] .'"></input>';
							?>
							<button class="btn btn-warning">изменить</button>
						</form>
					</div>
				</div>
			</div>
	<?php
		} 
	?>
	    <div class ="text-center">
			<form action="" method="POST">
				<?php 
					echo '<h5>Всего: '. $price_order .' рублей</h5>';
					echo '<input name="price_order" type="hidden" value="'. $price_order .'">';
				?>
				<button class="btn btn-warning ml-3">Оформить</button>
			</form>
		</div>
	</div>
</body>
</html>