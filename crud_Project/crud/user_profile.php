<?php
	session_start();
	if (!isset($_SESSION['loggedin'])) {
		header('Location: index.html');
		exit;
	}
	require_once('db_connect.php');
	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");
	
	$h = $_SESSION['email'];
	
	#echo "$h";
	$stmt = $connect->prepare('SELECT id,f0,f1 FROM t0 WHERE f1 = ?');

	$stmt->bind_param('s', $_SESSION['email']);
	$stmt->execute();
	$stmt->bind_result($id, $f0, $f1);
	$stmt->fetch();
	$stmt->close();

	echo "General Information";
	echo "<br>";
	echo "-------------------";
	echo "<br>";
	echo "Name : ";
	echo "$f0";
	echo "<br>";
	echo "Email : ";
	echo "$f1";
	echo "<p><a href=update_input.php>Update Your Name</a>";


	echo "<br>";
	echo "<p><a href=history.php>File History</a>";

	echo "<p><a href=upload_file.php>Upload new Record</a>";
	echo "<br>";
	echo "<p><a href=user_logout.php>LOGOUT</a>";


?>