<?php  include('edit.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$blog_id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM blog_details WHERE blog_id=$blog_id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$title = $n['title'];
			$author = $n['author'];
			$content = $n['content'];
			$img = $n['img'];
			$date = $n['date'];

		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136499182-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136499182-1');
</script>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>

		<?php

	include("adminpage.php");
	?>
	<div class="container form1">
	<form method="post" action="edit.php" id="myForm">
		<div class="input-group">
			<!-- newly added field-->
			<input type="hblog_idden" name="blog_id" value="<?php echo $blog_id; ?>">
			<label>Title</label>
			<!--<input type="text" name="name" value="">-->
			<!-- modified form fields-->
			<input type="text" name="title" value="<?php echo $title; ?>">
		</div>
		<div class="input-group">
			<label>&nbsp;&nbsp;&nbsp;&nbsp;Author</label>
			<!--<input type="text" name="address" value="">-->
			<input type="text" name="author" value="<?php echo $author; ?>">
		</div>

		<div class="input-group">
			<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Content</label>
			
			<input type="text" name="content" value="<?php echo $content; ?>" style="">	
		</div>
			<div class="input-group">
			<label>&nbsp;&nbsp;&nbsp;Image</label>
			<!--<input type="text" name="address" value="">-->
			<input type="text" name="img" value="<?php echo $img; ?>">
		</div>
			<div class="input-group">
			<label>&nbsp;Date</label>
			<!--<input type="text" name="address" value="">-->
			<input type="text" name="date" value="<?php echo $date; ?>">
		</div>
		

		<div class="input-group">
			<!--old form button<button class="btn" type="submit" name="save" >Save</button>-->
			<!--new bbutton to show update during editing-->
			<?php if ($update == true): ?>
		
		<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>

		<button class="btn" onclick="myFunction()" value="Reset form" style="background: #556B2F;" >Reset</button>
<script>
function myFunction() {
  document.getElementById("myForm").reset();
}
</script>

<?php endif ?>
		</div>
	</form>
</div>


	<?php if (isset($_SESSION['message'])): ?> 	
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif ?>
	<?php $results = mysqli_query($db, "SELECT * FROM blog_details"); ?>

<table class="con">
	<thead>
		<tr>
			<th>Title</th>

			<th>Author</th>
			
			<th>Image</th>
				
			<th>Date</th>
			
			<th colspan="2">Action</th>
		</tr>
	</thead>

	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['author']; ?></td>
				<td><?php echo $row['img']; ?></td>
			<td><?php echo $row['date']; ?></td>

			<td>
		
				<a href="editblog.php?edit=<?php echo $row['blog_id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="edit.php?del=<?php echo $row['blog_id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

</body>
</html>