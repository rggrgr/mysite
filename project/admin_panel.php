<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="col-11 mx-auto bg-white pb-3 pt-2 mt-2">
		<div class="row mb-3 mt-2">
			<div class="col-4">
				<?php echo '<a href="index.php" class="mr-3 btn btn-info">Главная</a>' ?>
				<?php echo '<a href="news.php" class="mr-3 btn btn-info">Новости</a>' ?>
			</div>
			<div class="col-3">
				<h5><a href="index.php" style="text-decoration: none; color: black">Название сайта</a></h5>
			</div>
			<div class="col-5 row">
				<?php 
					$link = mysqli_connect("127.0.0.1", "j951269", "69drwTsG", "j951269");
				?>
			</div>
		</div>
		<div class="row col-10 mx-auto">
			<div class="col-6 mr-auto input-group">
				<form action="index.php" method="GET">
					<div class="row">
						<div>
							<?php echo '<input type="hidden" name="id" class="form-control" value = "' . $_GET['id'] . '">'; ?>
							<input type="" name="search" class="form-control">
						</div>
						<div class="input-group-append">
							<button>Поиск</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row col-10 mx-auto mt-3">
		    <h5>Телефоны</h5>
			<form action="insert_product.php" method="POST" enctype="multipart/form-data">
				<input list="brend_tel" name="brend" placeholder="бренд">
				<datalist id="brend_tel">
					<option>Nokia</option>
					<option>Huawei</option>
					<option>Samsung</option>
					<option>Honor</option>
				</datalist>
				<input name="type" type="hidden" value="1">
				<input name="name" type="" value="" placeholder="Название">
				<input name="cam" type="" value="" placeholder="камера">
				<input name="cpu" type="" value="" placeholder="Процессор">
				<input name="ram" type="" value="" placeholder="Оперативная память">
				<input name="memory" type="" value="" placeholder="Память">
				<input name="resolution" type="" value="" placeholder="разрешение экрана">
				<input name="img" type="file" value="">
				<input name="price" type="" value="" placeholder="цена">
				<button>Добавить</button>
			</form>
		</div>
		<div class="row col-10 mx-auto mt-3">
		    <h5>Ноутбуки</h5>
			<form action="insert_product.php" method="POST" enctype="multipart/form-data">
				<input list="brend_nout" name="brend" placeholder="бренд">
				<datalist id="brend_nout">
					<option>Asus</option>
					<option>Acer</option>
					<option>Apple</option>
					<option></option>
				</datalist>
				<input name="type" type="hidden" value="2">
				<input name="name" type="" value="" placeholder="Название">
				<input name="CPU_frequency" type="" value="" placeholder="Частота процессора">
				<input name="cpu" type="" value="" placeholder="Процессор">
				<input name="ram" type="" value="" placeholder="Оперативная память">
				<input name="memory" type="" value="" placeholder="Память">
				<input name="resolution" type="" value="" placeholder="разрешение экрана">
				<input name="OS" type="" value="" placeholder="Операционная система">
				<input name="img" type="file" value="">
				<input name="price" type="" value="" placeholder="цена">
				<button>Добавить</button>
			</form>
		</div>
	</div>
	<div class="main col-10 mx-auto">
		<div class="row">
			<?php
				$c = mysqli_query($link, "SELECT * FROM phones");
				for ($i=0; $i < $c->num_rows; $i++) {
					$product = $c->fetch_assoc(); 
			?>	
			<div class="row my-4 col-6">
				<div class="col-4 text-center" style="">
					<?php 
						echo '<a style="text-decoration: none; color: black" href="tel.php?id_tel='. $product['id'] .'&id='. $_GET['id'] .'"><img class="w-75" src ="images/' . $product['img'] . '"></a>';
					?>
				</div>
				<div class="col-8" style=""> 
					<?php 
						echo '<a style="text-decoration: none; color: black" href="tel.php?id_tel='. $product['id'] .'&id='. $_GET['id'] .'"><h5>' . ' ' . $product['name'] . '</h5>';
						echo '<p>' . $product['cpu'] . ', ' . $product['ram'] . ', ' . $product['resolution'] .  ', ' . $product['memory'] . '</p></a>';
					?>
					<?php echo '<a href="tel.php?id=' . $_GET['id'] . '&id_tel=' . $product['id'] . '" class="mr-3 btn btn-info">Подробнее</a>' ?>
					<form action="delete_product.php" method="POST">
						<?php echo '<input name="type" type="hidden" value="1">' ?>
						<?php echo '<input name="id" type="hidden" value="'. $product['id'] .'">' ?>
						<?php echo '<button class="mr-3 btn btn-info">Удалить</button>' ?>
					</form>
				</div>
			</div>			
			<?php 
				}
			?>
		</div>
		<div class="row">
			<?php
				$b = mysqli_query($link, "SELECT * FROM laptops");
				for ($i=0; $i < $b->num_rows; $i++) {
					$product1 = $b->fetch_assoc(); 
			?>	
			<div class="row my-4 col-6">
				<div class="col-4 text-center">
					<?php 
						echo '<a style="text-decoration: none; color: black" href="nout.php?id_nout='. $product1['id'] .'&id='. $_GET['id'] .'"><img class="w-75" src ="images/' . $product1['img'] . '"></a>';
					?>
				</div>
				<div class="col-8">
					<?php 
						echo '<a style="text-decoration: none; color: black" href="nout.php?id_nout='. $product1['id'] .'&id='. $_GET['id'] .'"><h5>'  . ' ' . $product1['name'] . '</h5>';
						echo '<p>' . $product1['resolution'] . ', ' . $product1['CPU'] . ', ' . $product1['CPU frequency'] .  ', ' . $product1['RAM'] . ', ' . $product1['Data_storages'] . ', ' . $product1['OS'] . ' </p></a>';
					?>
					<?php echo '<a href="nout.php?id=' . $_GET['id'] . '&id_nout=' . $product1['id'] . '" class="mr-3 btn btn-info">Подробнее</a>' ?>
					<form action="delete_product.php" method="POST">
						<?php echo '<input name="type" type="hidden" value="2">' ?>
						<?php echo '<input name="id" type="hidden" value="'. $product['id'] .'">' ?>
						<?php echo '<button class="mr-3 btn btn-info">Удалить</button>' ?>
					</form>
				</div>
			</div>			
			<?php 
				}
			?>
		</div>
	</div>
</body>
</html>