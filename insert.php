
<?php

$connect = mysqli_connect("localhost","root","","pagido");
if($connect){
    echo "Connected";
}

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["insert"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
   
    $title = $_POST['title'];
     $author = $_POST['author'];
      $content = $_POST['content'];

    $sql = "insert into blog_details (title,author,content ,img,date) values('$title','$author','$content','$target_file',now())";

    if (mysqli_query($connect, $sql)) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }


    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
mysqli_close($connect);
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
	<meta charset="utf-8">

	<title></title>
	<style type="text/css">


	.insert form{
		margin: 20px;
		width: 320px;
		color: steelblue;
		text-align: center;
	}

	.insert input{
		padding: 10px;
		font-size: inherit;
	}

	.insert input[type="text"]
	{
		display: block;
		margin-bottom: 25px;
		width: 100%;
		border : 2px solid steelblue;
		}

	.form-control[type="text"]
	{
		border : 2px solid steelblue;
		padding: 10px;
		font-size: inherit;
	}

	.insert input[type="submit"]{
		width: 344px;
		height: 45px;
		border: none;
		background: steelblue;
		color: #fff;
	}

		.insert input[type="submit"]:focus{
		width: 344px;
		height: 45px;
		border: none;
		background:#00E6FF;
		color: #000;
	}

	.insert input:focus{
		background:#fff;
	}

	</style>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

	<?php
	include("adminpage.php");
	?>

<div class="insert" align="center" >

	<h2>Insert the Blog details</h2>
		<form method="POST" action="insert.php" enctype="multipart/form-data" >

		<input type="text" placeholder="Enter Title" name="title">

		<input type="text" placeholder="Author Name" name="author">

		<textarea class="form-control" placeholder="Type your content here" type="text" rows="13" cols="38" id="comment" name="content"></textarea>

		 <input type="file" name="fileToUpload" id="fileToUpload">

		<input type="submit" name="insert" value="Insert" id="upload">
		

	</form>
</div>

</body>
</html>

<script>
    
    $(document).ready(function(){

    	//#uplaod is buttons id

        $('#upload').click(function(){
            var image_name = $('#fileToUpload').val();
            if(image_name == '')
            {
                alert("Please Select Image");
                return false;
            }
            else
            {
                var extension = $('#fileToUpload').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension,['gif','png','jpg','jpeg']) == -1)
                {
                    alert('Inavlid Image extension');
                    $('#fileToUpload').val('');
                    return false;
                }
            }
        });
    });
</script>