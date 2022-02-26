<?php
	session_start();
	if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
	}
	$id = $_GET["id"];
	$f0 = $_GET["f0"];

	require_once('db_connect.php');

	$connect = mysqli_connect( HOST, USER, PASS, DB )

		or die("Can not connect");



	$query 	= "UPDATE t0 SET f0='$f0' WHERE id = $id";

	#echo $query;



	mysqli_query( $connect, $query )

		or die("Can not execute query");

	$f1 = $_SESSION['email'];

	echo "<h4>Data Successfully update in $f1 profile.</h4>";

	echo "<p>Record updated:<br> f0 = $f0";

	echo "<p><a href=user_profile.php>Back to home</a>";

?>