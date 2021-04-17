<?php
session_start();

if(!$_SESSION['logged']){
	header("Location: login.php");
}

require("../includes/connection.inc.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$text = $_POST['text'];
	
	if (empty($text)) {

		$error = "<div align='center' style='margin-bottom: 20px;border-radius: 20px; padding:15px' class='alert-danger' ><h4><span style='color:red;'>One or more field(s) is empty</span></h4></div>";

	}else{
		$query_matches = $db->query("INSERT INTO upcomings(text) VALUES('$text')");
		$error = "<div align='center' style='margin-bottom: 20px;border-radius: 20px; padding:15px' class='alert-success' ><h4><span style='color:green;'>fixture inserted successfully</span></h4></div>"; 
	}
}

?>
<!DOCTYPE html>
<html>

<title>Administrator Dashboard</title>
<?php
include 'head.php';
include 'nav.php';
?>
<body style="background: url('../includes/img/20171130_lax_stadium_01.jpg');">
	<div class="col-8 col-offset-2 " style="margin-top: 80px;color: #eee;border: 1px solid #333; border-radius:10px; background:#333;background: rgba(54, 25, 25, .6); opacity:0.3 0 0; padding: 30px;">
		<h1 align="center">Add Post</h1>

		<form action='' method='POST'>
 <?php
	//	$query_matches = $db->query("SELECT * from upcomings ");
	?>
	<div class="form-group">
	<textarea name="text" type=text class="form-control" ></textarea> 
	
	</div>
	<br>
	<div class="form-group">
		<input class="form-control btn btn-lg btn-success" type="submit" value="POST">	
	</div>
	
	
	</form>
	</div>
	
</body>
</html>