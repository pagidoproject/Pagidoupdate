<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'pagido');

	// initialize variables
	$title = "";
	$author = "";
	$content="";
	$img = "";
	$date="";
	$blog_id = 0;
	$update = false;

	
//update execution code
// ... 

if (isset($_POST['update'])) {
	$blog_id = $_POST['blog_id'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$content = $_POST['content'];
		$img = $_POST['img'];
	$date = $_POST['date'];

	mysqli_query($db, "UPDATE blog_details SET title='$title', author='$author', content='$content', img='$img', date='$date' WHERE blog_id=$blog_id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: editblog.php');
}
//for dellete thhe record
if (isset($_GET['del'])) {
	$blog_id = $_GET['del'];
	mysqli_query($db, "DELETE FROM blog_details WHERE blog_id=$blog_id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: editblog.php');
}
?>

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
	<title></title>
</head>
<body>
	

</body>
</html>



