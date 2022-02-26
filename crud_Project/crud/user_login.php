<?php
	require_once('db_connect.php');
	session_start();
	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");
	#$i = $_POST['email'];
	#$k = $_POST['password'];
	#echo "$i";
	#echo "$k";
	if ($stmt = $connect->prepare('SELECT u1 FROM t2 WHERE u0 = ?')) {
		$stmt->bind_param('s', $_POST['email']);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			$stmt->bind_result($u1);
			$stmt->fetch();
		if ($_POST['password'] === $u1) {
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['email'] =  $_POST['email'];
			header('Location: user_profile.php');
		} else {
		echo 'Incorrect username and/or password!';
		}
	} else {
	echo 'Incorrect username and/or password!';
	}
	$stmt->close();
	}
?>