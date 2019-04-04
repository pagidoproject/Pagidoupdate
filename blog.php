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
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

	<link rel="stylesheet" type="text/css" href="css/blogg.css">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


	<style type="text/css">
		
	</style>
</head>
<body>

	
	<div class="container	 blog">
		<div class="row blog">
		<?php


			$connect = mysqli_connect("localhost","root","","pagido");
				
			if (!$connect) {
			die("Not connected : " . mysql_error());
			}else{
				echo "";
			}

			$res=mysqli_query($connect,"SELECT * FROM blog_details"); 

			while ($row=mysqli_fetch_assoc($res))
			 {


				echo "

						
					<div class= 'col-md-6'>
						<div class='single-blog'>

							<p class='blog-meta'>New Blog<span>".$row['date']."</span></p>
							<img src='".$row['img']."' >
							<h2><a href='#''>".$row['title']."</a></h2>
							<p class='blog-text'>
								".$row['content']."
							</p>
							<p><a href='#' class='read-more-btn'>Read More</a>
								<span><i class='fa fa-thumbs-up' aria-hidden='true'></i>10 people Like,<i class='fa fa-comment-o'></i></span>
							</p>
							
						</div>
						
					</div> 
			";
			}
			?>
		</div>
	</div>
	<?php
	include("comment.php");
	?>
</body>
</html>