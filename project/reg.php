<?php 
	header("Location: http://j951269.myjino.ru/login.php");
	$link = mysqli_connect("127.0.0.1", "j951269", "69drwTsG", "j951269");
	$sql = "INSERT INTO shop_regis (login, password, mail, num, adres)
	VALUES ('" . $_POST['login'] . "',
	 '" . $_POST['password'] . "',
	 '" . $_POST['mail'] . "',
	 '" . $_POST['phone_num'] . "',
	 '" . $_POST['adres'] . "')";
	//$message = 'Ваш логин: ' . $_POST['log'] . ' и пароль: ' . $_POST['pass'];
	//mail( $_POST['mail'], 'Регистрация', $message);
	mysqli_query($link, $sql);
?>