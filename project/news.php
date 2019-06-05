<!DOCTYPE html>
<html>
<head>
	<title>Новости</title>
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
	</div>
	<div class="col-10 mx-auto text-center">
		<h5>Новости</h5>
		<?php 
			$c = mysqli_query($link, "SELECT * FROM news ORDER BY id ASC");
			for ($i=0; $i < $c->num_rows; $i++) {
				$news = $c->fetch_assoc(); 
		?>
			<div class="text-left">
				<?php 
					echo '<a href="novost.php?id='. $_GET['id'] .'&novost_id='. $news['id'] .'"><h4>' . $news['title'] . '</h4></a>';
					echo '<p>' . $news['short_txt'] . '</p>';
					echo '<a href="novost.php?id='. $_GET['id'] .'&novost_id='. $news['id'] .'"><img src ="images/' . $news['img'] . '"></a>';
					echo '<p>' . $news['date'] . '</p>';
				?>
			</div>
		<?php 
		}
		?>
	</div>
</body>
</html>