<?php
	session_start();
	if (!isset($_SESSION['loggedin'])) {
	    header('Location: index.html');
	    exit;
	}
	if(isset($_POST['save'])){
		require_once('db_connect.php');
		$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");
		$h = $_SESSION['email'];
		$stmt = $connect->prepare('SELECT user_id,u0,u1 FROM t2 WHERE u0 = ?');
		// In this case we can use the account ID to get the account info.
		$stmt->bind_param('s', $_SESSION['email']);
		$stmt->execute();
		$stmt->bind_result($user_id, $u0, $u1);
		
		$stmt->fetch();
		$stmt->close();		

    	$filename= $_FILES['myfile']['name'];
    	$destination = 'uploads/' . $filename;
    	$extension = pathinfo($filename,PATHINFO_EXTENSION);
    	$file = $_FILES['myfile']['tmp_name'];
    	if (!in_array($extension, ['txt','pdf','png','zip'])) {
            echo "your file extension must be txt/pdf/png/zip";
    	}else{
        if(move_uploaded_file($file, $destination)){
        	echo "$id";
            $sql = "INSERT INTO t3 (f0,f1) VALUES ('$filename','$user_id')";
            if (mysqli_query($connect,$sql)) {
                //successful 
                	header('Location: user_profile.php');
                }
            else{
                // echo "error";
            }
        } 
    }
}
?>
<html>
<head>
<title>Insert Content</title>
    <style type="text/css">
      .center {
        margin: 0;
        position: absolute;
        top: 40%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
      }
    </style>
</head>
<body>
	<a href="user_profile.php">Back to homepage !</a>
	<div class="center"> 
	<form name="frmUser" method="post" action="upload_file.php" enctype="multipart/form-data">
	<div><?php if(isset($message)) { echo $message; } ?>
	</div>
	<div style="padding-bottom:5px;">
	</div>
	<h3>New Upload</h3>
	<p>You are uploading file As <?=$_SESSION['email']?>.</p>

	<h4>Material Name</h4>
	<input type="text" name="name" class="txtField" required>
	<br>
	<br>
	<label for="file"><b>Choose File(.pdf/.txt/.png/.jpg)</b></label>
	<p><input type="file" name="myfile" required></p>
	<br>
	<br>
	<button type="submit" class="btn" name="save">Upload</button>
	
	</form>
</div>
</body>
</html>