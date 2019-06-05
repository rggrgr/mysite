<?php 
	$link = mysqli_connect("127.0.0.1", "j951269", "69drwTsG", "j951269");
	$c = "DELETE FROM korzina WHERE korzina_id=" . $_POST['id'];
	mysqli_query($link, $c);
	$b = 'Location: http://j951269.myjino.ru/korzina.php?id=' . $_POST['user_id'];
	header($b);
?>