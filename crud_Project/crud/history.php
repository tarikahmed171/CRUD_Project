<!DOCTYPE html>
<html>
<style type="text/css">
.topcenter{
          position: absolute;
          top: 9px;
          right: 45%;
          left : 40%;
          font-size: 18px;
          text-align: center;
      }
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: center;
}
th {
background-color: #588c7e;
color: white;
}
</style>
<body>
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
  $stmt = $connect->prepare('SELECT user_id,u0,u1 FROM t2 WHERE u0 = ?');
  // In this case we can use the account ID to get the account info.
  $stmt->bind_param('s', $_SESSION['email']);
  $stmt->execute();
  $stmt->bind_result($user_id, $u0, $u1);
  
  $stmt->fetch();
  $stmt->close(); 

  $sql = "SELECT file_id,f0,f1 FROM t3 WHERE f1= $user_id ";
  $result = $connect->query($sql);
  $files = mysqli_fetch_all($result,MYSQLI_ASSOC);
  $connect->close();
?>
<p>Here is  <?=$_SESSION['email']?>  all previous upload.</p>

<br><a href="user_profile.php">Back to Profile</a><br><br>
<table style="width:100% ">
  <thead>
    <th> File id </th>
    <th> File NAME </th> 
  </thead>
  <tbody>
    <?php 
    foreach($files as $file): ?>
      <tr>
        <td><?php echo $file['file_id'];?></td>
        <td><?php echo $file['f0'];?></td>
      </tr>
    <?php endforeach ; ?>
  </tbody>
</body>
</html>

