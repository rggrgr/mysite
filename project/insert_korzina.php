<?php
	$b = "Location: http://j951269.myjino.ru/korzina.php?id=" . $_POST['user_id'];
	header($b);
	$link = mysqli_connect("127.0.0.1", "j951269", "69drwTsG", "j951269");
	$c = mysqli_query($link, "SELECT * FROM korzina WHERE product_id='". $_POST['product_id'] ."' AND user_id='". $_POST['user_id'] ."' ");
	$product = $c->fetch_assoc();
	$count;
	if ($product['product_id'] == $_POST['product_id']) {
		$count = $product['count'] + $_POST['count'];
		$sql = "UPDATE korzina SET count='" . $count . "' WHERE product_id='" . $product['product_id'] . "' ";
	}else{
		$sql = "INSERT INTO korzina (product_id, count, user_id, type_kor)
		VALUES ('" . $_POST['product_id'] . "',
		 '" . $_POST['count'] . "',
		 '" . $_POST['user_id'] . "',
		 '" . $_POST['type'] . "')";
	}
	
	mysqli_query($link, $sql);

?>