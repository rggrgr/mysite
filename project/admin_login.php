<!DOCTYPE html>
<html>
<head>
	<title>Вход</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="col-3 mx-auto text-center mt-4">
		<h5>Вход</h5>
		<form action="admin_log.php" method="POST">
			<div class="mb-3">
				<input type="" placeholder="Логин" name = "login" class="form-control mb-1">
				<input type="password" placeholder="Пароль" name = "password" class="form-control mb-1">
			</div>
			<?php echo '<p style = "color:red;">' . $_GET['error'] . '</p>' ?>
			<button class="btn btn-outline-primary">Войти</button>
		</form>
	</div>
</body>
</html>
