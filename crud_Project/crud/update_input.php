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
	$stmt = $connect->prepare('SELECT id,f0,f1 FROM t0 WHERE f1 = ?');
	// In this case we can use the account ID to get the account info.
	$stmt->bind_param('s', $_SESSION['email']);
	$stmt->execute();
	$stmt->bind_result($id, $f0, $f1);
	$stmt->fetch();
	$stmt->close();

?>



<h1>Update Record</h1>

<h4>You logged in as <?php echo $f1; ?> </h4>

<p><a href=user_profile.php>Back to home</a>

<form method=get action=update_result.php>



	<input type=hidden name=id value='<?php echo $id; ?>'> <br>



	f0: <input type=text name=f0 value='<?php echo $f0; ?>'>

	<p>

	<input type=submit value=Update>

</form>