<!DOCTYPE html>
<html>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136499182-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136499182-1');
</script>
	<meta charset="utf-8">
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

	<div class="login-box">
		<h2>Admin Login</h2>

		<form method="POST" action="login.php">
			
			<input type="text" name="adminid" placeholder="Admin ID" >

			<input type="password" name="password" placeholder="Password">

			<input type="submit" name="login" value="Login" class="btn">

			
				


	</form>
		
	</div>


</body>


</html>

<?php
$conn = mysqli_connect("localhost","root","","pagido");
			  // Check connection
		if (!$conn) {
			  die("Connection failed because: " . mysqli_connect_error());
		 }else{
		 	echo "";
		 }
	if(isset($_POST['login']))//button name 'login'
	{
		$id = $_POST['adminid'];
		$password = $_POST['password'];

		$sql = "SELECT * from admin where admin_id='pagidoadmin' && password='$password'";

		$data = mysqli_query($conn,$sql);

		$total = mysqli_num_rows($data);

		if($total==1)

		{

  			session_start();
  			$_SESSION['login']=$id;
  		
			header('location:/pagido/adminpage.php');

				
		}
		else
		{
			echo "<p style='color:white; font-size:30px; margin-left: 35%; margin-top:25px;'>Login Failed Please Try Again !</p>";
		}
	}



?>

