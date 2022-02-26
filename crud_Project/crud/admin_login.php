<?php
	require_once('db_connect.php');
	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");
	#$i = $_POST['email'];
	#$k = $_POST['password'];
	#echo "$i";
	#echo "$k";
	if ($stmt = $connect->prepare('SELECT a1 FROM t1 WHERE a0 = ?')) {
		$stmt->bind_param('s', $_POST['email']);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			$stmt->bind_result($a1);
			$stmt->fetch();
		if ($_POST['password'] === $a1) {
			header('Location: read.php');
		} else {
		echo 'Incorrect username and/or password!';
		}
	} else {
	echo 'Incorrect username and/or password!';
	}
	$stmt->close();
	}
?>