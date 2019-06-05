<?php 
	$link = mysqli_connect("127.0.0.1", "j951269", "69drwTsG", "j951269");
	$c = mysqli_query($link, "SELECT * FROM admin_reg WHERE login ='" . $_POST['login'] . "' AND password ='" . $_POST['password'] . "' ");
	$user = $c->fetch_assoc(); 
	if($c->num_rows != 0){
		$head = 'admin_panel.php';
	}else{
		$head = 'admin_login.php?error=Логин или пароль введены неверно';
	}
	$b = 'Location: http://j951269.myjino.ru/' . $head;
	header($b);
	echo 'g';	
?>
