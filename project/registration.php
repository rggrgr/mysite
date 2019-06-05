<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="col-4 mx-auto text-center mt-4">
		<h5>Регистрация</h5>
		<form action="reg.php" method="POST">
			<div class="mb-3">
				<input type="" placeholder="Логин" name = "login" class="form-control mb-1">
				<input type="password" placeholder="Пароль" name = "password" class="form-control mb-1">
				<input type="" placeholder="e-mail" name = "mail" class="form-control mb-1">
				<input type="" placeholder="номер телефона" name = "phone_num" class="form-control mb-1">
				<input type="" placeholder="адрес" name = "adres" class="form-control mb-1">
			</div>
			<button class="btn btn-outline-primary">Зарегистрироваться</button>
		</form>
	</div>
</body>
</html>