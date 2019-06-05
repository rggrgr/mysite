<?php
	$link = mysqli_connect("127.0.0.1", "j951269", "69drwTsG", "j951269");
	move_uploaded_file($_FILES['img']['tmp_name'], 'images/' . $_FILES['img']['name']);
	if ($_POST['type'] == 1) {
		$sql = "INSERT INTO phones (type, brend, img, name, cam, cpu, ram, memory, price, resolution)
		VALUES ('1',
		 '" . $_POST['brend'] . "',
		 '" . $_FILES['img']['name'] . "',
		 '" . $_POST['name'] . "',
		 '" . $_POST['cam'] . "',
		 '" . $_POST['cpu'] . "',
		 '" . $_POST['ram'] . "',
		 '" . $_POST['memory'] . "',
		 '" . $_POST['price'] . "',
		 '" . $_POST['resolution'] . "')";
	}else{
	    if ($_POST['type'] == 2) {
	        $sql = "INSERT INTO laptops (type, brend, img, name, CPU_frequency, cpu, RAM, Data_storages, price, resolution, OS)
		    VALUES ('2',
    		 '" . $_POST['brend'] . "',
    		 '" . $_FILES['img']['name'] . "',
    		 '" . $_POST['name'] . "',
    		 '" . $_POST['CPU_frequency'] . "',
    		 '" . $_POST['cpu'] . "',
    		 '" . $_POST['ram'] . "',
    		 '" . $_POST['memory'] . "',
    		 '" . $_POST['price'] . "',
    		 '" . $_POST['resolution'] . "',
    		 '" . $_POST['OS'] . "')";
	    }
	};
	mysqli_query($link, $sql);
	$b = 'Location: http://j951269.myjino.ru/admin_panel.php';
	header($b);
?>
<meta charset="utf-8">