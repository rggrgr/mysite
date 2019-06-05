<?php 
	$link = mysqli_connect("127.0.0.1", "j951269", "69drwTsG", "j951269");
	$c;
	if ($_POST['type'] == 1) {
		$c = "DELETE FROM phones WHERE id=" . $_POST['id'];
	}else{
		if ($_POST['type'] == 2) {
			$c = "DELETE FROM laptops WHERE id=" . $_POST['id'];
		}
	}
	mysqli_query($link, $c);
	$b = 'Location: http://j951269.myjino.ru/admin_panel.php';
	header($b);
?>